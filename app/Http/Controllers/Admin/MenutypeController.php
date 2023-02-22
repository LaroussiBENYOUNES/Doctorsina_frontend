<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Menutype;
use App\Http\Requests\CreateMenutypeRequest;
use App\Http\Requests\UpdateMenutypeRequest;
use Illuminate\Http\Request;



class MenutypeController extends Controller {

	/**
	 * Display a listing of menutype
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $menutype = Menutype::all();

		return view('admin.menutype.index', compact('menutype'));
	}

	/**
	 * Show the form for creating a new menutype
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.menutype.create');
	}

	/**
	 * Store a newly created menutype in storage.
	 *
     * @param CreateMenutypeRequest|Request $request
	 */
	public function store(CreateMenutypeRequest $request)
	{
	    
		Menutype::create($request->all());

		return redirect()->route(config('quickadmin.route').'.menutype.index');
	}

	/**
	 * Show the form for editing the specified menutype.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$menutype = Menutype::find($id);
	    
	    
		return view('admin.menutype.edit', compact('menutype'));
	}

	/**
	 * Update the specified menutype in storage.
     * @param UpdateMenutypeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMenutypeRequest $request)
	{
		$menutype = Menutype::findOrFail($id);

        

		$menutype->update($request->all());

		return redirect()->route(config('quickadmin.route').'.menutype.index');
	}

	/**
	 * Remove the specified menutype from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Menutype::destroy($id);

		return redirect()->route(config('quickadmin.route').'.menutype.index');
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
            Menutype::destroy($toDelete);
        } else {
            Menutype::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.menutype.index');
    }

}
