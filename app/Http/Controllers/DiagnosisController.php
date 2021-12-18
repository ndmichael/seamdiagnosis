<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

function getAuth(){
    $api_key = config('services.apmedic.api_key');
    $secret_key = config('services.apmedic.secret_key');

    $computedHash = base64_encode(hash_hmac ( 'md5' , 'https://authservice.priaid.ch/login' , $secret_key, true ));
	$authorization = 'Bearer '.$api_key.':'.$computedHash;
    $r = Http::withHeaders([
        'Content-Type'=> 'application/json',
        'Authorization' => $authorization
    ])
    ->post("https://authservice.priaid.ch/login");
    if($r !== null){
        return ($r['Token']);
    }   
}

class DiagnosisController extends Controller
{
    
    //
    public function index(){
        $ACCESS_TOKEN = getAuth();

        $symptoms = Http::get("https://healthservice.priaid.ch/symptoms?token=$ACCESS_TOKEN&format=json&language=en-gb")
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
       
        // return $diagnoses;
        return view('result', ['diagnoses'=> $diagnoses]);
    }
}
