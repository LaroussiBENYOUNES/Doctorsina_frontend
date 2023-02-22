<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Visittype;
use App\Http\Requests\CreateVisittypeRequest;
use App\Http\Requests\UpdateVisittypeRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class VisittypeController extends Controller {

	/**
	 * Display a listing of visittype
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $visittype = Visittype::all();

		return view('admin.visittype.index', compact('visittype'));
	}

	/**
	 * Show the form for creating a new visittype
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.visittype.create');
	}

	/**
	 * Store a newly created visittype in storage.
	 *
     * @param CreateVisittypeRequest|Request $request
	 */
	public function store(CreateVisittypeRequest $request)
	{
	    if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		Visittype::create($request->all());

		return redirect()->route(config('quickadmin.route').'.visittype.index');
	}

	/**
	 * Show the form for editing the specified visittype.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$visittype = Visittype::find($id);
	    
	    
		return view('admin.visittype.edit', compact('visittype'));
	}

	/**
	 * Update the specified visittype in storage.
     * @param UpdateVisittypeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateVisittypeRequest $request)
	{
		$visittype = Visittype::findOrFail($id);

        if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}

		$visittype->update($request->all());

		return redirect()->route(config('quickadmin.route').'.visittype.index');
	}

	/**
	 * Remove the specified visittype from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Visittype::destroy($id);

		return redirect()->route(config('quickadmin.route').'.visittype.index');
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
            Visittype::destroy($toDelete);
        } else {
            Visittype::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.visittype.index');
    }

}
