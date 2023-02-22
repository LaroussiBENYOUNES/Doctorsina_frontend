<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Detailsprescription;
use App\Http\Requests\CreateDetailsprescriptionRequest;
use App\Http\Requests\UpdateDetailsprescriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Prescription;
use App\Drug;
use App\Doctor;
use App\Patient;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class DetailsprescriptionController extends Controller {

	/**
	 * Display a listing of detailsprescription
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        //$detailsprescription = Detailsprescription::with("prescription")->with("drug")->get();
		$user = auth()->user();
		if($user->role_id == 1) {
			$detailsprescription = DB::table('detailsprescription')->join('drug' , 'detailsprescription.drug_id', '=', 'drug.id')->join('prescription', 'detailsprescription.prescription_id', '=', 'prescription.id')->join('consultation','prescription.consultation_id', '=', 'consultation.id')->join('appoitement','consultation.appoitement_id', '=', 'appoitement.id')->select('detailsprescription.*', 'drug.alias as drug_alias')->where('detailsprescription.deleted_at',null)->get();	
		}
		else if ($user->role_id == 10) {
			$doctor = Doctor::select()->where('user_id', $user->id)->get();
			$arr = $doctor[0]->getAttributes();
			$detailsprescription = DB::table('detailsprescription')->join('drug' , 'detailsprescription.drug_id', '=', 'drug.id')->join('prescription', 'detailsprescription.prescription_id', '=', 'prescription.id')->join('consultation','prescription.consultation_id', '=', 'consultation.id')->join('appoitement','consultation.appoitement_id', '=', 'appoitement.id')->select('detailsprescription.*', 'drug.alias as drug_alias')->where([['appoitement.doctor_id', $arr['id']],['detailsprescription.deleted_at',null]])->get();	
		}

		else {
			$patient = Patient::select()->where('user_id', $user->id)->get();
			$arr = $patient[0]->getAttributes();
			$detailsprescription = DB::table('detailsprescription')->join('drug' , 'detailsprescription.drug_id', '=', 'drug.id')->join('prescription', 'detailsprescription.prescription_id', '=', 'prescription.id')->join('consultation','prescription.consultation_id', '=', 'consultation.id')->join('appoitement','consultation.appoitement_id', '=', 'appoitement.id')->select('detailsprescription.*', 'drug.alias as drug_alias')->where([['appoitement.patient_id', $arr['id']],['detailsprescription.deleted_at',null]])->get();	
		}
	
		return view('admin.detailsprescription.index', compact('detailsprescription'));
	}

	/**
	 * Show the form for creating a new detailsprescription
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $prescription = Prescription::pluck("label", "id")->prepend('Please select', null);
$drug = Drug::pluck("alias", "id")->prepend('Please select', null);

	    
	    return view('admin.detailsprescription.create', compact("prescription", "drug"));
	}

	/**
	 * Store a newly created detailsprescription in storage.
	 *
     * @param CreateDetailsprescriptionRequest|Request $request
	 */
	public function store(CreateDetailsprescriptionRequest $request)
	{
	    
		Detailsprescription::create($request->all());

		return redirect()->route(config('quickadmin.route').'.detailsprescription.index');
	}

	/**
	 * Show the form for editing the specified detailsprescription.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$detailsprescription = Detailsprescription::find($id);
	    $prescription = Prescription::pluck("label", "id")->prepend('Please select', null);
        $drug = Drug::pluck("alias", "id")->prepend('Please select', null);

	    
		return view('admin.detailsprescription.edit', compact('detailsprescription', "prescription", "drug"));
	}

	/**
	 * Update the specified detailsprescription in storage.
     * @param UpdateDetailsprescriptionRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDetailsprescriptionRequest $request)
	{
		$detailsprescription = Detailsprescription::findOrFail($id);

        

		$detailsprescription->update($request->all());

		return redirect()->route(config('quickadmin.route').'.detailsprescription.index');
	}

	/**
	 * Remove the specified detailsprescription from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Detailsprescription::destroy($id);

		return redirect()->route(config('quickadmin.route').'.detailsprescription.index');
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
            Detailsprescription::destroy($toDelete);
        } else {
            Detailsprescription::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.detailsprescription.index');
    }

}
