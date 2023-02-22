<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Usermenu;
use App\Http\Requests\CreateUsermenuRequest;
use App\Http\Requests\UpdateUsermenuRequest;
use Illuminate\Http\Request;

use App\Menutype;


class UsermenuController extends Controller {

	/**
	 * Display a listing of usermenu
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $usermenu = Usermenu::with("menutype")->get();

		return view('admin.usermenu.index', compact('usermenu'));
	}

	/**
	 * Show the form for creating a new usermenu
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $menutype = Menutype::pluck("alias", "id")->prepend('Please select', null);

	    
	    return view('admin.usermenu.create', compact("menutype"));
	}

	/**
	 * Store a newly created usermenu in storage.
	 *
     * @param CreateUsermenuRequest|Request $request
	 */
	public function store(CreateUsermenuRequest $request)
	{
	    
		Usermenu::create($request->all());

		return redirect()->route(config('quickadmin.route').'.usermenu.index');
	}

	/**
	 * Show the form for editing the specified usermenu.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$usermenu = Usermenu::find($id);
	    $menutype = Menutype::pluck("alias", "id")->prepend('Please select', null);

	    
		return view('admin.usermenu.edit', compact('usermenu', "menutype"));
	}

	/**
	 * Update the specified usermenu in storage.
     * @param UpdateUsermenuRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateUsermenuRequest $request)
	{
		$usermenu = Usermenu::findOrFail($id);

        

		$usermenu->update($request->all());

		return redirect()->route(config('quickadmin.route').'.usermenu.index');
	}

	/**
	 * Remove the specified usermenu from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Usermenu::destroy($id);

		return redirect()->route(config('quickadmin.route').'.usermenu.index');
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
            Usermenu::destroy($toDelete);
        } else {
            Usermenu::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.usermenu.index');
    }

}
