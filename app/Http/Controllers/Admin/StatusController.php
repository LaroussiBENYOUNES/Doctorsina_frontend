<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Status;
use App\Http\Requests\CreateStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class StatusController extends Controller {

	/**
	 * Display a listing of status
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $status = Status::all();

		return view('admin.status.index', compact('status'));
	}

	/**
	 * Show the form for creating a new status
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.status.create');
	}

	/**
	 * Store a newly created status in storage.
	 *
     * @param CreateStatusRequest|Request $request
	 */
	public function store(CreateStatusRequest $request)
	{
	    
		Status::create($request->all());

		return redirect()->route(config('quickadmin.route').'.status.index');
	}

	/**
	 * Show the form for editing the specified status.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$status = Status::find($id);
	    
	    
		return view('admin.status.edit', compact('status'));
	}

	/**
	 * Update the specified status in storage.
     * @param UpdateStatusRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStatusRequest $request)
	{
		$status = Status::findOrFail($id);

        

		$status->update($request->all());

		return redirect()->route(config('quickadmin.route').'.status.index');
	}

	/**
	 * Remove the specified status from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Status::destroy($id);

		return redirect()->route(config('quickadmin.route').'.status.index');
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
            Status::destroy($toDelete);
        } else {
            Status::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.status.index');
    }

}
