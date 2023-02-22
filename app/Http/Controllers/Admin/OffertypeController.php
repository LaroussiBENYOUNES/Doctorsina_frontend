<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Offertype;
use App\Http\Requests\CreateOffertypeRequest;
use App\Http\Requests\UpdateOffertypeRequest;
use Illuminate\Http\Request;


// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class OffertypeController extends Controller {

	/**
	 * Display a listing of offertype
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $offertype = Offertype::all();

		return view('admin.offertype.index', compact('offertype'));
	}

	/**
	 * Show the form for creating a new offertype
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.offertype.create');
	}

	/**
	 * Store a newly created offertype in storage.
	 *
     * @param CreateOffertypeRequest|Request $request
	 */
	public function store(CreateOffertypeRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		Offertype::create($request->all());

		return redirect()->route(config('quickadmin.route').'.offertype.index');
	}

	/**
	 * Show the form for editing the specified offertype.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$offertype = Offertype::find($id);
	    
		return view('admin.offertype.edit', compact('offertype'));
	}

	/**
	 * Update the specified offertype in storage.
     * @param UpdateOffertypeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateOffertypeRequest $request)
	{
		$offertype = Offertype::findOrFail($id);
		$user = auth()->user();
		if($user->role_id == 12)
		{
			$request->merge(['activated' => $offertype->activated]);
		}
		
		else if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		$offertype->update($request->all());

		return redirect()->route(config('quickadmin.route').'.offertype.index');
	}

	/**
	 * Remove the specified offertype from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Offertype::destroy($id);

		return redirect()->route(config('quickadmin.route').'.offertype.index');
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
            Offertype::destroy($toDelete);
        } else {
            Offertype::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.offertype.index');
    }

}
