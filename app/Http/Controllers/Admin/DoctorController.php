<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Doctor;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;

use App\User;
use App\Country;
use App\Speciality;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
class DoctorController extends Controller {

	/**
	 * Display a listing of doctor
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		
        $doctor = Doctor::with("user")->with("country")->with("speciality")->get();

		return view('admin.doctor.index', compact('doctor'));
	}

	/**
	 * Show the form for creating a new doctor
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("email", "id")->prepend('Please select', null);
        $country = Country::pluck("alias", "id")->prepend('Please select', null);
        $speciality = Speciality::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.doctor.create', compact("user", "country", "speciality"));
	}

	/**
	 * Store a newly created doctor in storage.
	 *
     * @param CreateDoctorRequest|Request $request
	 */
	public function store(CreateDoctorRequest $request)
	{
		Doctor::create($request->all());

		return redirect()->route(config('quickadmin.route').'.doctor.index');
	}

	/**
	 * Show the form for editing the specified doctor.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$doctor = Doctor::find($id);
	    $user = User::pluck("email", "id")->prepend('Please select', null);
        $country = Country::pluck("alias", "id")->prepend('Please select', null);
        $speciality = Speciality::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.doctor.edit', compact('doctor', "user", "country", "speciality"));
	}

	/**
	 * Update the specified doctor in storage.
     * @param UpdateDoctorRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDoctorRequest $request)
	{
		$doctor = Doctor::findOrFail($id);

		if ($request['signaled'] == "") {
			$request->merge(['signaled' => "0"]);
		}
		if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}

		$doctor->update($request->all());

		return redirect()->route(config('quickadmin.route').'.doctor.index');
	}

	/**
	 * Remove the specified doctor from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Doctor::destroy($id);

		return redirect()->route(config('quickadmin.route').'.doctor.index');
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
            Doctor::destroy($toDelete);
        } else {
            Doctor::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.doctor.index');
    }

}
