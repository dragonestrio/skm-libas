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

        $question = cache('questionCache');

        $data = [];
        if (!$question) {
            $data = Question::with("category")->orderBy("questions_categorie_id", "ASC")->paginate(1);


            if ($request["page"] != null) {
                if ($request['page'] == 1) {
                    $data->forget(0);
                }
            } else {
                $data->forget(0);
            }


            $primary = Question::latest()->get()->first();

            Cache::put('questionCache', $data, now()->addMinutes(60));
        } else {
            $data = $question;
        }

        return response([
            'code' => 200,
            'success' => true,
            'message' => "Pertanyaan",
            'data' => $data,
        ], 200);
    }
}
