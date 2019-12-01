<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use App\User;
use App\Crop;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $farmers = Farmer::all();
        
        $sumCrop = DB::table('farm_details')->select('crops.name', DB::raw('SUM(seedlings) as y'))
                        
                        ->join('crops', function ($join) {
                            $join->on('farm_details.crop_id', '=', 'crops.id');
                        })->whereNotIn('crops.id', [7])->groupBy('crops.name')->get();
        
        $femaleCount = Farmer::where('gender','Female')->count();
        $farmersCount = Farmer::count();
        $avgFarmerAge = Farmer::avg('age');
        $avgDependant = Farmer::avg('number_of_dependencies');
        $cropType = Crop::all();
        return view('home')->with([
            'users'=>$users,
            'farmers'=>$farmers,
            'femaleCount'=>$femaleCount,
            'farmersCount'=>$farmersCount,   
            'sumCrop'=>$sumCrop,
            'avgFarmerAge' => round($avgFarmerAge),
            'avgDependant' => round($avgDependant)
        ]);
    }
}
