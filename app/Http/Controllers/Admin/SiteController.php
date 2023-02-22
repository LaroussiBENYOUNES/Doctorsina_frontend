<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Site;
use App\Http\Requests\CreateSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\MedicalStructure;
use App\Country;
use App\Medicalstaff;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
	
class SiteController extends Controller {

	/**
	 * Display a listing of site
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if(($user->role_id == 1) || ($user->role_id == 2)) {
			$site = Site::with("medicalstructure")->with("country")->get();
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
			$site = Site::with("medicalstructure")->with("country")->whereIn('medicalstructure_id', $tabmed)->get();
		}
		
		return view('admin.site.index', compact('site'));
	}

	/**
	 * Show the form for creating a new site
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
                    ->whereIn('id', $tabmed)
                    ->pluck("label", "id")->prepend('Please select', 0);
		}
		else
	    $medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', 0);
        $country = Country::pluck("alias", "id")->prepend('Please select', 0);

	    
	    return view('admin.site.create', compact("medicalstructure", "country"));
	}

	/**
	 * Store a newly created site in storage.
	 *
     * @param CreateSiteRequest|Request $request
	 */
	public function store(CreateSiteRequest $request)
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

		Site::create($request->all());

		return redirect()->route(config('quickadmin.route').'.site.index');
	}

	/**
	 * Show the form for editing the specified site.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$site = Site::find($id);
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
                    ->whereIn('id', $tabmed)
                    ->pluck("label", "id")->prepend('Please select', 0);
		}
		else
	    $medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', 0);
        $country = Country::pluck("alias", "id")->prepend('Please select', 0);

	    
		return view('admin.site.edit', compact('site', "medicalstructure", "country"));
	}

	/**
	 * Update the specified site in storage.
     * @param UpdateSiteRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSiteRequest $request)
	{
		$site = Site::findOrFail($id);
		$user = auth()->user();

		if($user->role_id==12) {
			$request->merge(['activated' => $site->activated]);
		}

		else {
			if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
	}

		$site->update($request->all());

		return redirect()->route(config('quickadmin.route').'.site.index');
	}

	/**
	 * Remove the specified site from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Site::destroy($id);

		return redirect()->route(config('quickadmin.route').'.site.index');
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
            Site::destroy($toDelete);
        } else {
            Site::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.site.index');
    }

}
