<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Pneumologyexam;
use App\Http\Requests\CreatePneumologyexamRequest;
use App\Http\Requests\UpdatePneumologyexamRequest;
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

	
class PneumologyexamController extends Controller {

	/**
	 * Display a listing of pneumologyexam
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if($user->role_id==1)
		{
			$pneumologyexam = DB::table('pneumologyexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->select('consultation.*','pneumologyexam.*')->where('pneumologyexam.deleted_at',null)->get();
		}
		
		else if($user->role_id==10)
			{
				$doctor = Doctor::where('user_id', $user->id)->get();
				$idsp= $doctor->all()[0]->getAttributes()['speciality_id'];
				$pneumologyexam = DB::table('pneumologyexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->where([['pneumologyexam.speciality_id',$idsp],['pneumologyexam.deleted_at',null]])->select('consultation.*','pneumologyexam.*')->get();
			}

			else {
				$patient = Patient::where('user_id', $user->id)->get();
				$idp= $patient->all()[0]->getAttributes()['id'];
				$pneumologyexam = DB::table('pneumologyexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->where([['pneumologyexam.deleted_at',null], ['appoitement.patient_id',$idp]])->select('consultation.*','pneumologyexam.*')->get();
			}
					
		return view('admin.pneumologyexam.index', compact('pneumologyexam'));
	}

	/**
	 * Show the form for creating a new pneumologyexam
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
	    return view('admin.pneumologyexam.create', compact("consultations","consultation"));
	}

	/**
	 * Store a newly created pneumologyexam in storage.
	 *
     * @param CreatePneumologyexamRequest|Request $request
	 */
	public function store(CreatePneumologyexamRequest $request)
	{
		$request->merge(['speciality_id' => 1]);

		Pneumologyexam::create($request->all());

		return redirect()->route(config('quickadmin.route').'.pneumologyexam.index');
	}

	/**
	 * Show the form for editing the specified pneumologyexam.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$pneumologyexam = pneumologyexam::find($id);
		$user = auth()->user();
		
		if ($user->role_id == 10) { 

		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$consultations = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->get();
			
		}
		else if ($user->role_id == 1) {
						$consultations = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->get();
		}
		return view('admin.pneumologyexam.edit', compact("consultations", "pneumologyexam"));
	}

	/**
	 * Update the specified pneumologyexam in storage.
     * @param UpdatePneumologyexamRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePneumologyexamRequest $request)
	{
		$pneumologyexam = Pneumologyexam::findOrFail($id);
		
		$pneumologyexam->update($request->all());

		return redirect()->route(config('quickadmin.route').'.pneumologyexam.index');
	}

	/**
	 * Remove the specified pneumologyexam from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Pneumologyexam::destroy($id);

		return redirect()->route(config('quickadmin.route').'.pneumologyexam.index');
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
            Pneumologyexam::destroy($toDelete);
        } else {
            Pneumologyexam::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.pneumologyexam.index');
    }

}
