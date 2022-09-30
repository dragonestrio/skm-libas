<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class QuestionController extends Controller
{
    public function index(Request $request)
    {

        $data = Question::with("category")->orderBy("questions_categorie_id", "ASC")->simplePaginate(1);

        return response([
            'code' => 200,
            'success' => true,
            'message' => "Daftar Pertanyaan",
            'data' => $data,
        ], 200);
    }
}
