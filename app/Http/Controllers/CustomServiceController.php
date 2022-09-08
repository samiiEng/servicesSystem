<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customServiceController extends Controller
{
    public function defineCustomServiceForm()
    {

        return view('defineCustomService');
    }

    public function defineCustomService()
    {

    }
}
