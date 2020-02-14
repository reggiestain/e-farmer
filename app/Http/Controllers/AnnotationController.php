<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GoogleCloudVision\GoogleCloudVision;
use GoogleCloudVision\Request\AnnotateImageRequest;
use JWTAuth;

class AnnotationController extends Controller
{
  public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    //show the upload form
    public function displayForm(){
        return view('annotate');
    }

    public function annotateImage(Request $request){
      if($request->file('image')){
        //convert image to base64
        $image = base64_encode(file_get_contents($request->file('image')));

        //prepare request
        $request = new AnnotateImageRequest();
        $request->setImage($image);
        $request->setFeature("TEXT_DETECTION");
        $gcvRequest = new GoogleCloudVision([$request],  env('GOOGLE_CLOUD_KEY'));
        //send annotation request
        $response = $gcvRequest->annotate();
        
        return response()->json([
                'success' => true,
                "results" => $response->responses[0]->textAnnotations[0]->description
            ], 200);
      }
      
      return response()->json([
                'success' => false,
                'message' => "The file you're trying to upload might be corrupt, please try again."
            ], 500);
    }
}
