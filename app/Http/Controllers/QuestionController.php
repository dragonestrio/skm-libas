<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Questions_category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Api $api)
    {
        $questions = Question::join('questions_categories', 'questions_categories.id', 'questions.questions_categorie_id')
            ->latest('questions.created_at')
            ->select('questions.*', 'questions_categories.name as questions_categorie_name');

        if ($request->input('search')) {
            $questions
                ->where('questions.name', 'like', '%' . $request->input('search') . '%')
                ->orwhere('questions_categories.name', 'like', '%' . $request->input('search') . '%');
        }

        $data = [
            'title'                     => 'Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'pertanyaan',
            'question'                  => $questions->simplePaginate(8),
        ];

        return view('question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Api $api)
    {
        $data = [
            'title'                 => 'Tambah Pertanyaan',
            'app'                   => 'SKM LIBAS',
            'author'                => '',
            'description'           => '',
            'state'                 => 'create',
            'position'              => 'pertanyaan',
            'questions_category'    => Questions_category::get(),
        ];

        return view('question.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Api $api)
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
        // EMPTY
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Api $api, Question $question, Request $request)
    {
        $questions = $question::where('id', $question->id);
        $check_questions = $question->count();

        $data = [
            'title'                     => 'Perbarui Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'pertanyaan',
            'questions_category'        => Questions_category::get(),
            'question_count'            => $check_questions,
            'question'                  => $questions->first(),
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
    public function update(Request $request, Api $api, Question $question)
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
    public function destroy(Request $request, Api $api, Question $question)
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
