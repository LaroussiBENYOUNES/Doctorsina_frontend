<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Generalexam;
use App\Http\Requests\CreateGeneralexamRequest;
use App\Http\Requests\UpdateGeneralexamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Consultation;
use App\Speciality;
use App\Appoitement;
use App\Doctor;
use App\Patient;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class GeneralexamController extends Controller {

	/**
	 * Display a listing of generalexam
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        //$generalexam = Generalexam::with("consultation")->with("speciality")->get();
		$user = auth()->user();
		if($user->role_id==1)
		{
			$generalexam = DB::table('generalexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->select('consultation.*','generalexam.*')->where('generalexam.deleted_at',null)->get();
		}
		
		else if($user->role_id==10)
			{
				$doctor = Doctor::where('user_id', $user->id)->get();
				$idsp= $doctor->all()[0]->getAttributes()['speciality_id'];
				$generalexam = DB::table('generalexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->where([['generalexam.speciality_id',$idsp],['generalexam.deleted_at',null]])->select('consultation.*','generalexam.*')->get();
			}

			else {
				$patient = Patient::where('user_id', $user->id)->get();
				$idp= $patient->all()[0]->getAttributes()['id'];
				$generalexam = DB::table('generalexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->where([['generalexam.deleted_at',null], ['appoitement.patient_id',$idp]])->select('consultation.*','generalexam.*')->get();
			}
					
		return view('admin.generalexam.index', compact('generalexam'));
	}

	/**
	 * Show the form for creating a new generalexam
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		$user = auth()->user();
		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$consultations = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->get();
	    $consultation =  DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->pluck('id', 'id')->prepend('Please select', 0);
        //$speciality = Speciality::pluck("name", "id")->prepend('Please select', null);
	    return view('admin.generalexam.create', compact("consultations","consultation"));
	}

	/**
	 * Store a newly created generalexam in storage.
	 *
     * @param CreateGeneralexamRequest|Request $request
	 */
	public function store(CreateGeneralexamRequest $request)
	{
		$request->merge(['speciality_id' => 1]);
		Generalexam::create($request->all());

		return redirect()->route(config('quickadmin.route').'.generalexam.index');
	}

	/**
	 * Show the form for editing the specified generalexam.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$generalexam = Generalexam::find($id);
		$user = auth()->user();
		
		if ($user->role_id == 10) { 

		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$consultations = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->get();
			
		}
		else if ($user->role_id == 1) {
						$consultations = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->get();
		}
		return view('admin.generalexam.edit', compact("consultations", "generalexam"));
	}

	/**
	 * Update the specified generalexam in storage.
     * @param UpdateGeneralexamRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGeneralexamRequest $request)
	{
		$generalexam = Generalexam::findOrFail($id);

		$generalexam->update($request->all());

		return redirect()->route(config('quickadmin.route').'.generalexam.index');
	}

	/**
	 * Remove the specified generalexam from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Generalexam::destroy($id);

		return redirect()->route(config('quickadmin.route').'.generalexam.index');
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
            Generalexam::destroy($toDelete);
        } else {
            Generalexam::whereNotNull('id')->delete();
        }

         return redirect()->route(config('quickadmin.route').'.generalexam.index');
    }

}
