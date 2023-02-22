<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Country;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use Illuminate\Http\Request;

use App\Zone;


if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

class CountryController extends Controller {

	/**
	 * Display a listing of country
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $country = Country::with("zone")->get();

		return view('admin.country.index', compact('country'));
	}

	/**
	 * Show the form for creating a new country
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $zone = Zone::pluck("alias", "id")->prepend('Please select',0);
	    return view('admin.country.create', compact("zone"));
	}

	/**
	 * Store a newly created country in storage.
	 *
     * @param CreateCountryRequest|Request $request
	 */
	public function store(CreateCountryRequest $request)
	{

		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
	    
		Country::create($request->all());

		return redirect()->route(config('quickadmin.route').'.country.index');
	}

	/**
	 * Show the form for editing the specified country.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$country = Country::find($id);
	    $zone = Zone::pluck("alias", "id")->prepend('Please select', 0);

	    
		return view('admin.country.edit', compact('country', "zone"));
	}

	/**
	 * Update the specified country in storage.
     * @param UpdateCountryRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCountryRequest $request)
	{
		$country = Country::findOrFail($id);

		if ($request['activated'] == "") {
			$request->merge(['activated' => 0]);
		}
        

		$country->update($request->all());

		return redirect()->route(config('quickadmin.route').'.country.index');
	}

	/**
	 * Remove the specified country from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Country::destroy($id);

		return redirect()->route(config('quickadmin.route').'.country.index');
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
            Country::destroy($toDelete);
        } else {
            Country::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.country.index');
    }

}
