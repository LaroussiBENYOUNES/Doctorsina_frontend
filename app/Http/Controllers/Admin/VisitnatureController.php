<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Visitnature;
use App\Http\Requests\CreateVisitnatureRequest;
use App\Http\Requests\UpdateVisitnatureRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class VisitnatureController extends Controller {

	/**
	 * Display a listing of visitnature
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $visitnature = Visitnature::all();

		return view('admin.visitnature.index', compact('visitnature'));
	}

	/**
	 * Show the form for creating a new visitnature
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.visitnature.create');
	}

	/**
	 * Store a newly created visitnature in storage.
	 *
     * @param CreateVisitnatureRequest|Request $request
	 */
	public function store(CreateVisitnatureRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
		Visitnature::create($request->all());

		return redirect()->route(config('quickadmin.route').'.visitnature.index');
	}

	/**
	 * Show the form for editing the specified visitnature.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$visitnature = Visitnature::find($id);
	    
	    
		return view('admin.visitnature.edit', compact('visitnature'));
	}

	/**
	 * Update the specified visitnature in storage.
     * @param UpdateVisitnatureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateVisitnatureRequest $request)
	{
		$visitnature = Visitnature::findOrFail($id);

        if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		$visitnature->update($request->all());

		return redirect()->route(config('quickadmin.route').'.visitnature.index');
	}

	/**
	 * Remove the specified visitnature from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Visitnature::destroy($id);

		return redirect()->route(config('quickadmin.route').'.visitnature.index');
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
            Visitnature::destroy($toDelete);
        } else {
            Visitnature::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.visitnature.index');
    }

}
