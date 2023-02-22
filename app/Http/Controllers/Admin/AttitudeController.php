<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Attitude;
use App\Http\Requests\CreateAttitudeRequest;
use App\Http\Requests\UpdateAttitudeRequest;
use Illuminate\Http\Request;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}


class AttitudeController extends Controller {

	/**
	 * Display a listing of attitude
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $attitude = Attitude::all();

		return view('admin.attitude.index', compact('attitude'));
	}

	/**
	 * Show the form for creating a new attitude
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.attitude.create');
	}

	/**
	 * Store a newly created attitude in storage.
	 *
     * @param CreateAttitudeRequest|Request $request
	 */
	public function store(CreateAttitudeRequest $request)
	{
	    
		Attitude::create($request->all());

		return redirect()->route(config('quickadmin.route').'.attitude.index');
	}

	/**
	 * Show the form for editing the specified attitude.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$attitude = Attitude::find($id);
	    
	    
		return view('admin.attitude.edit', compact('attitude'));
	}

	/**
	 * Update the specified attitude in storage.
     * @param UpdateAttitudeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAttitudeRequest $request)
	{
		$attitude = Attitude::findOrFail($id);

        

		$attitude->update($request->all());

		return redirect()->route(config('quickadmin.route').'.attitude.index');
	}

	/**
	 * Remove the specified attitude from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Attitude::destroy($id);

		return redirect()->route(config('quickadmin.route').'.attitude.index');
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
            Attitude::destroy($toDelete);
        } else {
            Attitude::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.attitude.index');
    }

}
