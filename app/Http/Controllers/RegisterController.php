<?php

namespace App\Http\Controllers;

use App\Mail\PaymentMail;
use App\Mail\RegisterMail;
use App\Models\Association;
use App\Models\Country;
use App\Models\Member;
use App\Models\RegistrationFee;
use App\Models\RegistrationRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($registrantGroupId, $registrantTypeId)
    {
        $today = date('Y-m-d');
        $rate = RegistrationRate::where('startDate', '<=', $today)->where('endDate', '>=', $today)->first();
        $fee = RegistrationFee::with(['registrant_group', 'registrant_type', 'registration_rate'])->where(['registrationRateId' => $rate->id, 'registrantTypeId' => $registrantTypeId, 'registrantGroupId' => $registrantGroupId])->first();

        $countries = null;
        $countAssociations = Association::where('registrantTypeId', $registrantTypeId)->count();

        if ($countAssociations == 0) {
            $countries = Country::all();
        } else {
            $countries = Country::whereHas('associations', function ($query) use ($registrantTypeId) {
                $query->where('registrantTypeId', $registrantTypeId);
            })->get();
        }

        return view('register.main', [
            'data' => $fee,
            'countries' => $countries,
            'hasAssociation' => $countAssociations > 0 ? true : false,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|max:255|unique:members',
                'email_secondary' => 'required|email|max:255',
                'title' => 'required|max:255',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'address' => 'required|max:255',
                'address_2' => 'max:255',
                'city' => 'required|max:255',
                'city_code' => 'required|max:255',
                'country' => 'required',
                'phone' => 'required|max:255',
                'phone_mobile' => 'required|max:255',
                'organization' => 'required|max:255',
                'profession_title' => 'required|max:255',
                'tax_id' => 'required|max:255',
                'tax_phone' => 'required|max:255',
                'dietary_restrictions' => 'max:255',
                'special_requirements' => 'max:255',
            ]
        );

        $data = new Member($request->all());
        $data->save();

        // update data
        $reference = 'M-' . date('Ymdhis', strtotime($data->created_at)) . '-' . str_pad($data->id, 5, "0", STR_PAD_LEFT);
        $password = Str(8);
        $data->reference = $reference;
        $data->password = bcrypt($password);
        $data->password_raw = $password;
        $data->address = $request->address . ' ' . $request->address_2;
        $data->save();

        // send email
        Mail::to($data->email)->send(new RegisterMail($data));

        return redirect()->route('register.show', $data->reference);
    }

    public function testmail($reference = 'M-20230713083250-00001')
    {
        $member = Member::where('reference', $reference)->first();
        Mail::to($member->email)->send(new PaymentMail($member));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('register.payment', ['data' => Member::where('reference', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getassociations(Request $request)
    {
        $countryId = $request->countryId;
        $registrantTypeId = $request->registrantTypeId;
        $data = Association::where(['countryId' => $countryId, 'registrantTypeId' => $registrantTypeId])->get();
        return $data;
    }
}
