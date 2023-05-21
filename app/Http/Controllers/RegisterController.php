<?php

namespace App\Http\Controllers;

use App\Models\RegistrationFee;
use App\Models\RegistrationRate;
use Illuminate\Http\Request;

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
        
        return view('register.main', ['data' => $fee]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
