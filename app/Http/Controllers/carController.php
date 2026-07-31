<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carController extends Controller
{
    public function index()
    {
        return "index method from car controller";
    }
    public function myCars()
    {
        return " this is from my car";
    }
}
