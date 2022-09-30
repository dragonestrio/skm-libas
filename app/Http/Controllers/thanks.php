<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class thanks extends Controller
{
    public function thanks() {
        return view("frontend.thanks");
    }
}
