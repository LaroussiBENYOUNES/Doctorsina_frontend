<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Zone;
use App\Http\Requests\CreateZoneRequest;
use App\Http\Requests\UpdateZoneRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class ZoneController extends Controller {

	/**
	 * Display a listing of zone
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $zone = Zone::all();

		return view('admin.zone.index', compact('zone'));
	}

	/**
	 * Show the form for creating a new zone
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.zone.create');
	}

	/**
	 * Store a newly created zone in storage.
	 *
     * @param CreateZoneRequest|Request $request
	 */
	public function store(CreateZoneRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
	    
		Zone::create($request->all());

		return redirect()->route(config('quickadmin.route').'.zone.index');
	}

	/**
	 * Show the form for editing the specified zone.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		
		$zone = Zone::find($id);
	    
	    
		return view('admin.zone.edit', compact('zone'));
	}


	/**
	 * Update the specified zone in storage.
     * @param UpdateZoneRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateZoneRequest $request)
	{
		$zone = Zone::findOrFail($id);

	
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		$zone->update($request->all());

		return redirect()->route(config('quickadmin.route').'.zone.index');
	}

	/**
	 * Remove the specified zone from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Zone::destroy($id);

		return redirect()->route(config('quickadmin.route').'.zone.index');
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
            Zone::destroy($toDelete);
        } else {
            Zone::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.zone.index');
    }

}
