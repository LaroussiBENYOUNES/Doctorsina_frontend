<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Historystatus;
use App\Http\Requests\CreateHistorystatusRequest;
use App\Http\Requests\UpdateHistorystatusRequest;
use Illuminate\Http\Request;

use App\User;
use App\Status;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class HistorystatusController extends Controller {

	/**
	 * Display a listing of historystatus
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if($user->role_id == 2)
        $historystatus = Historystatus::where('user_id', $user->id)->with("user")->with("user")->with("status")->get();
		else 
		$historystatus = Historystatus::with("user")->with("status")->get();

		return view('admin.historystatus.index', compact('historystatus'));
	}

	/**
	 * Show the form for creating a new historystatus
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::where('role_id', 2)->pluck("name", "id")->prepend('Please select', 0);
		$status = Status::pluck("alias", "id")->prepend('Please select', 0);
	    
	    return view('admin.historystatus.create', compact("user", "status"));
	}

	/**
	 * Store a newly created historystatus in storage.
	 *
     * @param CreateHistorystatusRequest|Request $request
	 */
	public function store(CreateHistorystatusRequest $request)
	{
		$user = auth()->user();

		if($user->role_id == 2)
			$request->merge(['user_id' => $user->id]);

		Historystatus::create($request->all());

		return redirect()->route(config('quickadmin.route').'.historystatus.index');
	}

	/**
	 * Show the form for editing the specified historystatus.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$historystatus = Historystatus::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', 0);
		$status = Status::pluck("alias", "id")->prepend('Please select', 0);
	    
		return view('admin.historystatus.edit', compact('historystatus', "user", "status"));
	}

	/**
	 * Update the specified historystatus in storage.
     * @param UpdateHistorystatusRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHistorystatusRequest $request)
	{
		$historystatus = Historystatus::findOrFail($id);
		$historystatus->update($request->all());

		return redirect()->route(config('quickadmin.route').'.historystatus.index');
	}

	/**
	 * Remove the specified historystatus from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Historystatus::destroy($id);

		return redirect()->route(config('quickadmin.route').'.historystatus.index');
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
            Historystatus::destroy($toDelete);
        } else {
            Historystatus::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.historystatus.index');
    }

}
