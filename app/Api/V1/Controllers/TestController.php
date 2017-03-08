<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //

    public function index(){
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    }
}
