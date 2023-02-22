<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Response;
use App\Http\Requests\CreateResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Question;
use App\Consultation;
use App\Doctor;
use App\Patient;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
class ResponseController extends Controller {

	/**
	 * Display a listing of response
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();

		if($user->role_id == 1) 
		{
			$response = DB::table('response')->join('question', 'response.question_id', '=', 'question.id')->select('response.*' ,'question.alias as question_alias')->where([['response.deleted_at', null]])->get();
		}
		else if ($user->role_id == 10){
			$doctor = Doctor::select()->where('user_id', $user->id)->get();
			$arr = $doctor[0]->getAttributes();
			$response = DB::table('response')->join('question', 'response.question_id', '=', 'question.id')->join('consultation','response.consultation_id', '=', 'consultation.id')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->select('response.*' , 'question.alias as question_alias')->where([['appoitement.doctor_id', $arr['id']], ['response.deleted_at', null]])->get();
		}

		else {
			$patient = Patient::select()->where('user_id', $user->id)->get();
			$arr = $patient[0]->getAttributes();
			$response = DB::table('response')->join('question', 'response.question_id', '=', 'question.id')->join('consultation','response.consultation_id', '=', 'consultation.id')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->select('response.*' , 'question.alias as question_alias')->where([['appoitement.patient_id', $arr['id']], ['response.deleted_at', null]])->get();

		}

		return view('admin.response.index', compact('response'));
	}

	/**
	 * Show the form for creating a new response
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $question = Question::pluck("alias", "id")->prepend('Please select', null);
$consultation = Consultation::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.response.create', compact("question", "consultation"));
	}

	/**
	 * Store a newly created response in storage.
	 *
     * @param CreateResponseRequest|Request $request
	 */
	public function store(CreateResponseRequest $request)
	{
	    
		Response::create($request->all());

		return redirect()->route(config('quickadmin.route').'.response.index');
	}

	/**
	 * Show the form for editing the specified response.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$response = Response::find($id);
		//dd($response);
	    $question = Question::pluck("alias", "id")->prepend('Please select','0');
$consultation = Consultation::pluck("id", "id")->prepend('Please select', '0');

	    
		return view('admin.response.edit', compact('response', "question", "consultation"));
	}

	/**
	 * Update the specified response in storage.
     * @param UpdateResponseRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateResponseRequest $request)
	{
		$response = Response::findOrFail($id);

		$response->update($request->all());

		return redirect()->route(config('quickadmin.route').'.response.index');
	}

	/**
	 * Remove the specified response from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Response::destroy($id);

		return redirect()->route(config('quickadmin.route').'.response.index');
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
            Response::destroy($toDelete);
        } else {
            Response::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.response.index');
    }

}
