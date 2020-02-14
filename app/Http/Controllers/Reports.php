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
use App\District;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class Reports extends Controller {

    public function __construct() {
        //$this->user = JWTAuth::parseToken()->authenticate();
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
    
    public function seedlingsPerDistrict() {
        
        $dists = DB::table('districts')->select('name')->get();
        
        foreach ($dists as $dist) {
            $cat[] = $dist->name; 
        }
       
        $m1 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',1)
                                      ->where('crop_id',8)->groupBy('crop_id')
                                      ->get();
        $m2 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',2)
                                      ->where('crop_id',8)->groupBy('crop_id')
                                      ->get();
        $m3 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',3)
                                      ->where('crop_id',8)->groupBy('crop_id')
                                      ->get();
        $m4 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',4)
                                      ->where('crop_id',8)->groupBy('crop_id')
                                      ->get();
        $m5 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',5)
                                      ->where('crop_id',8)->groupBy('crop_id')
                                      ->get();
                
        $mango = [round($m1[0]->sum ?? 0),round($m2[0]->sum ?? 0),round($m3[0]->sum ?? 0),
                  round($m4[0]->sum ?? 0),round($m5[0]->sum ?? 0)
                 ];
        
        $cof1 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',1)
                                      ->where('crop_id',2)->groupBy('crop_id')
                                      ->get();
        $cof2 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',2)
                                      ->where('crop_id',2)->groupBy('crop_id')
                                      ->get();
        $cof3 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',3)
                                      ->where('crop_id',2)->groupBy('crop_id')
                                      ->get();
        $cof4 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',4)
                                      ->where('crop_id',2)->groupBy('crop_id')
                                      ->get();
        $cof5 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',5)
                                      ->where('crop_id',2)->groupBy('crop_id')
                                      ->get();
               
        $coffee = [round($cof1[0]->sum ?? 0),round($cof2[0]->sum ?? 0),round($cof3[0]->sum ?? 0),
                   round($cof4[0]->sum ?? 0),round($cof5[0]->sum ?? 0)];
        //Coconut
        $coco1 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',1)
                                      ->where('crop_id',3)->groupBy('crop_id')
                                      ->get();
        $coco2 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',2)
                                      ->where('crop_id',3)->groupBy('crop_id')
                                      ->get();
        $coco3 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',3)
                                      ->where('crop_id',3)->groupBy('crop_id')
                                      ->get();
        $coco4 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',4)
                                      ->where('crop_id',3)->groupBy('crop_id')
                                      ->get();
        $coco5 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',5)
                                      ->where('crop_id',3)->groupBy('crop_id')
                                      ->get();
            
        $coconut = [round($coco1[0]->sum ?? 0),round($coco2[0]->sum ?? 0),round($coco3[0]->sum ?? 0),
                   round($coco4[0]->sum ?? 0),round($coco5[0]->sum ?? 0)];
        
          //Cashew
        $cash1 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',1)
                                      ->where('crop_id',1)->groupBy('crop_id')
                                      ->get();
        $cash2 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',2)
                                      ->where('crop_id',1)->groupBy('crop_id')
                                      ->get();
        $cash3 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',3)
                                      ->where('crop_id',1)->groupBy('crop_id')
                                      ->get();
        $cash4 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',4)
                                      ->where('crop_id',1)->groupBy('crop_id')
                                      ->get();
        $cash5 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',5)
                                      ->where('crop_id',1)->groupBy('crop_id')
                                      ->get();
            
        $cashew = [round($cash1[0]->sum ?? 0),round($cash2[0]->sum ?? 0),round($cash3[0]->sum ?? 0),
                   round($cash4[0]->sum ?? 0),round($cash5[0]->sum ?? 0)];
        
        //Rubber
        $rub1 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',1)
                                      ->where('crop_id',5)->groupBy('crop_id')
                                      ->get();
        $rub2 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',2)
                                      ->where('crop_id',5)->groupBy('crop_id')
                                      ->get();
        $rub3 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',3)
                                      ->where('crop_id',5)->groupBy('crop_id')
                                      ->get();
        $rub4 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',4)
                                      ->where('crop_id',5)->groupBy('crop_id')
                                      ->get();
        $rub5 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',5)
                                      ->where('crop_id',5)->groupBy('crop_id')
                                      ->get();
               
        $rubber = [round($rub1[0]->sum ?? 0),round($rub2[0]->sum ?? 0),round($rub3[0]->sum ?? 0),
                   round($rub4[0]->sum ?? 0),round($rub5[0]->sum ?? 0)];
        
        //Shea
        $shea1 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',1)
                                      ->where('crop_id',4)->groupBy('crop_id')
                                      ->get();
        $shea2 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',2)
                                      ->where('crop_id',4)->groupBy('crop_id')
                                      ->get();
        $shea3 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',3)
                                      ->where('crop_id',4)->groupBy('crop_id')
                                      ->get();
        $shea4 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',4)
                                      ->where('crop_id',4)->groupBy('crop_id')
                                      ->get();
        $shea5 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',5)
                                      ->where('crop_id',4)->groupBy('crop_id')
                                      ->get();
               
        $shea = [round($shea1[0]->sum ?? 0),round($shea2[0]->sum ?? 0),round($shea3[0]->sum ?? 0),
                   round($shea4[0]->sum ?? 0),round($shea5[0]->sum ?? 0)];
        
        //palm
        $pam1 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',1)
                                      ->where('crop_id',6)->groupBy('crop_id')
                                      ->get();
        $pam2 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',2)
                                      ->where('crop_id',6)->groupBy('crop_id')
                                      ->get();
        $pam3 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',3)
                                      ->where('crop_id',6)->groupBy('crop_id')
                                      ->get();
        $pam4 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',4)
                                      ->where('crop_id',6)->groupBy('crop_id')
                                      ->get();
        $pam5 = DB::table('farm_details')->select('crop_id',DB::raw('SUM(seedlings) as sum'))->where('district_id',5)
                                      ->where('crop_id',6)->groupBy('crop_id')
                                      ->get();
               
        $palm = [round($pam1[0]->sum ?? 0),round($pam2[0]->sum ?? 0),round($pam3[0]->sum ?? 0),
                   round($pam4[0]->sum ?? 0),round($pam5[0]->sum ?? 0)];
        
       return ['cat'=>$cat,
               'mango'=>$mango,
               'coffee'=>$coffee,
               'coconut'=>$coconut,
               'cashew'=>$cashew,
               'rubber'=>$rubber,
               'shea'=>$shea,
               'palm'=>$palm,
           ];

       
    }

}
