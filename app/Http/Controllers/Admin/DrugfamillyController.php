<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Drugfamilly;
use App\Http\Requests\CreateDrugfamillyRequest;
use App\Http\Requests\UpdateDrugfamillyRequest;
use Illuminate\Http\Request;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}



class DrugfamillyController extends Controller {

	/**
	 * Display a listing of drugfamilly
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $drugfamilly = Drugfamilly::all();
		return view('admin.drugfamilly.index', compact('drugfamilly'));
	}

	/**
	 * Show the form for creating a new drugfamilly
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.drugfamilly.create');
	}

	/**
	 * Store a newly created drugfamilly in storage.
	 *
     * @param CreateDrugfamillyRequest|Request $request
	 */
	public function store(CreateDrugfamillyRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		Drugfamilly::create($request->all());

		return redirect()->route(config('quickadmin.route').'.drugfamilly.index');
	}

	/**
	 * Show the form for editing the specified drugfamilly.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$drugfamilly = Drugfamilly::find($id);
	    
	    
		return view('admin.drugfamilly.edit', compact('drugfamilly'));
	}

	/**
	 * Update the specified drugfamilly in storage.
     * @param UpdateDrugfamillyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDrugfamillyRequest $request)
	{
		$drugfamilly = Drugfamilly::findOrFail($id);
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

        

		$drugfamilly->update($request->all());

		return redirect()->route(config('quickadmin.route').'.drugfamilly.index');
	}

	/**
	 * Remove the specified drugfamilly from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Drugfamilly::destroy($id);

		return redirect()->route(config('quickadmin.route').'.drugfamilly.index');
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
            Drugfamilly::destroy($toDelete);
        } else {
            Drugfamilly::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.drugfamilly.index');
    }

}
