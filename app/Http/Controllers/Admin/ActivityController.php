<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Activity;
use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Illuminate\Http\Request;


if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
	
class ActivityController extends Controller {

	/**
	 * Display a listing of activity
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $activity = Activity::all();

		return view('admin.activity.index', compact('activity'));
	}

	/**
	 * Show the form for creating a new activity
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.activity.create');
	}

	/**
	 * Store a newly created activity in storage.
	 *
     * @param CreateActivityRequest|Request $request
	 */
	public function store(CreateActivityRequest $request)
	{
	    
		Activity::create($request->all());

		return redirect()->route(config('quickadmin.route').'.activity.index');
	}

	/**
	 * Show the form for editing the specified activity.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$activity = Activity::find($id);
	    
	    
		return view('admin.activity.edit', compact('activity'));
	}

	/**
	 * Update the specified activity in storage.
     * @param UpdateActivityRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateActivityRequest $request)
	{
		$activity = Activity::findOrFail($id);

        

		$activity->update($request->all());

		return redirect()->route(config('quickadmin.route').'.activity.index');
	}

	/**
	 * Remove the specified activity from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Activity::destroy($id);

		return redirect()->route(config('quickadmin.route').'.activity.index');
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
            Activity::destroy($toDelete);
        } else {
            Activity::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.activity.index');
    }

}
