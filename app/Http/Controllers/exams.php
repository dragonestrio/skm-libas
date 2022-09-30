<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exams extends Controller
{
    public function exams() {
        return view("frontend.exams");
    }
}
