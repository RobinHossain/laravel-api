<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
