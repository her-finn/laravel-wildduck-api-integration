<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class wildduckController extends Controller
{
    public static function Req($data){
        if(!isset($data["data"]))
            $data["data"] = [];
        if(!isset($data["method"]))
            $data["method"] = "get";
        switch($data["method"]){
            case "get":
                $return = Http::withHeaders([
                    'X-Access-Token' => env("WILDDUCK_API_TOKEN")
                ])->get(env("WILDDUCK_API_URL") . $data["url"],$data["data"]);
            break;
            case "post":
                $return = Http::withHeaders([
                    'X-Access-Token' => env("WILDDUCK_API_TOKEN")
                ])->post(env("WILDDUCK_API_URL") . $data["url"],$data["data"]);
            break;
            case "put":
                $return = Http::withHeaders([
                    'X-Access-Token' => env("WILDDUCK_API_TOKEN")
                ])->put(env("WILDDUCK_API_URL") . $data["url"],$data["data"]);
            break;
            case "delete":
                $return = Http::withHeaders([
                    'X-Access-Token' => env("WILDDUCK_API_TOKEN")
                ])->delete(env("WILDDUCK_API_URL") . $data["url"],$data["data"]);
            break;
        }
        if($return->status() != 200)
            return false;
        return($return->json());
        
    }
    
}
