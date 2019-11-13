<?php

namespace App\Http\Controllers;

use App\Farmer;
use App\Region;
use App\FarmDetail;
use App\SpousalDetail;
use App\BankDetail;
use App\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use PDF;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class FarmerController extends Controller {

    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $farmers = Farmer::with('user')->get();

        return view('farmer.index', compact('farmers'));
    }

    public function updateProfile(Request $request) {
        // Form validation
        $request->validate([
            'name' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current user
        $user = User::findOrFail(auth()->user()->id);
        // Set user name
        $user->name = $request->input('name');

        // Check if a profile image has been uploaded
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = $filePath;
        }
        // Persist user record to database
        $user->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $regions = Region::all();
        $cropType = Crop::all();
        $genders = ['Male', 'Female'];

        return view('farmer.add')->with([
                    'regions' => $regions,
                    'genders' => $genders,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active'],
                    'maritals' => ['Single', 'Married', 'Divorced', 'Seperated']
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
                'age' => 'required',
                'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->has('profile_image')) {

                // Get image file
                $image = $request->file('profile_image');
                // Make a image name based on user name and current timestamp
                $name = $request->input('firstname') . '' . time();
                // Define folder path
                $folder = '/img/profile/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
            }




            $farmer = Farmer::create([
                        'user_id' => Auth::user()->id,
                        'profile_image' => $filePath ?? '',
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
                        'number_of_dependencies' => $request->input('number_of_dependencies'),
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
                        'crop_id' => $request->input('crop_id') ?? 7,
                        'seedlings' => $request->input('seedlings'),
                        'size_of_land' => $request->input('size_of_land'),
                        'year_established' => $request->input('year_established'),
                        'district' => $request->input('district'),
                        'longitude' => $request->input('longitude'),
                        'latitude' => $request->input('latitude'),
                        'region_id' => $request->input('region_id') ?? 11,
                        'location' => $request->input('location'),
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

        return redirect('/farmer/' . $farmer->id . '/edit')->with('success', 'Success | Record saved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savefarm(Request $request) {

        try {
            $farm = FarmDetail::create([
                        'farmer_id' => $request->input('farmer_id'),
                        'status' => $request->input('status'),
                        'crop_id' => $request->input('crop_id') ?? 7,
                        'seedlings' => $request->input('seedlings'),
                        'size_of_land' => $request->input('size_of_land'),
                        'year_established' => $request->input('year_established'),
                        'status' => $request->input('status'),
                        'location' => $request->input('location'),
                        'district' => $request->input('district'),
                        'longitude' => $request->input('longitude'),
                        'latitude' => $request->input('latitude'),
                        'region_id' => $request->input('region_id') ?? 11,
            ]);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                        "message" => "Error"
            ]);
        }

        $farms = Farmer::find($request->input('farmer_id'));
        $regions = Region::all();
        $cropType = Crop::all();

        return view('farmer.farm')->with([
                    'farmers' => $farms,
                    'regions' => $regions,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active']
        ]);
    }

    public function getfarm($id) {

        $farm = Farmer::find($id);
        $regions = Region::all();
        $cropType = Crop::all();


        return view('farmer.farm')->with([
                    'farmers' => $farm,
                    'regions' => $regions,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active'],
                    'maritals' => ['Single', 'Married', 'Divorced', 'Seperated']
        ]);
    }

    public function editfarm($id) {

        $farm = FarmDetail::find($id);
        $regions = Region::all();
        $cropType = Crop::all();


        return view('farmer.editfarm')->with([
                    'farms' => $farm,
                    'regions' => $regions,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active'],
                    'maritals' => ['Single', 'Married', 'Divorced', 'Seperated']
        ]);
    }

    public function updatefarm(Request $request, $farms) {

        $farm->crop_id = $request->input('crop_id') ?? 7;
        $farm->seedlings = $request->input('seedlings');
        $farm->district = $request->input('district');
        $farm->size_of_land = $request->input('size_of_land');
        $farm->location = $request->input('location');
        $farm->status = $request->input('status') ?? 'In-active';
        $farm->longitude = $request->input('longitude');
        $farm->latitude = $request->input('latitude');
        $farm->region_id = $request->input('region_id') ?? 11;

        $farm->push();

        $farmer = Farmer::find($request->input('farmer_id'));
        $regions = Region::all();
        $cropType = Crop::all();


        return view('farmer.farm')->with([
                    'farmers' => $farmer,
                    'regions' => $regions,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active'],
                    'maritals' => ['Single', 'Married', 'Divorced', 'Seperated']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer) {

        $genders = ['Male', 'Female'];
        $regions = Region::all();
        $cropType = Crop::all();

        return view('farmer.edit')->with([
                    'genders' => $genders,
                    'regions' => $regions,
                    'farmer' => $farmer,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active'],
                    'maritals' => ['Single', 'Married', 'Divorced', 'Seperated']
        ]);
    }

    public function view($id) {

        $farmer = Farmer::find($id);

        $name = $farmer->firstname . '-' . $farmer->surname;

        $genders = ['Male', 'Female'];
        $regions = Region::all();
        $cropType = Crop::all();

        return view('farmer.view')->with([
                    'genders' => $genders,
                    'regions' => $regions,
                    'farmer' => $farmer,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active'],
                    'maritals' => ['Single', 'Married', 'Divorced', 'Seperated']
        ]);
    }

    public function pdf($id) {

        $farmer = Farmer::find($id);

        $name = $farmer->firstname . '-' . $farmer->surname;

        $genders = ['Male', 'Female'];
        $regions = Region::all();
        $cropType = Crop::all();

        $pdf = PDF::loadView('farmer.pdf', [
       
                    'farmer' => $farmer,
                    'genders' => $genders,
                    'regions' => $regions,
                    'cropTypes' => $cropType,
                    'statuses' => ['Active', 'In-active'],
                    'maritals' => ['Single', 'Married', 'Divorced', 'Seperated']
        ]);
        

        return $pdf->download($name .'.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer) {

        $farmer = Farmer::find($farmer->id);

        // Check if a profile image has been uploaded
        $request->validate([
            'firstname' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->has('profile_image')) {

            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = $request->input('firstname') . '' . time();
            // Define folder path
            $folder = null;
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $farmer->profile_image = $filePath;
        }

        $farmer->firstname = $request->input('firstname');
        $farmer->surname = $request->input('surname');
        $farmer->email = $request->input('email');
        $farmer->mobile = $request->input('mobile');
        $farmer->mobile2 = $request->input('mobile2');
        $farmer->gender = $request->input('gender') ?? 'Male';
        $farmer->age = $request->input('age');
        $farmer->birth_date = $request->input('birth_date');
        $farmer->birth_place = $request->input('birth_place');
        //$farmer->region_id = $request->input('region_id');
        $farmer->marital_status = $request->input('marital_status');
        $farmer->number_of_children = $request->input('number_of_children');
        $farmer->number_of_dependencies = $request->input('number_of_dependencies');
        $farmer->address = $request->input('address');
        $farmer->postal_address = $request->input('postal_address');

        $farmer->spousalDetail->s_firstname = $request->input('s_firstname');
        $farmer->spousalDetail->s_surname = $request->input('s_surname');
        $farmer->spousalDetail->s_birth_date = $request->input('s_birth_date');
        $farmer->spousalDetail->s_mobile = $request->input('s_mobile');

        $farmer->farmDetail->crop_id = $request->input('crop_id');
        $farmer->farmDetail->seedlings = $request->input('seedlings');
        $farmer->farmDetail->district = $request->input('district');
        $farmer->farmDetail->longitude = $request->input('longitude');
        $farmer->farmDetail->latitude = $request->input('latitude');
        $farmer->farmDetail->region_id = $request->input('region_id') ?? 0;

        $farmer->bankDetail->bank_name = $request->input('bank_name');
        $farmer->bankDetail->account_no = $request->input('account_no');
        $farmer->bankDetail->branch_code = $request->input('branch_code');
        $farmer->bankDetail->mobile_money = $request->input('mobile_money');

        $farmer->push();

        return redirect()->route('farmer.index')->with('success', 'Success | Record updated successfully.');
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
