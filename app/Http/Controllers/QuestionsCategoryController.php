<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestions_categoryRequest;
use App\Http\Requests\UpdateQuestions_categoryRequest;
use App\Models\Questions_category;
use Illuminate\Http\Request;

class QuestionsCategoryController extends Controller
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
            ? $questions_categories = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions_categories'), null)
            : $questions_categories = $api->sendGet(null, url('api/' . date('d_m_Y_', time()) . 'questions_categories'), null);

        $data = [
            'title'                     => 'Kategori Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'kategori pertanyaan',
            'question_category'         => $questions_categories->data,
        ];

        return view('question_category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'         => 'Tambah Kategori Pertanyaan',
            'app'           => 'SKM LIBAS',
            'author'        => '',
            'description'   => '',
            'state'         => 'create',
            'position'      => 'kategori pertanyaan',
        ];

        return view('question_category.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestions_categoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Api $api)
    {
        $questions_categories = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions_categories'), null);
        if (isset($questions_categories->error) && $questions_categories->error == 'Failed to Validate') {
            return redirect('questions_categories/create')->withErrors($questions_categories->data)->withInput();
        }

        $result = $questions_categories->success;
        if ($result == true) {
            return redirect('questions_categories')->with('notif-y', 'sukses');
        } else {
            return redirect('questions_categories/create')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questions_category  $questions_category
     * @return \Illuminate\Http\Response
     */
    public function show(Questions_category $questions_category)
    {
        // EMPTY
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questions_category  $questions_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Questions_category $questions_category, Request $request, Api $api)
    {
        $questions_categories = $api->sendGet($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions_categories'), $questions_category->id);
        $check_questions_categories = count((array) $questions_categories->data);

        $data = [
            'title'                     => 'Perbarui Kategori Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'kategori pertanyaan',
            'question_category_count'   => $check_questions_categories,
            'question_category'         => $questions_categories->data
        ];

        return view('question_category.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestions_categoryRequest  $request
     * @param  \App\Models\Questions_category  $questions_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions_category $questions_category, Api $api)
    {
        $questions_categories = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions_categories'), $questions_category->id);
        if (isset($questions_categories->error) && $questions_categories->error == 'Failed to Validate') {
            return redirect('questions_categories/' . $questions_category->id . '/edit')->withErrors($questions_categories->data)->withInput();
        }

        $result = $questions_categories->success;
        if ($result == true) {
            return redirect('questions_categories')->with('notif-y', 'sukses');
        } else {
            return redirect('questions_categories/' . $questions_category->id . '/edit')->with('notif-x', 'error')->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questions_category  $questions_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions_category $questions_category, Api $api, Request $request)
    {
        $questions_categories = $api->sendPost($request->input(), url('api/' . date('d_m_Y_', time()) . 'questions_categories'), $questions_category->id);

        $result = $questions_categories->success;
        if ($result == true) {
            return redirect('questions_categories')->with('notif-y', 'sukses');
        } else {
            return redirect('questions_categories')->with('notif-x', 'error');
        }
    }
}
