<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Appoitement;
use App\Http\Requests\CreateAppoitementRequest;
use App\Http\Requests\UpdateAppoitementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MedicalStructureSpeciality;

use App\MedicalStructure;
use App\Patient;
use App\Doctor;
use App\Medicalstaff;
use App\Speciality;
use App\Country;


// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

// classe intermediare
class obj{

}
	

class AppoitementController extends Controller {

	/**
	 * Display a listing of appoitement
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		
		// administrateur doctorsina va voir toute la table appoitement
		if($user->role_id == 1) {
			$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->get();
		}

		// patient consulte ses appoitement
		else if ($user->role_id == 2) {
			$patient = Patient::select()->where('user_id', $user->id)->get();
				if($patient[0] != null)
					{
						$arr = $patient[0]->getAttributes();
						$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('appoitement.patient_id',$arr['id'])->get();
						}
				else 			
			     	$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('patient_id',0)->get();
		     
		}
		
		// docteur consulte ses appoitement
		else if ($user->role_id == 10) {
			$doctor = Doctor::select()->where('user_id', $user->id)->get();
			if($doctor[0] != null)
				{
				$arr = $doctor[0]->getAttributes();
				$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('doctor_id',$arr['id'])->get();
				}
			else
				$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('doctor_id',0)->get();
		} 

		// secretaire || administrateur clinic consulte les appitement de son lieu de travaille
		else {
				$medicalstaffuser = Medicalstaff::with("user")->with("medicalstructure")->where('user_id', $user->id)->get();
				if($medicalstaffuser[0] != null)
					{
						$idmed = $medicalstaffuser[0]->getAttributes()['medicalstructure_id'];
						$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('medicalstructure_id',$idmed)->get();
					}
				else 
					$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('medicalstructure_id',0)->get();
		}
		return view('admin.appoitement.index', compact('appoitement'));
	}

	/**
	 * Show the form for creating a new appoitement
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		$user = auth()->user();
		$patient = Patient::select()->where('user_id', $user->id)->get();
		if($patient[0] != null)
			{
				$arr = $patient[0]->getAttributes();
				$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('appoitement.patient_id',$arr['id'])->get();
				}
		else 			
			 $appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('patient_id',0)->get();
	
	    $medicalstructure = MedicalStructure::select()->get();
        $doctor = Doctor::select()->get();
	    $country = Country::select()->get();
		$speciality = Speciality::select()->get();
		$typesearch = [];
		$wheresearch = [];

		foreach($country as $c) {
		$obj0 = new obj;
		$obj0->id = $c->id;
		$obj0->name = $c->alias;
		array_push($wheresearch, $obj0);
		}		

		foreach($doctor as $d) {
		$obj1 = new obj;
		$obj1->id = $d->id;
		$obj1->type = "d";
		$obj1->name = $d->fullname;
		array_push($typesearch, $obj1);
		}

		foreach($medicalstructure as $m) {
		$obj2 = new obj;
		$obj2->id = $m->id;
		$obj2->type = "m";
		$obj2->name = $m->label;
		array_push($typesearch, $obj2);
		}

		foreach($speciality as $s) {
		$obj3 = new obj;
		$obj3->id = $s->id;
		$obj3->type = "s";
		$obj3->name = $s->name;
		array_push($typesearch, $obj3);
		}

	$step = 1;

	return view('admin.appoitement.create', compact("appoitement","typesearch", "wheresearch", "step"));
	
}

	/**
	 * Store a newly created appoitement in storage.
	 *
     * @param CreateAppoitementRequest|Request $request
	 */
	public function store(CreateAppoitementRequest $request)
	{
		$user = auth()->user();
		if($user->role_id == 2 ) 
	   	{
			   $patient = Patient::select()->where('user_id', $user->id)->get();
			   $idp = (int)($patient[0]->getAttributes()['id']);
			   $request->request->add(['patient_id' => $idp]);
		}
		Appoitement::create($request->all());

		return redirect()->route(config('quickadmin.route').'.appoitement.index');
	}

	/**
	 * Show the form for editing the specified appoitement.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$user = auth()->user();
		$appoitement = Appoitement::find($id);
		if(($user->role_id == 1) || ($user->role_id == 2))
	    $medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', 0);
		else
		$medicalstructure = DB::table('medicalstructure')->join('medicalstaff', 'medicalstaff.medicalstructure_id', '=', 'medicalstructure.id')->select('medicalstructure.*')->where([['user_id',$user->id],['medicalstaff.deleted_at',null]])->pluck("label", "id")->prepend('Please select', 0);
		$patient = Patient::pluck("fullname", "id")->prepend('Please select', "id");
		$doctor = Doctor::pluck("fullname", "id")->prepend('Please select', "id");
		$date = date('Y-m-d');
		$appoitement_doctor = DB::table('appoitement')->select('appoitement.*')->where([['doctor_id',$appoitement->doctor_id],['deleted_at', null],['confirmed',1]])->whereDate('date', '>=', $date)->get();
		$appoitement_doctor = $appoitement_doctor->all();
		$rendezvouspotentiel = [];
		$rendezvouspotentiel[$appoitement->date . ' | ' . $appoitement->time] = $appoitement->date . ' | ' . $appoitement->time;
		$diff = abs(strtotime($appoitement->date) - strtotime($date));
		$years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		if($days>1)
		{
		$date = strtotime($date);
		$date = $date + (3600*24); // add seconds of one day
		$date = date("Y-m-d", $date);
		for ($i = 0; $i <= 10; $i++) {

			    $obj1 = new obj;
		        $obj1->date = $date;
				$obj1->time = "08:30";

				$obj2 = new obj;
		        $obj2->date = $date;
				$obj2->time = "10:00";

				$obj3 = new obj;
		        $obj3->date = $date;
		        $obj3->time = "11:30";

	
				$obj4 = new obj;
				$obj4->date = $date;
				$obj4->time = "14:30";

	
				$obj5 = new obj;
				$obj5->date = $date;
				$obj5->time = "16:00";
		
				$seance1=0;
				$seance2=0;
				$seance3=0;
				$seance4=0;
				$seance5=0;

				foreach($appoitement_doctor as $ad) {
				
					if($seance1!=1)
					{

					if($ad->date==$obj1->date && $ad->time==$obj1->time)
					{
						
						$seance1=1;
					}

					}

					if($seance2!=1)
					{
					if($ad->date==$obj2->date && $ad->time==$obj2->time)
					{
						$seance2=1;
					}
				}
				if($seance3!=1)
					{
					if($ad->date==$obj3->date && $ad->time==$obj3->time)
					{
						$seance3=1;
					}
				}
				if($seance4!=1)
					{
					if($ad->date==$obj4->date && $ad->time==$obj4->time)
					{
						$seance4=1;
					}
				}
				if($seance5!=1)
					{
					if($ad->date==$obj5->date && $ad->time==$obj5->time)
					{
						$seance5=1;
					}
				}

			//	if($seance1==1 && $seance2==1 && $seance3==1 && $seance4==1 && $seance6==1)
			//		break;

				}
				if($seance1==0)
				{
					$rendezvouspotentiel[$obj1->date . " | " . $obj1->time] = $obj1->date . " | " . $obj1->time;
				}	
				if($seance2==0)
				{
					$rendezvouspotentiel[$obj2->date . " | " . $obj2->time] = $obj2->date . " | " . $obj2->time;
				}	
				if($seance3==0)
				{
					$rendezvouspotentiel[$obj3->date . " | " . $obj3->time] = $obj3->date . " | " . $obj3->time;
				}	
				if($seance4==0)
				{
					$rendezvouspotentiel[$obj4->date . " | " . $obj4->time] = $obj4->date . " | " . $obj4->time;
				}	
				if($seance5==0)
				{
					$rendezvouspotentiel[$obj5->date . " | " . $obj5->time] = $obj5->date . " | " . $obj5->time;
				}

				
				$date = strtotime($date);
				$date = $date + (3600*24); // add seconds of one day
				$date = date("Y-m-d", $date);
		  }
		}

		return view('admin.appoitement.edit', compact('appoitement', "medicalstructure", "patient", "doctor", "rendezvouspotentiel", "days"));
	}

	/**
	 * Update the specified appoitement in storage.
     * @param UpdateAppoitementRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAppoitementRequest $request)
	{

		$content = $request->getContent();
		if (str_contains($content, 'rendezvouspotentiel_id')) {
		$tab = preg_split ("/\&/", $content);
		$datetime = strrpos($tab[3],"=");
		$datetime = substr($tab[3], $datetime+1);
		$newdate = substr($datetime,0,10);
		$pos = strrpos($datetime,"+");
		$newtime = substr($datetime,$pos+1);
		$tabnewtime = preg_split ("/\%3A/", $newtime); 
		$newtime = $tabnewtime[0] .":". $tabnewtime[1];
		$request->merge(['date' => $newdate]);
		$request->merge(['time' => $newtime]);
		}
		$appoitement = Appoitement::findOrFail($id);
		
		if ($request['confirmed'] == "") {
			$request->merge(['confirmed' => 0]);
		}
		$date = date('Y-m-d H:i:s');

			$request->merge(['updated_at' => $date]);
		
		$appoitement->update($request->all());

		return redirect()->route(config('quickadmin.route').'.appoitement.index');
	}

	/**
	 * Remove the specified appoitement from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Appoitement::destroy($id);

		return redirect()->route(config('quickadmin.route').'.appoitement.index');
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
            Appoitement::destroy($toDelete);
        } else {
            Appoitement::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.appoitement.index');
    }

	//step 1 : mot chercher + country
	Public function validateappoitement ($id, $type, $idcountry){

		$user = auth()->user();
		$patient = Patient::select()->where('user_id', $user->id)->get();
		if($patient[0] != null)
			{
				$arr = $patient[0]->getAttributes();
				$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('appoitement.patient_id',$arr['id'])->get();
				}
		else 			
			 $appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('patient_id',0)->get();
		$step = 2;

		// si utilisateur cherche une structure medical
		if($type=="m") {
			$medicalstructure = DB::table('medicalstructure')->where("id","$id")->get();
			$medicalstructure=$medicalstructure->all()[0];
			$specialities = DB::table('speciality')->join('medicalstructurespeciality', 'medicalstructurespeciality.speciality_id', '=', 'speciality.id')->select('speciality.*')->where([['medicalstructurespeciality.medicalstructure_id', $medicalstructure->id],['medicalstructurespeciality.deleted_at', null]])->get();
			$specialities = $specialities->all();
			return view('admin.appoitement.create', compact("appoitement","medicalstructure", "specialities", "step", "type"));
		}

		// si utilisateur cherche un medecin
		else if ($type=="d") {
			$doctor = DB::table('doctor')->where("id","$id")->get();
			$date = date('Y-m-d');
			$appoitement_doctor = DB::table('appoitement')->select('appoitement.*')->where([['doctor_id',$id], ['deleted_at', null],['confirmed',1]])->whereDate('date', '>=', $date)->get();
			$appoitement_doctor = $appoitement_doctor->all();
			$rendezvouspotentiel = [];
			$date = strtotime($date);
			$date = $date + (3600*24); // add seconds of one day
			$date = date("Y-m-d", $date);

			// disponibilité du docteur pour les 10 jours apres current date
			for ($i = 0; $i <= 10; $i++) {

			    $obj1 = new obj;
		        $obj1->date = $date;
				$obj1->time = "08:30";

				$obj2 = new obj;
		        $obj2->date = $date;
				$obj2->time = "10:00";

				$obj3 = new obj;
		        $obj3->date = $date;
		        $obj3->time = "11:30";

	
				$obj4 = new obj;
				$obj4->date = $date;
				$obj4->time = "14:30";

	
				$obj5 = new obj;
				$obj5->date = $date;
				$obj5->time = "16:00";
		
				$seance1=0;
				$seance2=0;
				$seance3=0;
				$seance4=0;
				$seance5=0;

				foreach($appoitement_doctor as $ad) {

					if($seance1!=1)
					{

					if($ad->date==$obj1->date && $ad->time==$obj1->time)
					{
						$seance1=1;
					}

					}

					if($seance2!=1)
					{
					if($ad->date==$obj2->date && $ad->time==$obj2->time)
					{
						$seance2=1;
					}
				}
				if($seance3!=1)
					{
					if($ad->date==$obj3->date && $ad->time==$obj3->time)
					{
						$seance3=1;
					}
				}
				if($seance4!=1)
					{
					if($ad->date==$obj4->date && $ad->time==$obj4->time)
					{
						$seance4=1;
					}
				}
				if($seance5!=1)
					{
					if($ad->date==$obj5->date && $ad->time==$obj5->time)
					{
						$seance5=1;
					}
				}

			//	if($seance1==1 && $seance2==1 && $seance3==1 && $seance4==1 && $seance6==1)
			//		break;

				}
				if($seance1==0)
				{
					array_push($rendezvouspotentiel, $obj1);
				}	
				if($seance2==0)
				{
					array_push($rendezvouspotentiel, $obj2);
				}	
				if($seance3==0)
				{
					array_push($rendezvouspotentiel, $obj3);
				}	
				if($seance4==0)
				{
					array_push($rendezvouspotentiel, $obj4);
				}	
				if($seance5==0)
				{
					array_push($rendezvouspotentiel, $obj5);
				}

				
				$date = strtotime($date);
				$date = $date + (3600*24); // add seconds of one day
				$date = date("Y-m-d", $date);
		  }
		  	
		 	$doctor= $doctor->all();
			$doctor=$doctor[0];

			// specialité du docteur cherché
		  	$speciality1 = Speciality::find($doctor->speciality_id);
            $speciality1 = $speciality1->getAttributes()['name'];

			return view('admin.appoitement.create', compact("appoitement","doctor", "step", "type", "rendezvouspotentiel", "speciality1"));
		}

		// utilisateur cherche une specialité
		else {
			// toute les structures medicaux liées à la specialité
			if($idcountry!=0)
			{
			 	$doctors = DB::table('doctor')->join('speciality', 'speciality.id', '=', 'doctor.speciality_id')->select('doctor.*')->where([['doctor.speciality_id', $id],['country_id', $idcountry]])->get();
				$medicalstructures = DB::table('medicalstructure')->join('medicalstructurespeciality', 'medicalstructurespeciality.medicalstructure_id', '=', 'medicalstructure.id')->select('medicalstructure.*')->where([['medicalstructurespeciality.speciality_id', $id],['country_id', $idcountry],['medicalstructurespeciality.deleted_at',null]])->get();
			}
			else 
			{
				$doctors = DB::table('doctor')->join('speciality', 'speciality.id', '=', 'doctor.speciality_id')->select('doctor.*')->where([['doctor.speciality_id', $id]])->get();
				$medicalstructures = DB::table('medicalstructure')->join('medicalstructurespeciality', 'medicalstructurespeciality.medicalstructure_id', '=', 'medicalstructure.id')->select('medicalstructure.*')->where([['medicalstructurespeciality.speciality_id', $id],['medicalstructurespeciality.deleted_at',null]])->get();
			}

			// tout les medecins liée à la specialité
			return view('admin.appoitement.create', compact("appoitement","medicalstructures", "doctors", "step", "type"));
		}
}

	// chercher les docteur travaillent dans la structure medical ayant une specilité bien définit
	Public function doctorspecialitymedicalstructure ($idspeciality,$idmedicalstructure){

		$doctors = DB::table('doctor')->join('speciality', 'speciality.id', '=', 'doctor.speciality_id')->join('medicalstaff', 'medicalstaff.user_id', '=', 'doctor.user_id')->join('users', 'users.id', '=', 'doctor.user_id')->select('doctor.*')->where([['speciality_id', '=', $idspeciality],['medicalstaff.medicalstructure_id', '=', $idmedicalstructure]])->get();
		$doctorsm = $doctors->all();
		return response()->json($doctorsm);
	}

	// donner disponibilité du docteur
	Public function appoitementofdoctor($iddoctor) {
		
		$date = date('Y-m-d');
		$appoitement_doctor = DB::table('appoitement')->select('appoitement.*')->where([['doctor_id',$iddoctor],['deleted_at', null],['confirmed',1]])->whereDate('date', '>=', $date)->get();
		$appoitement_doctor = $appoitement_doctor->all();
		$rendezvouspotentiel = [];
		$date = strtotime($date);
		$date = $date + (3600*24); // add seconds of one day
		$date = date("Y-m-d", $date);
		for ($i = 0; $i <= 10; $i++) {

			    $obj1 = new obj;
		        $obj1->date = $date;
				$obj1->time = "08:30";

				$obj2 = new obj;
		        $obj2->date = $date;
				$obj2->time = "10:00";

				$obj3 = new obj;
		        $obj3->date = $date;
		        $obj3->time = "11:30";

	
				$obj4 = new obj;
				$obj4->date = $date;
				$obj4->time = "14:30";

	
				$obj5 = new obj;
				$obj5->date = $date;
				$obj5->time = "16:00";
		
				$seance1=0;
				$seance2=0;
				$seance3=0;
				$seance4=0;
				$seance5=0;

				foreach($appoitement_doctor as $ad) {

					if($seance1!=1)
					{

					if($ad->date==$obj1->date && $ad->time==$obj1->time)
					{
						$seance1=1;
					}

					}

					if($seance2!=1)
					{
					if($ad->date==$obj2->date && $ad->time==$obj2->time)
					{
						$seance2=1;
					}
				}
				if($seance3!=1)
					{
					if($ad->date==$obj3->date && $ad->time==$obj3->time)
					{
						$seance3=1;
					}
				}
				if($seance4!=1)
					{
					if($ad->date==$obj4->date && $ad->time==$obj4->time)
					{
						$seance4=1;
					}
				}
				if($seance5!=1)
					{
					if($ad->date==$obj5->date && $ad->time==$obj5->time)
					{
						$seance5=1;
					}
				}

			//	if($seance1==1 && $seance2==1 && $seance3==1 && $seance4==1 && $seance6==1)
			//		break;

				}
				if($seance1==0)
				{
					array_push($rendezvouspotentiel, $obj1);
				}	
				if($seance2==0)
				{
					array_push($rendezvouspotentiel, $obj2);
				}	
				if($seance3==0)
				{
					array_push($rendezvouspotentiel, $obj3);
				}	
				if($seance4==0)
				{
					array_push($rendezvouspotentiel, $obj4);
				}	
				if($seance5==0)
				{
					array_push($rendezvouspotentiel, $obj5);
				}

				
				$date = strtotime($date);
				$date = $date + (3600*24); // add seconds of one day
				$date = date("Y-m-d", $date);
		  }
		
		return response()->json($rendezvouspotentiel,200);
	}


// valider appoitement : insertion
Public function validerappoitement($iddoctor,$idmedicalstructure,$date,$time,$idspeciality) {
       
	// get id du patient connecté
	$user = auth()->user();
	$patient = Patient::select()->where('user_id', $user->id)->get();
	$idp = (int)($patient[0]->getAttributes()['id']);

	// si utilisateur choisi un medecin 
	if($iddoctor != 0)
	   {
		   // si medecin travaille dans plusieur strcture medicaux
		   if($idmedicalstructure==0)
		   		$idmedicalstructure=null;
				$dateapp = strtotime($date);
				$dateapp = date("Y-m-d", $dateapp);
				DB::table('appoitement')->insert(
				   array('medicalstructure_id' => $idmedicalstructure,
				  'patient_id' => $idp,
				  'doctor_id' => $iddoctor,
				  'date' => $dateapp,
				  'time' => $time,
				  'confirmed' => 1,
				  'created_at' => date('Y-m-d H:i:s'))
		);
		
		
		return response()->json($newapp);
	 }

	 // si utilisateur choisi la structure + specialité sans choisir un medecin
	 else {
		$tablast = [];
		$doctors = DB::table('doctor')->join('speciality', 'speciality.id', '=', 'doctor.speciality_id')->join('medicalstaff', 'medicalstaff.user_id', '=', 'doctor.user_id')->join('users', 'users.id', '=', 'doctor.user_id')->select('doctor.*')->where([['speciality_id', '=', $idspeciality],['medicalstaff.medicalstructure_id', '=', $idmedicalstructure]])->get();
		$doctorsm2 = $doctors->all();
		$docdisp = array();
		$chosenappdate = 99999999999999999;
		$chosenapptime = 21660000000;
		$chosenobj = new obj;
		foreach($doctorsm2 as $dm) {
		$date = date('Y-m-d');
		$appoitement_doctor = DB::table('appoitement')->select('appoitement.*')->where([['doctor_id',$dm->id],['deleted_at', null],['confirmed',1]])->whereDate('date', '>=', $date)->get();
		$appoitement_doctor = $appoitement_doctor->all();
		$rendezvouspotentiel = [];
		$date = strtotime($date);
		$date = $date + (3600*24); // add seconds of one day
		$date = date("Y-m-d", $date);
		for ($i = 0; $i <= 10; $i++) {

			    $obj1 = new obj;
		        $obj1->date = $date;
				$obj1->time = "08:30";

				$obj2 = new obj;
		        $obj2->date = $date;
				$obj2->time = "10:00";

				$obj3 = new obj;
		        $obj3->date = $date;
		        $obj3->time = "11:30";

	
				$obj4 = new obj;
				$obj4->date = $date;
				$obj4->time = "14:30";

	
				$obj5 = new obj;
				$obj5->date = $date;
				$obj5->time = "16:00";
		
				$seance1=0;
				$seance2=0;
				$seance3=0;
				$seance4=0;
				$seance5=0;

				foreach($appoitement_doctor as $ad) {

					if($seance1!=1)
					{

					if($ad->date==$obj1->date && $ad->time==$obj1->time)
					{
						$seance1=1;
					}

					}

					if($seance2!=1)
					{
					if($ad->date==$obj2->date && $ad->time==$obj2->time)
					{
						$seance2=1;
					}
				}
				if($seance3!=1)
					{
					if($ad->date==$obj3->date && $ad->time==$obj3->time)
					{
						$seance3=1;
					}
				}
				if($seance4!=1)
					{
					if($ad->date==$obj4->date && $ad->time==$obj4->time)
					{
						$seance4=1;
					}
				}
				if($seance5!=1)
					{
					if($ad->date==$obj5->date && $ad->time==$obj5->time)
					{
						$seance5=1;
					}
				}

			//	if($seance1==1 && $seance2==1 && $seance3==1 && $seance4==1 && $seance6==1)
			//		break;

				}
				if($seance1==0)
				{
					array_push($rendezvouspotentiel, $obj1);
					$objlast = new obj;
					$objlast->date = $obj1->date;
					$objlast->time = $obj1->time;
					$objlast->iddoctor = $dm->id;
					break;
				}	
				if($seance2==0)
				{
					array_push($rendezvouspotentiel, $obj2);
					$objlast = new obj;
					$objlast->date = $obj2->date;
					$objlast->time = $obj2->time;
					$objlast->iddoctor = $dm->id;
					break;
				}	
				if($seance3==0)
				{
					array_push($rendezvouspotentiel, $obj3);
					$objlast = new obj;
					$objlast->date = $obj3->date;
					$objlast->time = $obj3->time;
					$objlast->iddoctor = $dm->id;
					break;
				}	
				if($seance4==0)
				{
					array_push($rendezvouspotentiel, $obj4);
					$objlast = new obj;
					$objlast->date = $obj4->date;
					$objlast->time = $obj4->time;
					$objlast->iddoctor = $dm->id;
					break;
				}	
				if($seance5==0)
				{
					array_push($rendezvouspotentiel, $obj5);
					$objlast = new obj;
					$objlast->date = $obj5->date;
					$objlast->time = $obj5->time;
					$objlast->iddoctor = $dm->id;
					break;
				}

				
				$date = strtotime($date);
				$date = $date + (3600*24); // add seconds of one day
				$date = date("Y-m-d", $date);
		  }

		        $a = substr($objlast->date,0,4);
		 		$a = (int)$a;
				$m = substr($objlast->date,5,2); 
				$m = (int)$m;
				$d = substr($objlast->date,8,2);
				$d = (int)$d;
				$currentappdate = ($a*1000)+($m*100)+$d;
				$th = substr($objlast->time,0,2);
				$th = (int)$th;
				$tm = substr($objlast->time,3,2); 
				$tm = (int)$tm;
				$currentapptime = ($th*3600)+($tm*60);

				if($chosenappdate > $currentappdate) {
					$chosenappdate = $currentappdate;
					$chosenapptime = $currentapptime;
					$chosenobj->date = $objlast->date;
					$chosenobj->time = $objlast->time;
					$chosenobj->iddoctor = $objlast->iddoctor;
				}

			    if(($chosenappdate == $currentappdate) && ($chosenapptime > $currentapptime)) {
					$chosenappdate = $currentappdate;
					$chosenapptime = $currentapptime;
					$chosenobj->date = $objlast->date;
					$chosenobj->time = $objlast->time;
					$chosenobj->iddoctor = $objlast->iddoctor;
					}
				
		
		}

		DB::table('appoitement')->insert(
			array('medicalstructure_id' => $idmedicalstructure,
				  'patient_id' => $idp,
				  'doctor_id' => $chosenobj->iddoctor,
				  'date' => $chosenobj->date,
				  'time' => $chosenobj->time,
				  'confirmed' => 1,
				  'created_at' => date('Y-m-d H:i:s'))
		);

		return response()->json($chosenobj);

	   }
	}
}
