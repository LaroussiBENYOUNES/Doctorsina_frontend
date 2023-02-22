<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Visitstatus;
use App\Http\Requests\CreateVisitstatusRequest;
use App\Http\Requests\UpdateVisitstatusRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class VisitstatusController extends Controller {

	/**
	 * Display a listing of visitstatus
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $visitstatus = Visitstatus::all();

		return view('admin.visitstatus.index', compact('visitstatus'));
	}

	/**
	 * Show the form for creating a new visitstatus
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.visitstatus.create');
	}

	/**
	 * Store a newly created visitstatus in storage.
	 *
     * @param CreateVisitstatusRequest|Request $request
	 */
	public function store(CreateVisitstatusRequest $request)
	{
	    if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		Visitstatus::create($request->all());

		return redirect()->route(config('quickadmin.route').'.visitstatus.index');
	}

	/**
	 * Show the form for editing the specified visitstatus.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$visitstatus = Visitstatus::find($id);
	    
	    
		return view('admin.visitstatus.edit', compact('visitstatus'));
	}

	/**
	 * Update the specified visitstatus in storage.
     * @param UpdateVisitstatusRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateVisitstatusRequest $request)
	{
		$visitstatus = Visitstatus::findOrFail($id);

        if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		$visitstatus->update($request->all());

		return redirect()->route(config('quickadmin.route').'.visitstatus.index');
	}

	/**
	 * Remove the specified visitstatus from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Visitstatus::destroy($id);

		return redirect()->route(config('quickadmin.route').'.visitstatus.index');
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
            Visitstatus::destroy($toDelete);
        } else {
            Visitstatus::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.visitstatus.index');
    }

}
