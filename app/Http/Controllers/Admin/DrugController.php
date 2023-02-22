<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Drug;
use App\Http\Requests\CreateDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use Illuminate\Http\Request;

use App\Drugfamilly;
use App\Drugmaker;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class DrugController extends Controller {

	/**
	 * Display a listing of drug
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $drug = Drug::with("drugfamilly")->with("drugmaker")->get();

		return view('admin.drug.index', compact('drug'));
	}

	/**
	 * Show the form for creating a new drug
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $drugfamilly = Drugfamilly::pluck("name", "id")->prepend('Please select', 0);
		$drugmaker = Drugmaker::pluck("name", "id")->prepend('Please select', 0);

	    
	    return view('admin.drug.create', compact("drugfamilly", "drugmaker"));
	}

	/**
	 * Store a newly created drug in storage.
	 *
     * @param CreateDrugRequest|Request $request
	 */
	public function store(CreateDrugRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

	    
		Drug::create($request->all());

		return redirect()->route(config('quickadmin.route').'.drug.index');
	}

	/**
	 * Show the form for editing the specified drug.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$drug = Drug::find($id);
	    $drugfamilly = Drugfamilly::pluck("name", "id")->prepend('Please select', 0);
		$drugmaker = Drugmaker::pluck("name", "id")->prepend('Please select', 0);

	    
		return view('admin.drug.edit', compact('drug', "drugfamilly", "drugmaker"));
	}

	/**
	 * Update the specified drug in storage.
     * @param UpdateDrugRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDrugRequest $request)
	{
		$drug = Drug::findOrFail($id);

		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}


		$drug->update($request->all());

		return redirect()->route(config('quickadmin.route').'.drug.index');
	}

	/**
	 * Remove the specified drug from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Drug::destroy($id);

		return redirect()->route(config('quickadmin.route').'.drug.index');
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
            Drug::destroy($toDelete);
        } else {
            Drug::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.drug.index');
    }

}
