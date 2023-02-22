<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\MedicalStructure;
use App\Http\Requests\CreateMedicalStructureRequest;
use App\Http\Requests\UpdateMedicalStructureRequest;
use Illuminate\Http\Request;
use App\Medicalstaff;
use App\StructureType;
use App\Speciality;
use App\MedicalStructureSpeciality;
use App\Country;
use App\Doctor;
use Illuminate\Support\Facades\DB;


if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class MedicalStructureController extends Controller {

	/**
	 * Display a listing of medicalstructure
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if($user->role_id == 2 ||$user->role_id == 1)
		{
			$medicalstructure = DB::table('medicalstructure')->where('deleted_at', null)
			->get();
		}
		else {
			$medicalstaffuser = Medicalstaff::with("user")->with("medicalstructure")->where([['user_id', $user->id], ['deleted_at', null]])->get();
			$medicalstaffuser = $medicalstaffuser->all();
			$tabmed = [];
			foreach($medicalstaffuser as $md)
			{
				$md = $md->getAttributes();
				array_push($tabmed, $md['medicalstructure_id']);
			}
			$medicalstructure = DB::table('medicalstructure')
                    ->whereIn('id', $tabmed)
                    ->get();
			//$medicalstructure = MedicalStructure::with("medicalstructure")->with("structuretype")->whereIn('id',array('1','18'))->get();		
			if($user->role_id == 10) {
				$doctor = Doctor::where('user_id', $user->id)->get();
				$wao= $doctor->all()[0]->getAttributes()['with_administrator_option'];
				return view('admin.medicalstructure.index', compact('medicalstructure','wao'));
			}
		}

		return view('admin.medicalstructure.index', compact('medicalstructure'));
	}

	/**
	 * Show the form for creating a new medicalstructure
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $structuretype = StructureType::pluck("name", "id")->prepend('Choose type', 0);
		$speciality = Speciality::pluck("name", "id")->prepend('Choose speciality', 0);
		$country = Country::pluck("alias", "id")->prepend('Choose country', 0);
		$var = 1;
	    
	    return view('admin.medicalstructure.create', compact("structuretype","var","speciality","country"));
	}

	/**
	 * Store a newly created medicalstructure in storage.
	 *
     * @param CreateMedicalStructureRequest|Request $request
	 */
	public function store(CreateMedicalStructureRequest $request)
	{
		$user = auth()->user();
		if($user->role_id==12) {
			$request->merge(['activated' => 1]);
			$request->merge(['signaled' => 0]);

		}
		 $content = $request->getContent();
		 $tabcontent = preg_split ("/\&/", $content); 
		 $array_id_specialities = array();

		 foreach ($tabcontent as $value){
			if(strpos($value, "speciality_id") !== false){
					$id = substr($value, 14);
					$intid = (int)$id;
					if (!(in_array($intid, $array_id_specialities)) && $intid != 0) {
						array_push($array_id_specialities, $intid);
					}
			}
		}
	//	dd($array_id_specialities);
		if ($request['signaled'] == "") {
			$request->merge(['signaled' => "0"]);
		}
		if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}
	    
		$result = MedicalStructure::create($request->all());
		/*$req->speciality_id = 2;
		$req->medicalstructure_id=3;
		MedicalStructureSpeciality::create($req);*/
		$user = auth()->user();

		DB::table('medicalstaff')->insert(
			array('user_id' => $user->id,
		   'medicalstructure_id' => $result->id)
		);

		foreach ($array_id_specialities as $value){
			$mdsp = new MedicalStructureSpeciality;
			$mdsp->speciality_id = $value ;
			$mdsp->medicalstructure_id=$result->id;
			$mdsp->save();
		}
		
	

		return redirect()->route(config('quickadmin.route').'.medicalstructure.index');
	}

	/**
	 * Show the form for editing the specified medicalstructure.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$medicalstructure = MedicalStructure::find($id);
	    $structuretype = StructureType::pluck("name", "id")->prepend('Choose type', 0);
		$country = Country::pluck("alias", "id")->prepend('Choose type', 0);
        $medicalstructurespeciality = MedicalStructureSpeciality::with("speciality")->with("medicalstructure")->where('medicalstructure_id',$id)->get();
		$tabsp = [];
		foreach($medicalstructurespeciality as $ms)
			{
				$ms = $ms->getAttributes();
				array_push($tabsp, $ms['speciality_id']);
			}
			$speciality = DB::table('speciality')
                    ->whereIn('id', $tabsp)
                    ->get();
			$speciality = $speciality->all();
			$firstsp = $speciality[0];
			array_shift($speciality);
			$specialities = Speciality::all();
			$tabindice = [];
			$i = 1;
			foreach($speciality as $sp)
			{
				$sp->indice=$i+1;
			}
			$specialitiesselect = Speciality::pluck("name", "id")->prepend('Choose speciality', 0);

		return view('admin.medicalstructure.edit', compact("country",'medicalstructure', "structuretype", "speciality", "specialities","firstsp","specialitiesselect"));
	}

	/**
	 * Update the specified medicalstructure in storage.
     * @param UpdateMedicalStructureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMedicalStructureRequest $request)
	{
		$user = auth()->user();

		$medicalstructurespeciality = MedicalStructureSpeciality::with("speciality")->with("medicalstructure")->where('medicalstructure_id',$id)->get();
		foreach($medicalstructurespeciality as $ms)
		{
			$ms = $ms->getAttributes();
			MedicalStructureSpeciality::destroy($ms['id']);
		}
		 $content = $request->getContent();
		 $tabcontent = preg_split ("/\&/", $content); 
		 $array_id_specialities = array();

		 foreach ($tabcontent as $value){
			if(strpos($value, "speciality_id") !== false){
					$idd = substr($value, 14);
					$intid = (int)$idd;
					if (!(in_array($intid, $array_id_specialities)) && $intid != 0) {
						array_push($array_id_specialities, $intid);
					}
			}
		}
		foreach ($array_id_specialities as $value){
			$mdsp = new MedicalStructureSpeciality;
			$mdsp->speciality_id = $value ;
			$mdsp->medicalstructure_id=$id;
			$mdsp->save();
		}

		$medicalstructure = MedicalStructure::findOrFail($id);

		if($user->role_id==12) {
			$request->merge(['activated' => $medicalstructure->activated]);
			$request->merge(['signaled' => $medicalstructure->signaled]);

		}
		else{

        if ($request['signaled'] == "") {
			$request->merge(['signaled' => 0]);
		}
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
	}
		$medicalstructure->update($request->all());

		return redirect()->route(config('quickadmin.route').'.medicalstructure.index');
	}

	/**
	 * Remove the specified medicalstructure from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		MedicalStructure::destroy($id);

		return redirect()->route(config('quickadmin.route').'.medicalstructure.index');
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
            MedicalStructure::destroy($toDelete);
        } else {
            MedicalStructure::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.medicalstructure.index');
    }

}
