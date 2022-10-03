<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fe_quisioner extends Controller
{
    public function index() {
        return view("frontend.index");
    }
}
