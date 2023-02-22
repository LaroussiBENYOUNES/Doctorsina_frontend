<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Drugmaker;
use App\Http\Requests\CreateDrugmakerRequest;
use App\Http\Requests\UpdateDrugmakerRequest;
use Illuminate\Http\Request;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class DrugmakerController extends Controller {

	/**
	 * Display a listing of drugmaker
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $drugmaker = Drugmaker::all();

		return view('admin.drugmaker.index', compact('drugmaker'));
	}

	/**
	 * Show the form for creating a new drugmaker
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.drugmaker.create');
	}

	/**
	 * Store a newly created drugmaker in storage.
	 *
     * @param CreateDrugmakerRequest|Request $request
	 */
	public function store(CreateDrugmakerRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

	    
		Drugmaker::create($request->all());

		return redirect()->route(config('quickadmin.route').'.drugmaker.index');
	}

	/**
	 * Show the form for editing the specified drugmaker.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$drugmaker = Drugmaker::find($id);
	    
	    
		return view('admin.drugmaker.edit', compact('drugmaker'));
	}

	/**
	 * Update the specified drugmaker in storage.
     * @param UpdateDrugmakerRequest|Request $request
	 * 
   	 * @param  int  $id
	 */
	public function update($id, UpdateDrugmakerRequest $request)
	{
		$drugmaker = Drugmaker::findOrFail($id);

		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		$drugmaker->update($request->all());

		return redirect()->route(config('quickadmin.route').'.drugmaker.index');
	}

	/**
	 * Remove the specified drugmaker from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Drugmaker::destroy($id);

		return redirect()->route(config('quickadmin.route').'.drugmaker.index');
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
            Drugmaker::destroy($toDelete);
        } else {
            Drugmaker::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.drugmaker.index');
    }

}
