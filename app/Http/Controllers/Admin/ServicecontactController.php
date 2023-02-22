<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Servicecontact;
use App\Http\Requests\CreateServicecontactRequest;
use App\Http\Requests\UpdateServicecontactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Service;
use App\Medicalstaff;
use App\Medicalstructure;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class ServicecontactController extends Controller {

	/**
	 * Display a listing of servicecontact
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();

		if(($user->role_id == 1) || ($user->role_id == 2)) {
			$servicecontact = DB::table('servicecontact')->join('service', 'service.id', '=', 'servicecontact.service_id')->join('site', 'site.id', '=', 'service.site_id')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('servicecontact.*', 'service.label as label_service', 'service.id as id_service', 'site.label as label_site', 'site.id as id_site', 'medicalstructure.label as label_medicalstructure', 'medicalstructure.id as id_medicalstructure')->where([['servicecontact.deleted_at', null]])->get();
		}

		else {
			$servicecontact = DB::table('servicecontact')->join('service', 'service.id', '=', 'servicecontact.service_id')->join('site', 'site.id', '=', 'service.site_id')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->join('medicalstaff', 'medicalstaff.medicalstructure_id', '=', 'medicalstructure.id')->select('servicecontact.*', 'service.label as label_service', 'service.id as id_service', 'site.label as label_site', 'site.id as id_site', 'medicalstructure.label as label_medicalstructure', 'medicalstructure.id as id_medicalstructure')->distinct()->where([['servicecontact.deleted_at', null], ['medicalstaff.user_id',$user->id]])->get();
		}
        //$servicecontact = Servicecontact::with("service")->get();

		return view('admin.servicecontact.index', compact('servicecontact'));
	}

	/**
	 * Show the form for creating a new servicecontact
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

		$site = DB::table('site')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('site.*')->whereIn('site.medicalstructure_id',$tabstructureid)->get();

		$tabsiteid = array();
		foreach ($site as $st)
		{
			array_push($tabsiteid, $st->id);
		}


	    $service = DB::table('service')->whereIn('site_id', $tabsiteid)->pluck("label", "id")->prepend('Please select', 0);
        
		
	    return view('admin.servicecontact.create', compact("service"));
	}

	/**
	 * Store a newly created servicecontact in storage.
	 *
     * @param CreateServicecontactRequest|Request $request
	 */
	public function store(CreateServicecontactRequest $request)
	{
	    
		Servicecontact::create($request->all());

		return redirect()->route(config('quickadmin.route').'.servicecontact.index');
	}

	/**
	 * Show the form for editing the specified servicecontact.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$servicecontact = Servicecontact::find($id);
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

		$site = DB::table('site')->join('medicalstructure', 'medicalstructure.id', '=', 'site.medicalstructure_id')->select('site.*')->whereIn('site.medicalstructure_id',$tabstructureid)->get();

		$tabsiteid = array();
		foreach ($site as $st)
		{
			array_push($tabsiteid, $st->id);
		}


	    $service = DB::table('service')->whereIn('site_id', $tabsiteid)->pluck("label", "id")->prepend('Please select', 0);
        

	    
		return view('admin.servicecontact.edit', compact('servicecontact', "service"));
	}

	/**
	 * Update the specified servicecontact in storage.
     * @param UpdateServicecontactRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateServicecontactRequest $request)
	{
		$servicecontact = Servicecontact::findOrFail($id);

        

		$servicecontact->update($request->all());

		return redirect()->route(config('quickadmin.route').'.servicecontact.index');
	}

	/**
	 * Remove the specified servicecontact from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Servicecontact::destroy($id);

		return redirect()->route(config('quickadmin.route').'.servicecontact.index');
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
            Servicecontact::destroy($toDelete);
        } else {
            Servicecontact::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.servicecontact.index');
    }

}
