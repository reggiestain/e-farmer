<?php

namespace App\Http\Controllers;

use App\Farmer;
use App\Region;
use App\Farm;
use App\BankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('farmer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        $genders = ['Male','Female'];
        return view('farmer.add')->with([
            'regions'=>$regions,
            'genders'=>$genders,
            
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'firstname' =>'required',
            'surname' =>'required',
            'mobile' =>'required',
            'gender' =>'required',
            'birth_date' =>'required',
            'birth_place' =>'required',
            'age'=>'require'
        ]);
        
        $farmer = Farmer::create([
                    'firstname' => $request->input('firstname'),
                    'surname' => $request->input('surname'),
                    'email' => $request->input('email'),
                    'mobile' => $request->input('mobile'),
                    'gender' => $request->input('gender'),
                    'age' => $request->input('age'),
                    'birth_date' => $request->input('birth_date'),
                    'birth_place' => $request->input('firstname'),
                    'region_id' => $request->input('region_id'),
                    'marital_status' => $request->input('marital_status'),
                    'number_of_children' => $request->input('number_of_children'),
                    'number_of_dependancies' => $request->input('number_of_dependencies'),
                    'address' => $request->input('address'),
                    'postal_address' => $request->input('postal_address'),
                    
        ]);
        
        $farm = Farm::create([
                    'crop_type' => $request->input('crop_type'),
                    'seedlings' => $request->input('seedlings'),
                    'size_of_land' => $request->input('size_of_land'),
                    'year_established' => $request->input('year_established'),
                    'district' => $request->input('district'),
                    'longitude' => $request->input('longitude'),
                    'latitude' => $request->input('latitude'),                   
                    
        ]);
        
        $bank = BankDetail::create([
                    'farmer_id' => $request->input('farmer_id'),
                    'bank_name' => $request->input('bank_name'),
                    'branch_name' => $request->input('branch_name'),
                    'account_no' => $request->input('account_no'),
                    'branch_code' => $request->input('branch_code'),
                    'mobile_money' => $request->input('mobile_money'),                                    
        ]);

        $user
                ->roles()
                ->attach(Role::find($data['roles']));
        return $user;
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        //
    }
}
