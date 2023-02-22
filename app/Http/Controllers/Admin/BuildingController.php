<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Building;
use App\Http\Requests\CreateBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Site;
use App\Medicalstaff;
use App\Medicalstructure;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
class BuildingController extends Controller {

	/**
	 * Display a listing of building
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if(($user->role_id == 1) || ($user->role_id == 2)) {
			$building = DB::table('building')->join('site', 'site.id', '=', 'building.site_id')->select('building.*', 'site.label as label_site' , 'site.id as id_site')->where([['building.deleted_at', null]])->get();
		}

		else {
			$building = DB::table('building')->join('site', 'site.id', '=', 'building.site_id')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->join('medicalstaff','medicalstaff.medicalstructure_id', '=', 'medicalstructure.id')->select('building.*', 'site.label as label_site' , 'site.id as id_site')->where([['medicalstaff.user_id', $user->id], ['building.deleted_at', null]])->get();
		}

		return view('admin.building.index', compact('building'));
	}

	/**
	 * Show the form for creating a new building
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		$user = auth()->user();

		if($user->role_id == 12) {
			$medicalstaffuser = Medicalstaff::with("user")->with("medicalstructure")->where('user_id', $user->id)->get();
			$medicalstaffuser = $medicalstaffuser->all();
			$tabmed = [];
			foreach($medicalstaffuser as $md)
			{
				$md = $md->getAttributes();
				array_push($tabmed, $md['medicalstructure_id']);
			}

			$medicalstructure = DB::table('medicalstructure')
                    ->whereIn('id', $tabmed)->get();
		}
		else
		$medicalstructure = MedicalStructure::get();

		$tabstructureid = array();
		foreach ($medicalstructure as $md)
		{
			array_push($tabstructureid, $md->id);
		}

		$sites = DB::table('site')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('site.*')->whereIn('site.medicalstructure_id',$tabstructureid)->pluck("label", "id")->prepend('Please select', 0);

		
	    //$site = Site::pluck("label", "id")->prepend('Please select', null);

	    
	    return view('admin.building.create', compact("sites", "medicalstructure"));
	}

	/**
	 * Store a newly created building in storage.
	 *
     * @param CreateBuildingRequest|Request $request
	 */
	public function store(CreateBuildingRequest $request)
	{
		$user = auth()->user();

		if($user->role_id==12) {
			$request->merge(['activated' => 1]);
		}
		else
		{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
	}

		Building::create($request->all());

		return redirect()->route(config('quickadmin.route').'.building.index');
	}

	/**
	 * Show the form for editing the specified building.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$building = Building::find($id);
		$user = auth()->user();

		if($user->role_id == 12) {
			$medicalstaffuser = Medicalstaff::with("user")->with("medicalstructure")->where('user_id', $user->id)->get();
			$medicalstaffuser = $medicalstaffuser->all();
			$tabmed = [];
			foreach($medicalstaffuser as $md)
			{
				$md = $md->getAttributes();
				array_push($tabmed, $md['medicalstructure_id']);
			}

			$medicalstructure = DB::table('medicalstructure')
                    ->whereIn('id', $tabmed)->get();
		}
		else
		$medicalstructure = MedicalStructure::get();

		$tabstructureid = array();
		foreach ($medicalstructure as $md)
		{
			array_push($tabstructureid, $md->id);
		}

		$sites = DB::table('site')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('site.*')->whereIn('site.medicalstructure_id',$tabstructureid)->pluck("label", "id")->prepend('Please select', 0);

		

	    
		return view('admin.building.edit', compact('building', "sites" , "medicalstructure"));
	}

	/**
	 * Update the specified building in storage.
     * @param UpdateBuildingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBuildingRequest $request)
	{
		$building = Building::findOrFail($id);
		$user = auth()->user();

		if($user->role_id==12) {
			$request->merge(['activated' => $building->activated]);
		}
		else
		{
		if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}
	}

		$building->update($request->all());

		return redirect()->route(config('quickadmin.route').'.building.index');
	}

	/**
	 * Remove the specified building from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Building::destroy($id);

		return redirect()->route(config('quickadmin.route').'.building.index');
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
            Building::destroy($toDelete);
        } else {
            Building::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.building.index');
    }

}
