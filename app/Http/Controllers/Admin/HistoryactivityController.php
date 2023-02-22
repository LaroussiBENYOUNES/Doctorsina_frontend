<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Historyactivity;
use App\Http\Requests\CreateHistoryactivityRequest;
use App\Http\Requests\UpdateHistoryactivityRequest;
use Illuminate\Http\Request;

use App\User;
use App\Activity;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class HistoryactivityController extends Controller {

	/**
	 * Display a listing of historyactivity
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if($user->role_id == 2)
        $historyactivity = Historyactivity::where('user_id', $user->id)->with("user")->with("activity")->get();
		else 
		$historyactivity = Historyactivity::with("activity")->get();

		return view('admin.historyactivity.index', compact('historyactivity'));
	}

	/**
	 * Show the form for creating a new historyactivity
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::where('role_id', 2)->pluck("name", "id")->prepend('Please select', 0);
        $activity = Activity::pluck("alias", "id")->prepend('Please select', 0);

	    return view('admin.historyactivity.create', compact("user", "activity"));
	}

	/**
	 * Store a newly created historyactivity in storage.
	 *
     * @param CreateHistoryactivityRequest|Request $request
	 */
	public function store(CreateHistoryactivityRequest $request)
	{
		$user = auth()->user();

		if($user->role_id == 2)
			$request->merge(['user_id' => $user->id]);

		Historyactivity::create($request->all());

		return redirect()->route(config('quickadmin.route').'.historyactivity.index');
	}

	/**
	 * Show the form for editing the specified historyactivity.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$historyactivity = Historyactivity::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', 0);
        $activity = Activity::pluck("alias", "id")->prepend('Please select', 0);
		return view('admin.historyactivity.edit', compact('historyactivity', "user", "activity"));
	}

	/**
	 * Update the specified historyactivity in storage.
     * @param UpdateHistoryactivityRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHistoryactivityRequest $request)
	{
		$historyactivity = Historyactivity::findOrFail($id);
		$historyactivity->update($request->all());

		return redirect()->route(config('quickadmin.route').'.historyactivity.index');
	}

	/**
	 * Remove the specified historyactivity from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Historyactivity::destroy($id);

		return redirect()->route(config('quickadmin.route').'.historyactivity.index');
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
            Historyactivity::destroy($toDelete);
        } else {
            Historyactivity::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.historyactivity.index');
    }

}
