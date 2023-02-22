<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Question;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}


class QuestionController extends Controller {

	/**
	 * Display a listing of question
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $question = Question::all();

		return view('admin.question.index', compact('question'));
	}

	/**
	 * Show the form for creating a new question
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.question.create');
	}

	/**
	 * Store a newly created question in storage.
	 *
     * @param CreateQuestionRequest|Request $request
	 */
	public function store(CreateQuestionRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		Question::create($request->all());

		return redirect()->route(config('quickadmin.route').'.question.index');
	}

	/**
	 * Show the form for editing the specified question.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$question = Question::find($id);
	    
	    
		return view('admin.question.edit', compact('question'));
	}

	/**
	 * Update the specified question in storage.
     * @param UpdateQuestionRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateQuestionRequest $request)
	{
		$question = Question::findOrFail($id);

		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}


		$question->update($request->all());

		return redirect()->route(config('quickadmin.route').'.question.index');
	}

	/**
	 * Remove the specified question from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Question::destroy($id);

		return redirect()->route(config('quickadmin.route').'.question.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Question::destroy($toDelete);
        } else {
            Question::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.question.index');
    }

}
