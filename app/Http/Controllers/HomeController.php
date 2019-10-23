<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmer;
use App\User;
use App\Crop;
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
        
        $femaleCount = Farmer::where('gender','Female')->count();
        $farmersCount = Farmer::count();
        $cropType = Crop::all();
        return view('home')->with([
            'users'=>$users,
            'farmers'=>$farmers,
            'femaleCount'=>$femaleCount,
            'farmersCount'=>$farmersCount,            
        ]);
    }
}
