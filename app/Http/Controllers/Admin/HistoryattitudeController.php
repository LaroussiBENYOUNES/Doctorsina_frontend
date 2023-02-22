<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Historyattitude;
use App\Http\Requests\CreateHistoryattitudeRequest;
use App\Http\Requests\UpdateHistoryattitudeRequest;
use Illuminate\Http\Request;

use App\User;
use App\Attitude;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
class HistoryattitudeController extends Controller {

	/**
	 * Display a listing of historyattitude
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if($user->role_id == 2)
        $historyattitude = Historyattitude::where('user_id', $user->id)->with("user")->with("attitude")->get();
		else 
		$historyattitude = Historyattitude::with("user")->with("attitude")->get();
		return view('admin.historyattitude.index', compact('historyattitude'));
	}

	/**
	 * Show the form for creating a new historyattitude
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::where('role_id', 2)->pluck("name","id")->prepend('Please select', 0);
        $attitude = Attitude::pluck( "alias", "id")->prepend('Please select', 0);
	    return view('admin.historyattitude.create', compact("user", "attitude"));
	}

	/**
	 * Store a newly created historyattitude in storage.
	 *
     * @param CreateHistoryattitudeRequest|Request $request
	 */
	public function store(CreateHistoryattitudeRequest $request)
	{
	    $user = auth()->user();

		if($user->role_id == 2)
			$request->merge(['user_id' => $user->id]);

		Historyattitude::create($request->all());
		
		return redirect()->route(config('quickadmin.route').'.historyattitude.index');
	}

	/**
	 * Show the form for editing the specified historyattitude.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$historyattitude = Historyattitude::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', 0);
        $attitude = Attitude::pluck("alias", "id")->prepend('Please select', 0);

	    
		return view('admin.historyattitude.edit', compact('historyattitude', "user", "attitude"));
	}

	/**
	 * Update the specified historyattitude in storage.
     * @param UpdateHistoryattitudeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHistoryattitudeRequest $request)
	{
		$historyattitude = Historyattitude::findOrFail($id);

		$historyattitude->update($request->all());

		return redirect()->route(config('quickadmin.route').'.historyattitude.index');
	}

	/**
	 * Remove the specified historyattitude from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Historyattitude::destroy($id);

		return redirect()->route(config('quickadmin.route').'.historyattitude.index');
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
            Historyattitude::destroy($toDelete);
        } else {
            Historyattitude::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.historyattitude.index');
    }

}
