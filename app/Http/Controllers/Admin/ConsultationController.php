<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Consultation;
use App\Http\Requests\CreateConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Appoitement;
use App\Doctor;
use App\Patient;
use App\Report;
use App\Visitnature;
use App\Visitstatus;
use App\Visittype;
use App\Question;
use App\Response;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
	// Ignores notices and reports all other kinds... and warnings
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
	}

	class obj{

	}


class ConsultationController extends Controller {

	/**
	 * Display a listing of consultation
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
		$user = auth()->user();
		
		if ($user->role_id == 10) { 

		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		$arr = $doctor[0]->getAttributes();
		$consultation = DB::table('consultation')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->join('visitnature', 'consultation.visitnature_id', '=', 'visitnature.id')->join('visitstatus', 'consultation.visitstatus_id', '=', 'visitstatus.id')->join('visittype', 'consultation.visittype_id', '=', 'visittype.id')->select('consultation.*', 'visitnature.alias as visitnature_alias', 'visitnature.id as visitnature_id', 'visitstatus.alias as visitstatus_alias', 'visitstatus.id as visitstatus_id', 'visittype.alias as visittype_alias', 'visittype.id as visittype_id')->where([['appoitement.doctor_id', $arr['id']], ['appoitement.deleted_at', null], ['consultation.deleted_at', null]])->get();
		}
		else if ($user->role_id == 2) {
			$patient = Patient::select()->where('user_id', $user->id)->get();
			$arr = $patient[0]->getAttributes();
			$consultation = DB::table('consultation')->join('appoitement', 'appoitement.id', '=', 'consultation.appoitement_id')->join('visitnature', 'consultation.visitnature_id', '=', 'visitnature.id')->join('visitstatus', 'consultation.visitstatus_id', '=', 'visitstatus.id')->join('visittype', 'consultation.visittype_id', '=', 'visittype.id')->select('consultation.*', 'visitnature.alias as visitnature_alias', 'visitnature.id as visitnature_id', 'visitstatus.alias as visitstatus_alias', 'visitstatus.id as visitstatus_id', 'visittype.alias as visittype_alias', 'visittype.id as visittype_id')->where([['appoitement.doctor_id', $arr['id']], ['appoitement.deleted_at', null], ['consultation.deleted_at', null]])->get();
		}
		else {
			$consultation = DB::table('consultation')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->join('visitnature', 'consultation.visitnature_id', '=', 'visitnature.id')->join('visitstatus', 'consultation.visitstatus_id', '=', 'visitstatus.id')->join('visittype', 'consultation.visittype_id', '=', 'visittype.id')->select('consultation.*', 'visitnature.alias as visitnature_alias', 'visitnature.id as visitnature_id', 'visitstatus.alias as visitstatus_alias', 'visitstatus.id as visitstatus_id', 'visittype.alias as visittype_alias', 'visittype.id as visitype_id' )->where([['appoitement.deleted_at', null], ['consultation.deleted_at', null]])->get();
		}

		return view('admin.consultation.index', compact('consultation'));
	}

	/**
	 * Show the form for creating a new consultation
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
		$user = auth()->user();

	    //$appoitement = Appoitement::pluck("id", "id")->prepend('Please select', null);
		$doctor = Doctor::select()->where('user_id', $user->id)->get();
		if($doctor[0] != null)
			{
			$arr = $doctor[0]->getAttributes();
			$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('doctor_id',$arr['id'])->get();
			$appoitementselect = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('doctor_id',$arr['id'])->pluck("id", "id")->prepend('Please select', 0);
		}
		else{
			$appoitement = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('doctor_id',0)->get();
			$appoitementselect = Appoitement::with("medicalstructure")->with("patient")->with("doctor")->where('doctor_id',$arr['id'])->pluck("id", "id")->prepend('Please select', 0);
		}
		$visitnature = Visitnature::pluck("alias", "id")->prepend('Please select',0);
		$visitstatus = Visitstatus::pluck("alias", "id")->prepend('Please select',0);
		$visittype = Visittype::pluck("alias", "id")->prepend('Please select',0);
		$question = Question::pluck("alias", "id")->prepend('Choose question', 0);

		//dd($visittype);
		$report = Report::pluck("id", "id")->prepend('Please select',0);

	    return view('admin.consultation.create', compact("question", "visitnature", "visitstatus", "visittype", "report", "appoitement", "appoitementselect"));
	}

	/**
	 * Store a newly created consultation in storage.
	 *
     * @param CreateConsultationRequest|Request $request
	 */
	public function store(CreateConsultationRequest $request)
	{
		$content = $request->getContent();
		$tabcontent = preg_split ("/\&/", $content); 
		$array_id_question = array();
		$array_obj_question = array();
		$tabquestions = array();
		$tabresponses = array();
		$array_obj_quesresp = array();
		$rep=0;
		foreach ($tabcontent as $value){
			if(strpos($value, "question_id") !== false){
				$idq = substr($value, 12);
				$intidq = (int)$idq;
				array_push($tabquestions, $intidq);
			}

			if(strpos($value, "patient_response") !== false){
				$pos = strpos($value, "=");
				$resp = substr($value, $pos+1);
				$resp = str_replace("+"," ", $resp);
				array_push($tabresponses, $resp);
			}
		}

		for ($i=0 ; $i < count($tabquestions) ; $i++){

			$obj = new obj;
			$obj->idquestion = $tabquestions[$i];
			$obj->patient_response = $tabresponses[$i];
			array_push($array_obj_quesresp, $obj);

		}
		
	    
		$appoitement = Appoitement::find($request->appoitement_id);
		$appoitement = $appoitement->getAttributes();
		
		
		$newconsultationid = DB::table('consultation')->insertGetId(
			array('appoitement_id' => $appoitement['id'],
		    'report_id' => $request->report_id,
			'visitnature_id' => $request->visitnature_id,
			'visitstatus_id' => $request->visitstatus_id,
			'visittype_id' => $request->visittype_id,
		   'date' => $appoitement['date'],
		   'time' => $appoitement['time'],
		   'created_at' => date('Y-m-d H:i:s'))
		);


		foreach ($array_obj_quesresp as $o){
			if($o->idquestion != 0)
			{
				DB::table('response')->insert(
					array('question_id' => $o->idquestion,
						  'consultation_id' => $newconsultationid,
						  'patient_response' => $o->patient_response,
						 // 'accepted' => $o->accepted,
						  'created_at' => date('Y-m-d H:i:s'))
				);
			}
        }
		return redirect()->route(config('quickadmin.route').'.consultation.index');
	}

	/**
	 * Show the form for editing the specified consultation.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		
		//$consultation = Consultation::with("visitnature")::with("visitstatus")::with("visittype")::find($id);
		$consultation = DB::table('consultation')->join('appoitement', 'consultation.appoitement_id', '=', 'appoitement.id')->join('visitnature', 'consultation.visitnature_id', '=', 'visitnature.id')->join('visitstatus', 'consultation.visitstatus_id', '=', 'visitstatus.id')->join('visittype', 'consultation.visittype_id', '=', 'visittype.id')->select('consultation.*', 'visitnature.alias as visitnature_alias', 'visitstatus.alias as visitstatus_alias', 'visittype.alias as visittype_alias')->where('consultation.id', $id)->get();
	    $consultation = $consultation[0];
		//dd($consultation);
		$appoitement = Appoitement::pluck("id", "id")->prepend('Please select', 0);
		$report = Report::pluck("id", "id")->prepend('Please select','id');
		$visitnature = Visitnature::pluck("alias", "id")->prepend('Please select', 0);
		$visitstatus = Visitstatus::pluck("alias", "id")->prepend('Please select', 0);
		$visittype = Visittype::pluck("alias", "id")->prepend('Please select', 0);
		$response = Response::with("question")->with("consultation")->where('consultation_id',$id)->get();

		$tabquestion = [];
		foreach($response as $dp)
			{
				$dp = $dp->getAttributes();
				array_push($tabquestion, $dp['question_id']);
			}
			$question = DB::table('question')
                    ->whereIn('id', $tabquestion)
                    ->get();
			$question = $question->all();
			$firstquestion = $question[0];
			array_shift($question);
			$questions = Question::all();
			$tabindice = [];
			$i = 1;
			foreach($question as $dp)
			{
				$dp->indice=$i+1;
			}
			$questionselect = Question::pluck("alias", "id")->prepend('Choose Question', 'id');
			$responses = DB::table('response')->select('response.*')->where([['consultation_id',$id],['deleted_at',null]])->get();
			$firstresponse = $responses[0];
			unset($responses[0]);
			$i = 1;
			foreach($responses as $dp)
			{
				$dp->indice=$i+1;
				$i = $i + 1;
			}
			
			
	    
		return view('admin.consultation.edit', compact("i","responses","firstresponse","questionselect","visitnature", "visitstatus", "visittype","report", "consultation", "appoitement"));
	}

	/**
	 * Update the specified consultation in storage.
     * @param UpdateConsultationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateConsultationRequest $request)
	{
		$consultation = Consultation::findOrFail($id);
		$response = Response::with("question")->with("consultation")->where([['consultation_id',$id],['deleted_at',null]])->get();
		foreach($response as $dp)
		{
			$dp = $dp->getAttributes();
			Response::destroy($dp['id']);
		}

		$content = $request->getContent();
		$tabcontent = preg_split ("/\&/", $content); 

		$tabquestions = array();
		$tabresponses = array();
		$array_obj_quesresp = array();
		$rep=0;
		foreach ($tabcontent as $value){
			if(strpos($value, "question_id") !== false){
				$idq = substr($value, 12);
				$intidq = (int)$idq;
				array_push($tabquestions, $intidq);
			}

			if(strpos($value, "patient_response") !== false){
				$pos = strpos($value, "=");
				$resp = substr($value, $pos+1);
				$resp = str_replace("+"," ", $resp);
				array_push($tabresponses, $resp);
			}
		}

		for ($i=0 ; $i < count($tabquestions) ; $i++){

			$obj = new obj;
			$obj->idquestion = $tabquestions[$i];
			$obj->patient_response = $tabresponses[$i];
			array_push($array_obj_quesresp, $obj);

		}


		if ($request['report_id'] == 0) {
			$request->merge(['report_id' => null]);
		}

		foreach ($array_obj_quesresp as $value){
			$dsp = new Response;
			$dsp->question_id = $value->idquestion ;
			$dsp->consultation_id = $id;
			$dsp->patient_response=$value->patient_response;
			$dsp->save();
		}

		$consultation->update($request->all());

		return redirect()->route(config('quickadmin.route').'.consultation.index');
	}

	/**
	 * Remove the specified consultation from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Consultation::destroy($id);

		return redirect()->route(config('quickadmin.route').'.consultation.index');
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
            Consultation::destroy($toDelete);
        } else {
            Consultation::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.consultation.index');
    }

}
