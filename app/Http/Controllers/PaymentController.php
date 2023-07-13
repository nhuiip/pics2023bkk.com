<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\PaymentTransaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paylink(Request $request)
    {
        $reference = $request->reference;
        $member = Member::where('reference', $reference)->first();
        $date = now();
        $preExpiredDate = $date->addMinute(-30);

        $transaction = PaymentTransaction::where('memberId', $member->id)->where('ExpiredDate', '<=', $preExpiredDate)->first();
        if ($transaction == null) {
            $header = [
                'Content-Type' => 'application/json',
                'Accept' => '*/*',
                'CHILLPAY-MerchantCode' => env('CHILLPAY_MerchantCode'),
                'CHILLPAY-ApiKey' => env('CHILLPAY_ApiKey')
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
            $secretKey = env('CHILLPAY_SecretKey');
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
            $response = $client->request('POST', env('CHILLPAY_Paylink'), [
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
        $TransactionId = $request->transNo;
        $rawData = $TransactionId;
        $secretKey = env('CHILLPAY_SecretKey');
        $checksum = Md5($rawData . $secretKey);
        $header = [
            'Content-Type' => 'application/json',
            'Accept' => '*/*',
            'CHILLPAY-MerchantCode' => env('CHILLPAY_MerchantCode'),
            'CHILLPAY-ApiKey' => env('CHILLPAY_ApiKey')
        ];

        $payload = [
            'TransactionId' => $TransactionId,
            'Checksum' => $checksum
        ];

        $client = new Client();
        $response = $client->request('POST', env('CHILLPAY_PaylinkDetail'), [
            'headers' => $header,
            'json' => $payload
        ]);

        $data = json_decode($response->getBody(), true);
        $reference = $data['data']['productName'];
        if($data['data']['paymentStatus'] == 'Success'){
            $member = Member::where('reference', $reference)->first();
            $member->payment_method = 1;
            $member->payment_status = 2;
            $member->save();
        }

        return json_encode($data);
    }

    public function callback(Request $request)
    {
        dd($request->all());
        die;
    }
}
