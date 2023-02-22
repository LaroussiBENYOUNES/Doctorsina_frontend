<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Sett;
use App\Http\Requests\CreateSettRequest;
use App\Http\Requests\UpdateSettRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class SettController extends Controller {

	/**
	 * Display a listing of sett
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $sett = Sett::all();

		return view('admin.sett.index', compact('sett'));
	}

	/**
	 * Show the form for creating a new sett
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.sett.create');
	}

	/**
	 * Store a newly created sett in storage.
	 *
     * @param CreateSettRequest|Request $request
	 */
	public function store(CreateSettRequest $request)
	{
	    
		Sett::create($request->all());

		return redirect()->route(config('quickadmin.route').'.sett.index');
	}

	/**
	 * Show the form for editing the specified sett.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$sett = Sett::find($id);
	    
	    
		return view('admin.sett.edit', compact('sett'));
	}

	/**
	 * Update the specified sett in storage.
     * @param UpdateSettRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSettRequest $request)
	{
		$sett = Sett::findOrFail($id);

        

		$sett->update($request->all());

		return redirect()->route(config('quickadmin.route').'.sett.index');
	}

	/**
	 * Remove the specified sett from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Sett::destroy($id);

		return redirect()->route(config('quickadmin.route').'.sett.index');
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
            Sett::destroy($toDelete);
        } else {
            Sett::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.sett.index');
    }

}
