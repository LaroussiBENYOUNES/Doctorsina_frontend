<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Gastrologyexam;
use App\Http\Requests\CreateGastrologyexamRequest;
use App\Http\Requests\UpdateGastrologyexamRequest;
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


class GastrologyexamController extends Controller {

	/**
	 * Display a listing of gastrologyexam
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
			$gastrologyexam = DB::table('gastrologyexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->select('consultation.*','gastrologyexam.*')->where('gastrologyexam.deleted_at',null)->get();
		}
		
		else if($user->role_id==10)
			{
				$doctor = Doctor::where('user_id', $user->id)->get();
				$idsp= $doctor->all()[0]->getAttributes()['speciality_id'];
				$gastrologyexam = DB::table('gastrologyexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->where([['gastrologyexam.speciality_id',$idsp],['gastrologyexam.deleted_at',null]])->select('consultation.*','gastrologyexam.*')->get();
			}

			else {
				$patient = Patient::where('user_id', $user->id)->get();
				$idp= $patient->all()[0]->getAttributes()['id'];
				$gastrologyexam = DB::table('gastrologyexam')->join('consultation', 'consultation.id', '=', 'consultation_id')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->where([['gastrologyexam.deleted_at',null], ['appoitement.patient_id',$idp]])->select('consultation.*','gastrologyexam.*')->get();
			}
					
		return view('admin.gastrologyexam.index', compact('gastrologyexam'));
	}

	/**
	 * Show the form for creating a new gastrologyexam
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
	    return view('admin.gastrologyexam.create', compact("consultations","consultation"));
	}

	/**
	 * Store a newly created gastrologyexam in storage.
	 *
     * @param CreateGastrologyexamRequest|Request $request
	 */
	public function store(CreateGastrologyexamRequest $request)
	{
		$request->merge(['speciality_id' => 1]);

		Gastrologyexam::create($request->all());

		return redirect()->route(config('quickadmin.route').'.gastrologyexam.index');
	}

	/**
	 * Show the form for editing the specified gastrologyexam.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$gastrologyexam = gastrologyexam::find($id);
		$user = auth()->user();
		
		if ($user->role_id == 10) { 

		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$consultations = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->get();
			
		}
		else if ($user->role_id == 1) {
						$consultations = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->select('consultation.*')->where('appoitement.doctor_id', '=' , $arr['id'])->get();
		}
		return view('admin.gastrologyexam.edit', compact("consultations", "gastrologyexam"));
	}

	/**
	 * Update the specified gastrologyexam in storage.
     * @param UpdateGastrologyexamRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateGastrologyexamRequest $request)
	{
		$gastrologyexam = Gastrologyexam::findOrFail($id);

		$gastrologyexam->update($request->all());

		return redirect()->route(config('quickadmin.route').'.gastrologyexam.index');
	}

	/**
	 * Remove the specified gastrologyexam from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Gastrologyexam::destroy($id);

		return redirect()->route(config('quickadmin.route').'.gastrologyexam.index');
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
            Gastrologyexam::destroy($toDelete);
        } else {
            Gastrologyexam::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.gastrologyexam.index');
    }

}
