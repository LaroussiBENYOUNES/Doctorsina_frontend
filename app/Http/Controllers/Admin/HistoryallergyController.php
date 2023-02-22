<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Historyallergy;
use App\Http\Requests\CreateHistoryallergyRequest;
use App\Http\Requests\UpdateHistoryallergyRequest;
use Illuminate\Http\Request;

use App\User;
use App\Allergy;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class HistoryallergyController extends Controller {

	/**
	 * Display a listing of historyallergy
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if($user->role_id == 2)
        $historyallergy = Historyallergy::where('user_id', $user->id)->with("user")->with("allergy")->get();
		else
		$historyallergy = Historyallergy::with("user")->with("allergy")->get();
		return view('admin.historyallergy.index', compact('historyallergy'));
	}

	/**
	 * Show the form for creating a new historyallergy
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::where('role_id', 2)->pluck("name", "id")->prepend('Please select', 0);
		$allergy = Allergy::pluck("alias", "id")->prepend('Please select', 0);

	    
	    return view('admin.historyallergy.create', compact("user", "allergy"));
	}

	/**
	 * Store a newly created historyallergy in storage.
	 *
     * @param CreateHistoryallergyRequest|Request $request
	 */
	public function store(CreateHistoryallergyRequest $request)
	{
		$user = auth()->user();

		if($user->role_id == 2)
			$request->merge(['user_id' => $user->id]);
	    
		Historyallergy::create($request->all());

		return redirect()->route(config('quickadmin.route').'.historyallergy.index');
	}

	/**
	 * Show the form for editing the specified historyallergy.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$historyallergy = Historyallergy::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', 0);
		$allergy = Allergy::pluck("alias", "id")->prepend('Please select', 0);
	    
		return view('admin.historyallergy.edit', compact('historyallergy', "user", "allergy"));
	}

	/**
	 * Update the specified historyallergy in storage.
     * @param UpdateHistoryallergyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHistoryallergyRequest $request)
	{
		$historyallergy = Historyallergy::findOrFail($id);
		$historyallergy->update($request->all());

		return redirect()->route(config('quickadmin.route').'.historyallergy.index');
	}

	/**
	 * Remove the specified historyallergy from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Historyallergy::destroy($id);

		return redirect()->route(config('quickadmin.route').'.historyallergy.index');
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
            Historyallergy::destroy($toDelete);
        } else {
            Historyallergy::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.historyallergy.index');
    }

}
