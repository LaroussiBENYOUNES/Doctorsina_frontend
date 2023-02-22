<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\MedicalStructureSpeciality;
use App\Http\Requests\CreateMedicalStructureSpecialityRequest;
use App\Http\Requests\UpdateMedicalStructureSpecialityRequest;
use Illuminate\Http\Request;
use App\Medicalstaff;
use App\Speciality;
use App\MedicalStructure;


if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class MedicalStructureSpecialityController extends Controller {

	/**
	 * Display a listing of medicalstructurespeciality
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
        $medicalstructurespeciality = MedicalStructureSpeciality::with("speciality")->with("medicalstructure")->get();
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

			$medicalstructurespeciality = MedicalStructureSpeciality::with("speciality")->with("medicalstructure")->whereIn('medicalstructure_id', $tabmed)->get();
		}
		return view('admin.medicalstructurespeciality.index', compact('medicalstructurespeciality'));
	}

	/**
	 * Show the form for creating a new medicalstructurespeciality
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $speciality = Speciality::pluck("name", "id")->prepend('Please select', null);
        $medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', null);

	    
	    return view('admin.medicalstructurespeciality.create', compact("speciality", "medicalstructure"));
	}

	/**
	 * Store a newly created medicalstructurespeciality in storage.
	 *
     * @param CreateMedicalStructureSpecialityRequest|Request $request
	 */
	public function store(CreateMedicalStructureSpecialityRequest $request)
	{
	    
		MedicalStructureSpeciality::create($request->all());

		return redirect()->route(config('quickadmin.route').'.medicalstructurespeciality.index');
	}

	/**
	 * Show the form for editing the specified medicalstructurespeciality.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$medicalstructurespeciality = MedicalStructureSpeciality::find($id);
	    $speciality = Speciality::pluck("name", "id")->prepend('Please select', null);
$medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', null);

	    
		return view('admin.medicalstructurespeciality.edit', compact('medicalstructurespeciality', "speciality", "medicalstructure"));
	}

	/**
	 * Update the specified medicalstructurespeciality in storage.
     * @param UpdateMedicalStructureSpecialityRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMedicalStructureSpecialityRequest $request)
	{
		$medicalstructurespeciality = MedicalStructureSpeciality::findOrFail($id);

        

		$medicalstructurespeciality->update($request->all());

		return redirect()->route(config('quickadmin.route').'.medicalstructurespeciality.index');
	}

	/**
	 * Remove the specified medicalstructurespeciality from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		MedicalStructureSpeciality::destroy($id);

		return redirect()->route(config('quickadmin.route').'.medicalstructurespeciality.index');
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
            MedicalStructureSpeciality::destroy($toDelete);
        } else {
            MedicalStructureSpeciality::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.medicalstructurespeciality.index');
    }

}
