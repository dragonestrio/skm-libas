<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Questions_category;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $question = Question::latest();

        if ($request->input('search')) {
            $question
                ->where('name', 'like', '%' . $request->input('search') . '%');
        }

        $data = [
            'title'                     => 'Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'pertanyaan',
            'question'                  => $question->simplePaginate(8),
        ];

        return view('question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'             => 'Tambah Pertanyaan',
            'app'               => 'SKM LIBAS',
            'author'            => '',
            'description'       => '',
            'state'             => 'create',
            'position'          => 'pertanyaan',
            'question_category' => Questions_category::latest()->get(),
        ];

        return view('question.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return redirect('questions/create')->withErrors($validate)->withInput();
        }

        $data = [
            'questions_categorie_id'    => $request->input('questions_categorie_id'),
            'name'                      => $request->input('name'),
        ];

        $result = Question::create($data);
        if ($result == true) {
            return redirect('questions')->with('notif-y', 'sukses');
        } else {
            return redirect('questions/create')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $check_question = $question::where('id', $question->id)->count();
        $questiona = $question::where('id', $question->id)->first();
        $data = [
            'title'                     => 'Perbarui Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'pertanyaan',
            'question_count'            => $check_question,
            'question_category'         => Questions_category::latest()->get(),
            'question_category_recent'  => Questions_category::where('id', $questiona->questions_categorie_id)->first(),
            'question'                  => $questiona,
        ];

        return view('question.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return redirect('questions/' . $question->id . '/edit')->withErrors($validate)->withInput();
        }

        $data = [
            'questions_categorie_id' => $request->input('questions_categorie_id'),
            'name'                  => $request->input('name'),
        ];

        $result = Question::where('id', $question->id)->update($data);
        if ($result == true) {
            return redirect('questions')->with('notif-y', 'sukses');
        } else {
            return redirect('questions/' . $question->id . '/edit')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $result = $question::destroy($question->id);

        if ($result == true) {
            return redirect('questions')->with('notif-y', 'sukses');
        } else {
            return redirect('questions')->with('notif-x', 'error');
        }
    }

    public function validation($type = false, $request)
    {
        switch ($type) {
            case 'login':
                break;

            case 'update':
                $validation = validator($request->all(), [
                    'questions_categorie_id'  => ['required', 'string', 'exists:questions_categories,id'],
                    'name'                  => ['required', 'string', 'min:5'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'questions_categorie_id'  => ['required', 'string', 'exists:questions_categories,id'],
                    'name'                  => ['required', 'string', 'min:5'],
                ]);
                break;
        }

        return $validation;
    }
}
