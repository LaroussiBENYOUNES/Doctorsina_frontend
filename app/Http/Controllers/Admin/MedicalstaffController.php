<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Medicalstaff;
use App\Http\Requests\CreateMedicalstaffRequest;
use App\Http\Requests\UpdateMedicalstaffRequest;
use Illuminate\Http\Request;

use App\User;
use App\MedicalStructure;
use App\Doctor;


if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
class MedicalstaffController extends Controller {

	/**
	 * Display a listing of medicalstaff
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		if(($user->role_id==1)||($user->role_id==2))
		{
		  $medicalstaff = Medicalstaff::with("user")->with("medicalstructure")->get();
		}

		else {

		$medicalstaff = Medicalstaff::with("user")->with("medicalstructure")->where('user_id', $user->id)->get();
        $medicalstaff = $medicalstaff->all();
		$tabmedcalstaff = [];
		foreach($medicalstaff as $md) 
		{
			array_push($tabmedcalstaff,$md->getAttributes()['medicalstructure_id']);
		}
		$medicalstaff = Medicalstaff::with("user")->with("medicalstructure")->whereIn('medicalstructure_id', $tabmedcalstaff)->get();
		if($user->role_id == 10) {
			$doctor = Doctor::where('user_id', $user->id)->get();
			$wao= $doctor->all()[0]->getAttributes()['with_administrator_option'];
			return view('admin.medicalstaff.index', compact('medicalstaff', 'wao'));
		}

		}
		
		//$medicalstaff = Medicalstaff::with("user")->with("user")->with("medicalstructure")->get();
		return view('admin.medicalstaff.index', compact('medicalstaff'));
	}

	/**
	 * Show the form for creating a new medicalstaff
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	  $userco = auth()->user();
	  $user = User::whereIn('role_id',[12,10,11])->pluck("email", "id")->prepend('Please select', 0);

	  if($userco->role_id==1)
	  {
		$medicalstaff = Medicalstaff::with("user")->with("medicalstructure")->get();
		$medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', 0);

	  }
	  else {

	  $medicalstaff = Medicalstaff::with("user")->with("medicalstructure")->where('user_id', $userco->id)->get();
	  $tabmedcalstaff = [];
	  foreach($medicalstaff as $md) 
	  {
		  array_push($tabmedcalstaff,$md->getAttributes()['medicalstructure_id']);
	  }
	  $medicalstructure = MedicalStructure::whereIn('id',$tabmedcalstaff)->pluck("label", "id")->prepend('Please select', 0);

	  }
         
	  return view('admin.medicalstaff.create', compact("user", "medicalstructure"));
	}

	/**
	 * Store a newly created medicalstaff in storage.
	 *
     * @param CreateMedicalstaffRequest|Request $request
	 */
	public function store(CreateMedicalstaffRequest $request)
	{
		Medicalstaff::create($request->all());

		return redirect()->route(config('quickadmin.route').'.medicalstaff.index');
	}

	/**
	 * Show the form for editing the specified medicalstaff.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$medicalstaff = Medicalstaff::find($id);
		$userco = auth()->user();
		$user = User::whereIn('role_id',[12,10,11])->pluck("email", "id")->prepend('Please select', 0);
  
		if($userco->role_id==1)
		{
		  $medicalstaff = Medicalstaff::with("user")->with("medicalstructure")->get();
		  $medicalstructure = MedicalStructure::pluck("label", "id")->prepend('Please select', 0);
  
		}
		else {
  
		$medicalstaff = Medicalstaff::with("user")->with("medicalstructure")->where('user_id', $userco->id)->get();
		$tabmedcalstaff = [];
		foreach($medicalstaff as $md) 
		{
			array_push($tabmedcalstaff,$md->getAttributes()['medicalstructure_id']);
		}
		$medicalstructure = MedicalStructure::whereIn('id',$tabmedcalstaff)->pluck("label", "id")->prepend('Please select', 0);
  
		}

	    
		return view('admin.medicalstaff.edit', compact('medicalstaff', "user", "medicalstructure"));
	}

	/**
	 * Update the specified medicalstaff in storage.
     * @param UpdateMedicalstaffRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMedicalstaffRequest $request)
	{
		$medicalstaff = Medicalstaff::findOrFail($id);

        

		$medicalstaff->update($request->all());

		return redirect()->route(config('quickadmin.route').'.medicalstaff.index');
	}

	/**
	 * Remove the specified medicalstaff from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Medicalstaff::destroy($id);

		return redirect()->route(config('quickadmin.route').'.medicalstaff.index');
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
            Medicalstaff::destroy($toDelete);
        } else {
            Medicalstaff::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.medicalstaff.index');
    }

}