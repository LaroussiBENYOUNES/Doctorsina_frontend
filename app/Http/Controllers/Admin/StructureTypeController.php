<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\StructureType;
use App\Http\Requests\CreateStructureTypeRequest;
use App\Http\Requests\UpdateStructureTypeRequest;
use Illuminate\Http\Request;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class StructureTypeController extends Controller {

	/**
	 * Display a listing of structuretype
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $structuretype = StructureType::all();

		return view('admin.structuretype.index', compact('structuretype'));
	}

	/**
	 * Show the form for creating a new structuretype
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.structuretype.create');
	}

	/**
	 * Store a newly created structuretype in storage.
	 *
     * @param CreateStructureTypeRequest|Request $request
	 */
	public function store(CreateStructureTypeRequest $request)
	{
	    if($request->activated=='')
				$request->replace(['activated' => 0]);
		StructureType::create($request->all());

		return redirect()->route(config('quickadmin.route').'.structuretype.index');
	}

	/**
	 * Show the form for editing the specified structuretype.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$structuretype = StructureType::find($id);
	    
	    
		return view('admin.structuretype.edit', compact('structuretype'));
	}

	/**
	 * Update the specified structuretype in storage.
     * @param UpdateStructureTypeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStructureTypeRequest $request)
	{
		$structuretype = StructureType::findOrFail($id);

        if($request->activated=='')
				$request->replace(['activated' => 0]);

		$structuretype->update($request->all());

		return redirect()->route(config('quickadmin.route').'.structuretype.index');
	}

	/**
	 * Remove the specified structuretype from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		StructureType::destroy($id);

		return redirect()->route(config('quickadmin.route').'.structuretype.index');
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
            StructureType::destroy($toDelete);
        } else {
            StructureType::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.structuretype.index');
    }

}
