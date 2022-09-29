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
        ($request->input('page') == null) ? $request->merge(['page' => 1]) : '';
        (count($request->input()) > 0)
            ? $questions = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions'), null)
            : $questions = $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'questions'), null);

        $data = [
            'title'                     => 'Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'pertanyaan',
            'question'                  => $questions->data,
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
            'questions_category'    => $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'questions_categories'), null)->data,
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
        $questions = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions'), null);
        if (isset($questions->error) && $questions->error == 'Failed to Validate') {
            return redirect('questions/create')->withErrors($questions->data)->withInput();
        }

        $result = $questions->success;
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
        $questions = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions'), $question->id);
        $check_questions = count((array) $questions->data);

        $data = [
            'title'                     => 'Perbarui Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'pertanyaan',
            'questions_category'        => $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'questions_categories'), null)->data,
            'question_count'            => $check_questions,
            'question'                  => $questions->data,
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
        $questions = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions'), $question->id);
        if (isset($questions->error) && $questions->error == 'Failed to Validate') {
            return redirect('questions/' . $question->id . '/edit')->withErrors($questions->data)->withInput();
        }

        $result = $questions->success;
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
        $questions = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions'), $question->id);

        $result = $questions->success;
        if ($result == true) {
            return redirect('questions')->with('notif-y', 'sukses');
        } else {
            return redirect('questions')->with('notif-x', 'error');
        }
    }
}
