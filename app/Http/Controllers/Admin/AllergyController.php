<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Allergy;
use App\Http\Requests\CreateAllergyRequest;
use App\Http\Requests\UpdateAllergyRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class AllergyController extends Controller {

	/**
	 * Display a listing of allergy
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $allergy = Allergy::all();

		return view('admin.allergy.index', compact('allergy'));
	}

	/**
	 * Show the form for creating a new allergy
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.allergy.create');
	}

	/**
	 * Store a newly created allergy in storage.
	 *
     * @param CreateAllergyRequest|Request $request
	 */
	public function store(CreateAllergyRequest $request)
	{
	    
		Allergy::create($request->all());

		return redirect()->route(config('quickadmin.route').'.allergy.index');
	}

	/**
	 * Show the form for editing the specified allergy.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$allergy = Allergy::find($id);
	    
	    
		return view('admin.allergy.edit', compact('allergy'));
	}

	/**
	 * Update the specified allergy in storage.
     * @param UpdateAllergyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAllergyRequest $request)
	{
		$allergy = Allergy::findOrFail($id);

        

		$allergy->update($request->all());

		return redirect()->route(config('quickadmin.route').'.allergy.index');
	}

	/**
	 * Remove the specified allergy from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Allergy::destroy($id);

		return redirect()->route(config('quickadmin.route').'.allergy.index');
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
            Allergy::destroy($toDelete);
        } else {
            Allergy::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.allergy.index');
    }

}
