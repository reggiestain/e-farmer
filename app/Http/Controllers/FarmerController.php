<?php

namespace App\Http\Controllers;

use App\Farmer;
use App\Region;
use App\FarmDetail;
use App\SpousalDetail;
use App\BankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
         $farmers = Farmer::all();
        
        return view('farmer.index')->with([
            'farmers'=>$farmers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $regions = Region::all();
        $genders = ['Male', 'Female'];
        return view('farmer.add')->with([
                    'regions' => $regions,
                    'genders' => $genders,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        try {

            $this->validate($request, [
                'firstname' => 'required',
                'surname' => 'required',
                'mobile' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'birth_place' => 'required',
                'gender' => 'required',
                'age' => 'required'
            ]);

            $farmer = Farmer::create([
                        'user_id' => Auth::user()->id,
                        'firstname' => $request->input('firstname'),
                        'surname' => $request->input('surname'),
                        'email' => $request->input('email'),
                        'mobile' => $request->input('mobile'),
                        'gender' => $request->input('gender'),
                        'age' => $request->input('age'),
                        'birth_date' => $request->input('birth_date'),
                        'birth_place' => $request->input('birth_place'),
                        'region_id' => $request->input('region_id'),
                        'marital_status' => $request->input('marital_status'),
                        'number_of_children' => $request->input('number_of_children'),
                        'number_of_dependancies' => $request->input('number_of_dependencies'),
                        'address' => $request->input('address'),
                        'postal_address' => $request->input('postal_address'),
            ]);
            

            $spouse = SpousalDetail::create([
                        'farmer_id' => $farmer->id,
                        's_firstname' => $request->input('s_firstname'),
                        's_surname' => $request->input('s_surname'),
                        's_birth_date' => $request->input('s_birth_date'),
                        's_mobile' => $request->input('s_mobile'),
            ]);

            $farm = FarmDetail::create([
                        'farmer_id' => $farmer->id,
                        'crop_type' => $request->input('crop_type'),
                        'seedlings' => $request->input('seedlings'),
                        'size_of_land' => $request->input('size_of_land'),
                        'year_established' => $request->input('year_established'),
                        'district' => $request->input('district'),
                        'longitude' => $request->input('longitude'),
                        'latitude' => $request->input('latitude'),
            ]);


            $bank = BankDetail::create([
                        'farmer_id' => $farmer->id,
                        'bank_name' => $request->input('bank_name'),
                        'branch_name' => $request->input('branch_name'),
                        'account_no' => $request->input('account_no'),
                        'branch_code' => $request->input('branch_code'),
                        'mobile_money' => $request->input('mobile_money'),
            ]);
            
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        
        Redirect::to('/farmer')->with('message', 'success|Record updated.');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer) {
        //
    }

}
