<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/* 
* Function to get access token from api endpoint using
* created api_key and secret_key
*/
function getAuth(){
    $api_key = config('services.apmedic.api_key');
    $secret_key = config('services.apmedic.secret_key');
    // hashed password attached to bearer
    $computedHash = base64_encode(hash_hmac ( 'md5' , 'https://authservice.priaid.ch/login' , $secret_key, true ));
	$authorization = 'Bearer '.$api_key.':'.$computedHash;
    // token generated assigned to $obj variable
    $obj = Http::withHeaders([
        'Content-Type'=> 'application/json',
        'Authorization' => $authorization
    ])
    ->post("https://authservice.priaid.ch/login");
    return $obj['Token'];
}

class DiagnosisController extends Controller
{
    
    //
    public function index(){
        // assign token as ACCESS_TOKEN     
        $config_token = getAuth();

        $symptoms = Http::get("https://healthservice.priaid.ch/symptoms?token=$config_token&format=json&language=en-gb")
        ->json();
        return view('index', ['symptoms'=> $symptoms]);
    }

    public function result(){
            $config_token= getAuth();
            $symptoms = request('symptoms');
            $gender = request('gender');
            $age = request('age');
            $diagnoses = Http::get("https://healthservice.priaid.ch/diagnosis?symptoms=[$symptoms]&gender=$gender&year_of_birth=$age&token=$config_token&format=json&language=en-gb")
        ->json();
        // return $age;
        return view('result', ['diagnoses'=> $diagnoses]);
    }
}
