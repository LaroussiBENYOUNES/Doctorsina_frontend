<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Historyvaccine;
use App\Http\Requests\CreateHistoryvaccineRequest;
use App\Http\Requests\UpdateHistoryvaccineRequest;
use Illuminate\Http\Request;

use App\User;
use App\Vaccine;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class HistoryvaccineController extends Controller {

	/**
	 * Display a listing of historyvaccine
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if($user->role_id == 2)
        $historyvaccine = Historyvaccine::where('user_id', $user->id)->with("user")->with("vaccine")->get();
		else
		$historyvaccine = Historyvaccine::with("user")->with("vaccine")->get();
		
		return view('admin.historyvaccine.index', compact('historyvaccine'));
	}

	/**
	 * Show the form for creating a new historyvaccine
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::where('role_id', 2)->pluck("name", "id")->prepend('Please select', 0);
		$vaccine = Vaccine::pluck("alias", "id")->prepend('Please select', 0);
			    
	    return view('admin.historyvaccine.create', compact("user", "vaccine"));
	}

	/**
	 * Store a newly created historyvaccine in storage.
	 *
     * @param CreateHistoryvaccineRequest|Request $request
	 */
	public function store(CreateHistoryvaccineRequest $request)
	{
		$user = auth()->user();

		if($user->role_id == 2)
			$request->merge(['user_id' => $user->id]);
		Historyvaccine::create($request->all());

		return redirect()->route(config('quickadmin.route').'.historyvaccine.index');
	}

	/**
	 * Show the form for editing the specified historyvaccine.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$historyvaccine = Historyvaccine::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', 0);
		$vaccine = Vaccine::pluck("alias", "id")->prepend('Please select', 0);

		return view('admin.historyvaccine.edit', compact('historyvaccine', "user", "vaccine"));
	}

	/**
	 * Update the specified historyvaccine in storage.
     * @param UpdateHistoryvaccineRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHistoryvaccineRequest $request)
	{
		$historyvaccine = Historyvaccine::findOrFail($id);
		$historyvaccine->update($request->all());

		return redirect()->route(config('quickadmin.route').'.historyvaccine.index');
	}

	/**
	 * Remove the specified historyvaccine from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Historyvaccine::destroy($id);

		return redirect()->route(config('quickadmin.route').'.historyvaccine.index');
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
            Historyvaccine::destroy($toDelete);
        } else {
            Historyvaccine::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.historyvaccine.index');
    }

}
