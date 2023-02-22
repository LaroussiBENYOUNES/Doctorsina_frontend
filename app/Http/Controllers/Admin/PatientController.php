<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Patient;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;

use App\User;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class PatientController extends Controller {

	/**
	 * Display a listing of patient
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		
        $patient = Patient::with("user")->get();
		
		return view('admin.patient.index', compact('patient'));
	}

	/**
	 * Show the form for creating a new patient
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("email", "id")->prepend('Please select', null);

	    
	    return view('admin.patient.create', compact("user"));
	}

	/**
	 * Store a newly created patient in storage.
	 *
     * @param CreatePatientRequest|Request $request
	 */
	public function store(CreatePatientRequest $request)
	{
		if ($request['signaled'] == "") {
			$request->merge(['signaled' => "0"]);
		}
		if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}
		Patient::create($request->all());

		return redirect()->route(config('quickadmin.route').'.patient.index');
	}

	/**
	 * Show the form for editing the specified patient.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$patient = Patient::find($id);
	    $user = User::pluck("email", "id")->prepend('Please select', null);

	    
		return view('admin.patient.edit', compact('patient', "user"));
	}

	/**
	 * Update the specified patient in storage.
     * @param UpdatePatientRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePatientRequest $request)
	{
		$patient = Patient::findOrFail($id);

		if ($request['signaled'] == "") {
			$request->merge(['signaled' => "0"]);
		}
		if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}

		$patient->update($request->all());

		return redirect()->route(config('quickadmin.route').'.patient.index');
	}

	/**
	 * Remove the specified patient from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Patient::destroy($id);

		return redirect()->route(config('quickadmin.route').'.patient.index');
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
            Patient::destroy($toDelete);
        } else {
            Patient::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.patient.index');
    }

}
