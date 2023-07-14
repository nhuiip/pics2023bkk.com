<?php

namespace App\Http\Controllers;

use App\Mail\PaymentMail;
use App\Models\Member;
use App\Models\PaymentTransaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function paylink(Request $request)
    {
        $CHILLPAY_MerchantCode = "M034382";
        $CHILLPAY_ApiKey = "fS03cRf0J3n6HYxbWn1mq0wWIqh9TMf5wyOYS5Ra0HecM4emEcn4THyYQNqSSYnu";
        $CHILLPAY_SecretKey = "IiolpbZ8vdOLX101eW9L4YIKySKZz2ef9GJvuaGPPZmb9aBixaye3fFp6TsRkFPK6DmXb0sXxBzEfM50vkfUMnvpl3IqsPu2gZcBKacD6Q1T9zw9o84H842ld00nzUx9HSyYl1TqFBg9anLzXa8cTIGcnsG7FTOLaMule";
        $CHILLPAY_Paylink = "https://api-paylink.chillpay.co/api/v1/paylink/generate";

        $reference = $request->reference;
        $member = Member::where('reference', $reference)->first();
        $date = now();
        $preExpiredDate = $date->addMinute(-30);

        $transaction = PaymentTransaction::where('memberId', $member->id)->where('ExpiredDate', '<=', $preExpiredDate)->where('isExpired', false)->first();
        if ($transaction == null) {
            $header = [
                'Content-Type' => 'application/json',
                'Accept' => '*/*',
                'CHILLPAY-MerchantCode' => $CHILLPAY_MerchantCode,
                'CHILLPAY-ApiKey' => $CHILLPAY_ApiKey
            ];

            $ProductImage = "";
            $ProductName = $member->reference;
            $ProductDescription = $member->registrant_group . ", " . $member->registration_type;
            $PaymentLimit = 1;
            $StartDate = date('d/m/Y h:i:s', strtotime($date));
            $ExpiredDate = date('d/m/Y h:i:s', strtotime($date->addDay(1)));
            $Currency = 'USD';
            $Amount = $member->total . '00';

            $rawData = $ProductImage . $ProductName . $ProductDescription . $PaymentLimit . $StartDate . $ExpiredDate . $Currency . $Amount;
            $secretKey = $CHILLPAY_SecretKey;
            $checksum = Md5($rawData . $secretKey);

            $payload = [
                'ProductImage' => $ProductImage,
                'ProductName' => $ProductName,
                'ProductDescription' => $ProductDescription,
                'PaymentLimit' => $PaymentLimit,
                'StartDate' => $StartDate,
                'ExpiredDate' => $ExpiredDate,
                'Currency' => $Currency,
                'Amount' => $Amount,
                'Checksum' => $checksum
            ];

            $client = new Client();
            $response = $client->request('POST', $CHILLPAY_Paylink, [
                'headers' => $header,
                'json' => $payload
            ]);

            $data = json_decode($response->getBody(), true);
            $startDate = date_create_from_format('d/m/Y H:i:s', $data['data']['startDate']);
            $expiredDate = date_create_from_format('d/m/Y H:i:s', $data['data']['startDate']);

            // new PaymentTransaction
            $transaction = new PaymentTransaction();
            $transaction->memberId = $member->id;
            $transaction->transaction_id = $data['data']['payLinkId'];
            $transaction->payment_url = $data['data']['paymentUrl'];
            $transaction->amount = $data['data']['amount'];
            $transaction->paylink_token = $data['data']['payLinkToken'];
            $transaction->startDate = $startDate->getTimestamp();
            $transaction->expiredDate = $expiredDate->getTimestamp();
            $transaction->isExpired = false;
            $transaction->save();
        }

        return json_encode($transaction);
    }

    public function result(Request $request)
    {
        $CHILLPAY_MerchantCode = "M034382";
        $CHILLPAY_ApiKey = "fS03cRf0J3n6HYxbWn1mq0wWIqh9TMf5wyOYS5Ra0HecM4emEcn4THyYQNqSSYnu";
        $CHILLPAY_SecretKey = "IiolpbZ8vdOLX101eW9L4YIKySKZz2ef9GJvuaGPPZmb9aBixaye3fFp6TsRkFPK6DmXb0sXxBzEfM50vkfUMnvpl3IqsPu2gZcBKacD6Q1T9zw9o84H842ld00nzUx9HSyYl1TqFBg9anLzXa8cTIGcnsG7FTOLaMule";
        $CHILLPAY_PaylinkDetail = "https://api-transaction.chillpay.co/api/v1/payment/details";

        $TransactionId = $request->transNo;

        $rawData = $TransactionId;
        $secretKey = $CHILLPAY_SecretKey;
        $checksum = Md5($rawData . $secretKey);

        $header = [
            'Content-Type' => 'application/json',
            'Accept' => '*/*',
            'CHILLPAY-MerchantCode' => $CHILLPAY_MerchantCode,
            'CHILLPAY-ApiKey' => $CHILLPAY_ApiKey
        ];

        $payload = [
            'TransactionId' => $TransactionId,
            'Checksum' => $checksum
        ];

        $client = new Client();
        $response = $client->request('POST', $CHILLPAY_PaylinkDetail, [
            'headers' => $header,
            'json' => $payload
        ]);

        $data = json_decode($response->getBody(), true);
        $reference = $data['data']['description'];
        $member = Member::where('reference', $reference)->first();
        if ($data['data']['status'] == 'Success') {
            $member->payment_method = 1;
            $member->payment_status = 2;
            $member->save();

            // send email
            Mail::to($member->email)->send(new PaymentMail($member));

            return redirect()->route('register.show', $member->reference)->with('success', 'Payment Success');
        } else {
            $transaction = PaymentTransaction::where('memberId', $member->id)->where('isExpired', false)->first();
            $transaction->isExpired = true;
            $transaction->save();

            switch ($data['data']['status']) {
                case 'Cancel':
                    return redirect()->route('register.show', $member->reference)->with('error', 'Payment Cancelled');
                    break;

                default:
                    return redirect()->route('register.show', $member->reference->with('error', 'Payment Failed'));
                    break;
            }
        }
    }

    public function callback(Request $request)
    {
        $CHILLPAY_MerchantCode = "M034382";
        $CHILLPAY_ApiKey = "fS03cRf0J3n6HYxbWn1mq0wWIqh9TMf5wyOYS5Ra0HecM4emEcn4THyYQNqSSYnu";
        $CHILLPAY_SecretKey = "IiolpbZ8vdOLX101eW9L4YIKySKZz2ef9GJvuaGPPZmb9aBixaye3fFp6TsRkFPK6DmXb0sXxBzEfM50vkfUMnvpl3IqsPu2gZcBKacD6Q1T9zw9o84H842ld00nzUx9HSyYl1TqFBg9anLzXa8cTIGcnsG7FTOLaMule";
        $CHILLPAY_PaylinkDetail = "https://api-transaction.chillpay.co/api/v1/payment/details";

        $TransactionId = $request->TransactionId;

        $rawData = $TransactionId;
        $secretKey = $CHILLPAY_SecretKey;
        $checksum = Md5($rawData . $secretKey);

        $header = [
            'Content-Type' => 'application/json',
            'Accept' => '*/*',
            'CHILLPAY-MerchantCode' => $CHILLPAY_MerchantCode,
            'CHILLPAY-ApiKey' => $CHILLPAY_ApiKey
        ];

        $payload = [
            'TransactionId' => $TransactionId,
            'Checksum' => $checksum
        ];

        $client = new Client();
        $response = $client->request('POST', $CHILLPAY_PaylinkDetail, [
            'headers' => $header,
            'json' => $payload
        ]);

        $data = json_decode($response->getBody(), true);
        $reference = $data['data']['description'];
        $member = Member::where('reference', $reference)->first();
        if ($data['data']['status'] == 'Success') {
            $member->payment_method = 1;
            $member->payment_status = 2;
            $member->save();

            // send email
            Mail::to($member->email)->send(new PaymentMail($member));
        } else {
            $transaction = PaymentTransaction::where('memberId', $member->id)->where('isExpired', false)->first();
            $transaction->isExpired = true;
            $transaction->save();
        }
    }

    public function testpaylink($reference = 'M-20230713083250-00001')
    {

        $CHILLPAY_MerchantCode = "M034382";
        $CHILLPAY_ApiKey = "t6ZUKW52GTzgQZ7SjQWEUPOV64Kv83MmQhwJqav2mf6YhR6NHPYy4J7SwfPL87LH";
        $CHILLPAY_SecretKey = "du3ZJozmZeziq1ITwnRwiJc4MIU47S9UwSrwXOZfqNbT8735qkd9FIK2LrM3EMdHkuZKPtryoA4YfQwmMPyHZfETsJse0e0OBics8k16TcD8dD8am5ogRAmThhgudVixJ3i899Zqj6lVgwzhR8K5MZ5yXyEVlXl7daioN";
        $CHILLPAY_Paylink = "https://sandbox-apipaylink.chillpay.co/api/v1/paylink/generate";

        $member = Member::where('reference', $reference)->first();
        $date = now();
        $header = [
            'Content-Type' => 'application/json',
            'Accept' => '*/*',
            'CHILLPAY-MerchantCode' => $CHILLPAY_MerchantCode,
            'CHILLPAY-ApiKey' => $CHILLPAY_ApiKey
        ];

        $ProductImage = "";
        $ProductName = $member->reference;
        $ProductDescription = $member->registrant_group . ", " . $member->registration_type;
        $PaymentLimit = 1;
        $StartDate = date('d/m/Y h:i:s', strtotime($date));
        $ExpiredDate = date('d/m/Y h:i:s', strtotime($date->addDay(1)));
        $Currency = 'USD';
        $Amount = $member->total . '00';

        $rawData = $ProductImage . $ProductName . $ProductDescription . $PaymentLimit . $StartDate . $ExpiredDate . $Currency . $Amount;
        $secretKey = $CHILLPAY_SecretKey;
        $checksum = Md5($rawData . $secretKey);

        $payload = [
            'ProductImage' => $ProductImage,
            'ProductName' => $ProductName,
            'ProductDescription' => $ProductDescription,
            'PaymentLimit' => $PaymentLimit,
            'StartDate' => $StartDate,
            'ExpiredDate' => $ExpiredDate,
            'Currency' => $Currency,
            'Amount' => $Amount,
            'Checksum' => $checksum
        ];

        $client = new Client();
        $response = $client->request('POST', $CHILLPAY_Paylink, [
            'headers' => $header,
            'json' => $payload
        ]);

        return json_decode($response->getBody(), true);
    }

    public function testpaylinkprod($reference = 'M-20230713083250-00001')
    {

        $CHILLPAY_MerchantCode = "M034382";
        $CHILLPAY_ApiKey = "fS03cRf0J3n6HYxbWn1mq0wWIqh9TMf5wyOYS5Ra0HecM4emEcn4THyYQNqSSYnu";
        $CHILLPAY_SecretKey = "IiolpbZ8vdOLX101eW9L4YIKySKZz2ef9GJvuaGPPZmb9aBixaye3fFp6TsRkFPK6DmXb0sXxBzEfM50vkfUMnvpl3IqsPu2gZcBKacD6Q1T9zw9o84H842ld00nzUx9HSyYl1TqFBg9anLzXa8cTIGcnsG7FTOLaMule";
        $CHILLPAY_Paylink = "https://api-paylink.chillpay.co/api/v1/paylink/generate";

        $member = Member::where('reference', $reference)->first();
        $date = now();
        $header = [
            'Content-Type' => 'application/json',
            'Accept' => '*/*',
            'CHILLPAY-MerchantCode' => $CHILLPAY_MerchantCode,
            'CHILLPAY-ApiKey' => $CHILLPAY_ApiKey
        ];

        $ProductImage = "";
        $ProductName = $member->reference;
        $ProductDescription = $member->registrant_group . ", " . $member->registration_type;
        $PaymentLimit = 1;
        $StartDate = date('d/m/Y h:i:s', strtotime($date));
        $ExpiredDate = date('d/m/Y h:i:s', strtotime($date->addDay(1)));
        $Currency = 'USD';
        $Amount = $member->total . '00';

        $rawData = $ProductImage . $ProductName . $ProductDescription . $PaymentLimit . $StartDate . $ExpiredDate . $Currency . $Amount;
        $secretKey = $CHILLPAY_SecretKey;
        $checksum = Md5($rawData . $secretKey);

        $payload = [
            'ProductImage' => $ProductImage,
            'ProductName' => $ProductName,
            'ProductDescription' => $ProductDescription,
            'PaymentLimit' => $PaymentLimit,
            'StartDate' => $StartDate,
            'ExpiredDate' => $ExpiredDate,
            'Currency' => $Currency,
            'Amount' => $Amount,
            'Checksum' => $checksum
        ];

        $client = new Client();
        $response = $client->request('POST', $CHILLPAY_Paylink, [
            'headers' => $header,
            'json' => $payload
        ]);

        return json_decode($response->getBody(), true);
    }

    public function testmail($reference = 'M-20230713083250-00001')
    {
        $member = Member::where('reference', $reference)->first();
        Mail::to($member->email)->send(new PaymentMail($member));
    }
}
