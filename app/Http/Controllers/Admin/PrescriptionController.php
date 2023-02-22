<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Prescription;
use App\Http\Requests\CreatePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Consultation;
use App\Drug;
use App\Doctor;
use App\Patient;
use App\Detailsprescription;
// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

	class obj{

	}


class PrescriptionController extends Controller {

	/**
	 * Display a listing of prescription
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();

       
		if ($user->role_id == 10) { 

			$doctor = Doctor::select()->where('user_id', $user->id)->get();
			$arr = $doctor[0]->getAttributes();
			$prescription = DB::table('prescription')->join('consultation', 'prescription.consultation_id', '=', 'consultation.id')->join('appoitement','consultation.appoitement_id', '=', 'appoitement.id')->select('prescription.*')->where([['appoitement.doctor_id', $arr['id']], ['prescription.deleted_at', null]])->get();
	
			}
			else if ($user->role_id == 2) {
				$patient = Patient::select()->where('user_id', $user->id)->get();
				$arr = $patient[0]->getAttributes();
				$prescription = DB::table('prescription')->join('consultation', 'prescription.consultation_id', '=', 'consultation.id')->join('appoitement','consultation.appoitement_id', '=', 'appoitement.id')->select('prescription.*')->where([['appoitement.patient_id', $arr['id']], ['prescription.deleted_at', null]])->get();
			}

			else {
				$prescription = Prescription::with("consultation")->get();

			}

			//dd($prescription);
		
		return view('admin.prescription.index', compact('prescription'));
	}

	/**
	 * Show the form for creating a new prescription
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		$user = auth()->user();
	    $doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$consultation = DB::table('consultation')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->select('consultation.*')->where('appoitement.doctor_id', $arr['id'])->pluck("id", "id")->prepend('Choose consultation', 0);
		$drug = Drug::pluck("alias", "id")->prepend('Choose drug', 0);
	    
	    return view('admin.prescription.create', compact("consultation", "drug"));
	}

	/**
	 * Store a newly created prescription in storage.
	 *
     * @param CreatePrescriptionRequest|Request $request
	 */
	public function store(CreatePrescriptionRequest $request)
	{
		$content = $request->getContent();
		$tabcontent = preg_split ("/\&/", $content); 
		$array_id_drug = array();
		$array_obj_drug = array();
		$rep=0;
		foreach ($tabcontent as $value){
			
		   if(strpos($value, "drug_id") !== false){
				   $id = substr($value, 8);
				   $intid = (int)$id;
				   if ((!(in_array($intid, $array_id_drug))) && $intid != 0) {
					$obj = new obj;
					$obj->iddrug = $intid;
					switch ($intid) {
						case 1:
							$obj->dose = $request->all()['iddosage1'];
							$obj->duration = $request->all()['idperiode1'];
							break;
						case 2:
							$obj->dose = $request->all()['iddosage2'];
							$obj->duration = $request->all()['idperiode2'];
							break;
						case 3:
							$obj->dose = $request->all()['iddosage3'];
							$obj->duration = $request->all()['idperiode3'];
							break;
						case 4:
							$obj->dose = $request->all()['iddosage4'];
							$obj->duration = $request->all()['idperiode4'];
							break;
						case 5:
							$obj->dose = $request->all()['iddosage5'];
							$obj->duration = $request->all()['idperiode5'];
							break;
					}
					   array_push($array_obj_drug, $obj);
					   array_push($array_id_drug, $intid);
				   }
				   else {
					   dd("erreur double id drug | pas de selection");
					   break;
				   }
				   
				}
	   }
	   $request->merge(['activated' => 1]);
	   $newprescription = Prescription::create($request->all());
	   foreach ($array_obj_drug as $o){
	   DB::table('detailsprescription')->insert(
			array('prescription_id' => $newprescription->id,
				  'drug_id' => $o->iddrug,
				  'dose' => $o->dose,
				  'duration' => $o->duration,
				  'created_at' => date('Y-m-d H:i:s'))
		);
	   }

		return redirect()->route(config('quickadmin.route').'.prescription.index');
	}

	/**
	 * Show the form for editing the specified prescription.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$prescription = Prescription::find($id);
	    $consultation = Consultation::pluck("id", "id")->prepend('Please select', null);
		$detailsprescription = Detailsprescription::with("drug")->with("prescription")->where('prescription_id',$id)->get();
		$tabdrug = [];
		foreach($detailsprescription as $dp)
			{
				$dp = $dp->getAttributes();
				array_push($tabdrug, $dp['drug_id']);
			}
			$drug = DB::table('drug')
                    ->whereIn('id', $tabdrug)
                    ->get();
			$drug = $drug->all();
			$firstdrug = $drug[0];
			array_shift($drug);
			$drugs = Drug::all();
			$tabindice = [];
			$i = 1;
			foreach($drug as $dp)
			{
				$dp->indice=$i+1;
			}
			$drugselect = Drug::pluck("alias", "id")->prepend('Choose Drug', 'id');
			$detailsprescriptions = DB::table('detailsprescription')->select('detailsprescription.*')->where([['prescription_id',$id],['deleted_at',null]])->get();
			$firstdetaisprescription = $detailsprescriptions[0];
			unset($detailsprescriptions[0]);
			$i = 1;
			foreach($detailsprescriptions as $dp)
			{
				$dp->indice=$i+1;
				$i = $i + 1;
			}

		//	dd($prescription);
		
			
		return view('admin.prescription.edit', compact('i','firstdetaisprescription', 'detailsprescriptions','prescription', "consultation" , "drug" , "drugselect", "drugs", "firstdrug"));
	}

	/**
	 * Update the specified prescription in storage.
     * @param UpdatePrescriptionRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePrescriptionRequest $request)
	{
		$prescription = Prescription::findOrFail($id);
		$detailsprescription = Detailsprescription::with("prescription")->with("drug")->where([['prescription_id',$id],['deleted_at',null]])->get();
		foreach($detailsprescription as $dp)
		{
			$dp = $dp->getAttributes();
			Detailsprescription::destroy($dp['id']);
		}
        $content = $request->getContent();
		$tabcontent = preg_split ("/\&/", $content); 
		$array_id_drug = array();
		$array_obj_drug = array();
		$rep=0;
		foreach ($tabcontent as $value){
			
		   if(strpos($value, "drug_id") !== false){
				   $idd = substr($value, 8);
				   $intid = (int)$idd;
				   if ((!(in_array($intid, $array_id_drug))) && $intid != 0) {
					$obj = new obj;
					$obj->iddrug = $intid;
					switch ($intid) {
						case 1:
							$obj->dose = $request->all()['iddosage1'];
							$obj->duration = $request->all()['idperiode1'];
							break;
						case 2:
							$obj->dose = $request->all()['iddosage2'];
							$obj->duration = $request->all()['idperiode2'];
							break;
						case 3:
							$obj->dose = $request->all()['iddosage3'];
							$obj->duration = $request->all()['idperiode3'];
							break;
						case 4:
							$obj->dose = $request->all()['iddosage4'];
							$obj->duration = $request->all()['idperiode4'];
							break;
						case 5:
							$obj->dose = $request->all()['iddosage5'];
							$obj->duration = $request->all()['idperiode5'];
							break;
					}
					   array_push($array_obj_drug, $obj);
					   array_push($array_id_drug, $intid);
				   }
				   else {
					   dd("erreur double id drug | pas de selection");
					   break;
				   }
				   
				}
	   }

	  // dd($array_obj_drug);

        foreach ($array_obj_drug as $value){
		$dsp = new Detailsprescription;
		$dsp->prescription_id = $id;
		$dsp->drug_id = $value->iddrug ;
		$dsp->dose=$value->dose;
		$dsp->duration = $value->duration;
		$dsp->save();
	}

	    $request->merge(['activated' => 1]);
		$prescription->update($request->all());

		return redirect()->route(config('quickadmin.route').'.prescription.index');
	}

	/**
	 * Remove the specified prescription from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Prescription::destroy($id);

		return redirect()->route(config('quickadmin.route').'.prescription.index');
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
            Prescription::destroy($toDelete);
        } else {
            Prescription::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.prescription.index');
    }

}
