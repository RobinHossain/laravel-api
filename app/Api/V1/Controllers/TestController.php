<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
//use Dingo\Api\Routing\Helpers;

class TestController extends Controller
{
//    use Helpers;


    public function index(){
        $currentUser = JWTAuth::parseToken()->authenticate();
        return response()->json([
            'user' => $currentUser,
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    }
}
