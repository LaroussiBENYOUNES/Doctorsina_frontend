<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Medicastructureoffer;
use App\Http\Requests\CreateMedicastructureofferRequest;
use App\Http\Requests\UpdateMedicastructureofferRequest;
use Illuminate\Http\Request;

use App\MedicalStructure;
use App\Offertype;
use App\Medicalstaff;
use Illuminate\Support\Facades\DB;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
class MedicastructureofferController extends Controller {

	/**
	 * Display a listing of medicastructureoffer
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
			$medicastructureoffer = Medicastructureoffer::with("medicalstructure")->with("offertype")->where('deleted_at', null)->get();
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

        $medicastructureoffer = Medicastructureoffer::with("medicalstructure")->with("offertype")->whereIn('medicalstructure_id', $tabmed)->where('deleted_at', null)->get();
		}
		return view('admin.medicastructureoffer.index', compact('medicastructureoffer'));
	}

	/**
	 * Show the form for creating a new medicastructureoffer
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
		else {
			$medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', 0);
		} 
        $offertype = Offertype::pluck("name", "id")->prepend('Please select', 0);

	    
	    return view('admin.medicastructureoffer.create', compact("medicalstructure", "offertype"));
	}

	/**
	 * Store a newly created medicastructureoffer in storage.
	 *
     * @param CreateMedicastructureofferRequest|Request $request
	 */
	public function store(CreateMedicastructureofferRequest $request)
	{
		$user = auth()->user();

		if($user->role_id == 12) {
			$request->merge(['activated' => 1]);
		}
		else if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
		Medicastructureoffer::create($request->all());

		return redirect()->route(config('quickadmin.route').'.medicastructureoffer.index');
	}

	/**
	 * Show the form for editing the specified medicastructureoffer.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$medicastructureoffer = Medicastructureoffer::find($id);
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
		else {
			$medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', 0);
		}
        $offertype = Offertype::pluck("name", "id")->prepend('Please select', 0);

		return view('admin.medicastructureoffer.edit', compact('medicastructureoffer', "medicalstructure", "offertype"));
	}

	/**
	 * Update the specified medicastructureoffer in storage.
     * @param UpdateMedicastructureofferRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMedicastructureofferRequest $request)
	{
		$medicastructureoffer = Medicastructureoffer::findOrFail($id);

		$user = auth()->user();

		if($user->role_id == 12) {
			$request->merge(['activated' => $medicastructureoffer->activated]);
		}
		else if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}

		$medicastructureoffer->update($request->all());

		return redirect()->route(config('quickadmin.route').'.medicastructureoffer.index');
	}

	/**
	 * Remove the specified medicastructureoffer from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Medicastructureoffer::destroy($id);

		return redirect()->route(config('quickadmin.route').'.medicastructureoffer.index');
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
            Medicastructureoffer::destroy($toDelete);
        } else {
            Medicastructureoffer::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.medicastructureoffer.index');
    }

}
