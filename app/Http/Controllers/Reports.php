<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of ReportController
 *
 * @author dev5
 */
use App\Farmer;
use App\FarmDetail;
use Illuminate\Support\Facades\DB;

class Reports extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function agePerFarmer() {

        $avgAge = Farmer::avg('age');

        return round($avgAge);
    }

    public function avgDependant() {

        $avgDependant = Farmer::avg('number_of_dependencies');

        return round($avgDependant);
    }

    public function seedlingsrop() {

        $avgCrop = FarmDetail::with(['crop' => function($query) {
                        $query->select('id', 'name');
                    }])->get(['SUM(seedlings)']);

        return $avgCrop;
    }

    public function seedlingsPerCrop() {

        $sumCrop = DB::table('farm_details')->select('crops.name', DB::raw('SUM(seedlings) as y'))
                        
                        ->join('crops', function ($join) {
                            $join->on('farm_details.crop_id', '=', 'crops.id');
                        })->whereNotIn('crops.id', [7])->groupBy('crops.name')->get();

        return $sumCrop;
    }

}
