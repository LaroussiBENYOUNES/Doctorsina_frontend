<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Certificate;
use App\Http\Requests\CreateCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Http\Request;
use App\Doctor;
use App\Consultation;
use App\Patient;
use Illuminate\Support\Facades\DB;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}


class CertificateController extends Controller {

	/**
	 * Display a listing of certificate
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
       // $certificate = Certificate::with("consultation")->get();
		$user = auth()->user();
		if($user->role_id==1) {
			$certificate = DB::table('certificate')->join('consultation', 'certificate.consultation_id', '=', 'consultation.id')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->join('patient', 'appoitement.patient_id', '=', 'patient.id')->select('patient.*', 'certificate.*')->where('certificate.deleted_at', null)->get();
		}
		else if($user->role_id == 10){
		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$certificate = DB::table('certificate')->join('consultation', 'certificate.consultation_id', '=', 'consultation.id')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->join('patient', 'appoitement.patient_id', '=', 'patient.id')->select('patient.*', 'certificate.*')->where([['appoitement.doctor_id', $arr['id']], ['certificate.deleted_at', null]])->get();
	   // dd($certificate);
		}

		else {
			$patient = Patient::where('user_id', $user->id)->get();
			$idp= $patient->all()[0]->getAttributes()['id'];
			$certificate = DB::table('certificate')->join('consultation', 'certificate.consultation_id', '=', 'consultation.id')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->join('patient', 'appoitement.patient_id', '=', 'patient.id')->select('patient.*', 'certificate.*')->where([['appoitement.patient_id', $idp],['certificate.deleted_at', null]])->get();
		}

		return view('admin.certificate.index', compact('certificate'));
	}

	/**
	 * Show the form for creating a new certificate
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		$user = auth()->user();
		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$consultation = DB::table('consultation')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->select('consultation.*')->where('appoitement.doctor_id', $arr['id'])->pluck("id", "id")->prepend('Please select', 0);
	    
	    return view('admin.certificate.create', compact("consultation"));
	}

	/**
	 * Store a newly created certificate in storage.
	 *
     * @param CreateCertificateRequest|Request $request
	 */
	public function store(CreateCertificateRequest $request)
	{
		$request->merge(['activated' => 1]);

		Certificate::create($request->all());

		return redirect()->route(config('quickadmin.route').'.certificate.index');
	}

	/**
	 * Show the form for editing the specified certificate.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$certificate = Certificate::find($id);
	    $user = auth()->user();
		$consultation;
		if($user->role_id == 10)
		{
			$doctor = Doctor::select()->where('user_id', $user->id)->get();
			$arr = $doctor[0]->getAttributes();
			$consultation = DB::table('consultation')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->select('consultation.*')->where('appoitement.doctor_id', $arr['id'])->pluck("id", "id")->prepend('Please select', 0);
		}
		else 
		$consultation = DB::table('consultation')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->select('consultation.*')->pluck("id", "id")->prepend('Please select', 0);

			//dd($consultation);
		return view('admin.certificate.edit', compact('certificate', "consultation"));
	}

	/**
	 * Update the specified certificate in storage.
     * @param UpdateCertificateRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCertificateRequest $request)
	{
		$certificate = Certificate::findOrFail($id);

		$request->merge(['activated' => 1]);


	

		$certificate->update($request->all());

		return redirect()->route(config('quickadmin.route').'.certificate.index');
	}

	/**
	 * Remove the specified certificate from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Certificate::destroy($id);

		return redirect()->route(config('quickadmin.route').'.certificate.index');
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
            Certificate::destroy($toDelete);
        } else {
            Certificate::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.certificate.index');
    }

}
