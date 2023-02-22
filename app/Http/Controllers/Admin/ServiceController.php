<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Service;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Site;
use App\Schedule;
use App\Medicalstaff;
use App\Medicalstructure;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class ServiceController extends Controller {

	/**
	 * Display a listing of service
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if(($user->role_id == 1) || ($user->role_id == 2)) {
			$service = DB::table('service')->join('schedule', 'schedule.id', '=', 'service.schedule_id')->join('site', 'site.id', '=', 'service.site_id')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('service.*', 'site.label as label_site', 'site.id as id_site', 'schedule.label as label_schedule', 'schedule.id as id_schedule')->where([['service.deleted_at',null]])->get();
		}

		else {
			$service = DB::table('service')->join('schedule', 'schedule.id', '=', 'service.schedule_id')->join('site', 'site.id', '=', 'service.site_id')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->join('medicalstaff','medicalstaff.medicalstructure_id', '=', 'medicalstructure.id')->select('service.*', 'site.label as label_site', 'site.id as id_site', 'schedule.label as label_schedule', 'schedule.id as id_schedule')->where([['medicalstaff.user_id', $user->id]])->get();
		}

		return view('admin.service.index', compact('service'));
	}

	/**
	 * Show the form for creating a new service
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

		$site = DB::table('site')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('site.*')->whereIn('site.medicalstructure_id',$tabstructureid)->pluck("label", "id")->prepend('Please select', 0);

		

	   // $site = Site::pluck("label", "id")->prepend('Please select', null);
		$schedule = Schedule::pluck("label", "id")->prepend('Please select', 0);

	    
	    return view('admin.service.create', compact("site", "schedule"));
	}

	/**
	 * Store a newly created service in storage.
	 *
     * @param CreateServiceRequest|Request $request
	 */
	public function store(CreateServiceRequest $request)
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

		Service::create($request->all());

		return redirect()->route(config('quickadmin.route').'.service.index');
	}

	/**
	 * Show the form for editing the specified service.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
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

		$site = DB::table('site')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('site.*')->whereIn('site.medicalstructure_id',$tabstructureid)->pluck("label", "id")->prepend('Please select', 0);
		$service = Service::find($id);
        $schedule = Schedule::pluck("label", "id")->prepend('Please select', 0);

	    
		return view('admin.service.edit', compact('service', "site", "schedule"));
	}

	/**
	 * Update the specified service in storage.
     * @param UpdateServiceRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateServiceRequest $request)
	{
		$service = Service::findOrFail($id);
		$user = auth()->user();

		if($user->role_id==12) {
			$request->merge(['activated' => $service->activated]);
		}
		else
		{
        if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
	}

		$service->update($request->all());

		return redirect()->route(config('quickadmin.route').'.service.index');
	}

	/**
	 * Remove the specified service from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Service::destroy($id);

		return redirect()->route(config('quickadmin.route').'.service.index');
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
            Service::destroy($toDelete);
        } else {
            Service::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.service.index');
    }

}
