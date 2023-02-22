<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use App\Patient;
use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}
class RegisterController extends Controller
{
    /**
     * Show a list of users
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $registers = User::all();
        $countries = country::pluck('alias', 'id' );
        //dd($countries);
        return view('register', compact('registers','countries'));
    }

    /**
     * Show a page of user creation
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Insert new user into the system
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       
        if ($request['type_user'] == "1") {
			$request->merge(['role_id' => 2]);
		}
        else {
            if ($request['typepro'] == "on")
                {
                    $request->merge(['role_id' => 10]);
                    $request->merge(["adminstrator"=>1]);
                }

                else 
                    $request->merge(['role_id' => 12]);
        }
        if ($request['gender'] == 0) {
			$request->merge(['gender' => "Male"]);
		}
        else if ($request['gender'] == 1) {
			$request->merge(['gender' => "Female"]);
		}

        else {
            $request->merge(['gender' => "Not specify"]);
        }

        if($request['role_id'] == "2")
            $request->merge(["confirmed"=>1]);
        else 
            $request->merge(["confirmed"=>0]);

        
        $input = $request->all();
        $token = $request->input('g-recaptcha-response');

        $this->validate($request, [
            'email' => 'unique:users,email',
            ]
        );
        
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        if(($request->all()['role_id']) == 2)
        {
            DB::table('patient')->insert(
                array('user_id' => $user->id,
                'fullname' => $user->name,
               'authorize' => 1,
               'activated' => 1,
               'signaled' => 0,
               'created_at' => date('Y-m-d H:i:s'))
            );
        }

        else {

            if(($request->all()['role_id']) == 10)
                {
                    DB::table('doctor')->insert(
                        array('fullname' => $request['email'],
                       'user_id' => $user->id,
                       'country_id' => $request['country'],
                       'speciality_id' => 1,
                       'birthday' => $request['birthday'],
                       'gender' => $request['gender'],
                       'codecnam' => $user->id,
                       'matricule' => $user->id,
                       'with_administrator_option' => 1,
                       'activated' => 1,
                       'signaled' => 0,
                       'created_at' => date('Y-m-d H:i:s'))
                    );
                }
        }
       
        return redirect()->route('register.index')->withMessage(trans('quickadmin::admin.users-controller-successfully_created'));
        
    }
}
