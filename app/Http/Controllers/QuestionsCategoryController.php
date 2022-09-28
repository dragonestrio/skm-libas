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
    public function index(Request $request)
    {
        $question_category = Questions_category::latest();

        if ($request->input('search')) {
            $question_category
                ->where('name', 'like', '%' . $request->input('search') . '%');
        }

        $data = [
            'title'                     => 'Kategori Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'read',
            'position'                  => 'kategori pertanyaan',
            'question_category'         => $question_category->simplePaginate(8),
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
    public function store(Request $request)
    {
        $validate = $this->validation(false, $request);
        if ($validate->fails()) {
            return redirect('questions_categories/create')->withErrors($validate)->withInput();
        }

        $data = [
            'name'          => $request->input('name'),
        ];

        $result = Questions_category::create($data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questions_category  $questions_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Questions_category $questions_category)
    {
        $check_question_category = $questions_category::where('id', $questions_category->id)->count();
        $data = [
            'title'                     => 'Perbarui Kategori Pertanyaan',
            'app'                       => 'SKM LIBAS',
            'author'                    => '',
            'description'               => '',
            'state'                     => 'update',
            'position'                  => 'kategori pertanyaan',
            'question_category_count'   => $check_question_category,
            'question_category'         => $questions_category::where('id', $questions_category->id)->first(),
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
    public function update(Request $request, Questions_category $questions_category)
    {
        $validate = $this->validation('update', $request);
        if ($validate->fails()) {
            return redirect('questions_categories/' . $questions_category->id . '/edit')->withErrors($validate)->withInput();
        }

        $data = [
            'name'          => $request->input('name'),
        ];

        $result = Questions_category::where('id', $questions_category->id)->update($data);
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
    public function destroy(Questions_category $questions_category)
    {
        $result = $questions_category::destroy($questions_category->id);

        if ($result == true) {
            return redirect('questions_categories')->with('notif-y', 'sukses');
        } else {
            return redirect('questions_categories')->with('notif-x', 'error');
        }
    }

    public function validation($type = false, $request)
    {
        switch ($type) {
            case 'login':
                break;

            case 'update':
                $validation = validator($request->all(), [
                    'name'                  => ['required', 'string', 'min:5', 'max:50'],
                ]);
                break;

            case 'update-img':
                break;

            default:
                $validation = validator($request->all(), [
                    'name'                  => ['required', 'string', 'min:5', 'max:50', 'unique:questions_categories,name'],
                ]);
                break;
        }

        return $validation;
    }
}
