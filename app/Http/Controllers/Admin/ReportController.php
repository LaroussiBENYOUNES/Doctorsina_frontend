<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Report;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Http\Request;

// eviter erreur engendrer par le generateur
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}


class ReportController extends Controller {

	/**
	 * Display a listing of report
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $report = Report::all();

		return view('admin.report.index', compact('report'));
	}

	/**
	 * Show the form for creating a new report
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.report.create');
	}

	/**
	 * Store a newly created report in storage.
	 *
     * @param CreateReportRequest|Request $request
	 */
	public function store(CreateReportRequest $request)
	{
		if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}

		Report::create($request->all());

		return redirect()->route(config('quickadmin.route').'.report.index');
	}

	/**
	 * Show the form for editing the specified report.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$report = Report::find($id);
	    
	    
		return view('admin.report.edit', compact('report'));
	}

	/**
	 * Update the specified report in storage.
     * @param UpdateReportRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateReportRequest $request)
	{
		$report = Report::findOrFail($id);

         if ($request['activated'] == "") {
			$request->merge(['activated' => "0"]);
		}

		$report->update($request->all());

		return redirect()->route(config('quickadmin.route').'.report.index');
	}

	/**
	 * Remove the specified report from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Report::destroy($id);

		return redirect()->route(config('quickadmin.route').'.report.index');
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
            Report::destroy($toDelete);
        } else {
            Report::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.report.index');
    }

}
