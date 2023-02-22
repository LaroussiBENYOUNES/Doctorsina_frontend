@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    @if((Auth::user()->role_id == 1) || (Auth::user()->role_id == 12))
    <h3 style="margin-left:10px">Appoitement Details</h3>
    @else
    <h3 style="margin-left:10px">Edit Appoitement</h3>
    @endif
    <br>

        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($appoitement, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.appoitement.update', $appoitement->id))) !!}

<div class="form-group">
    {!! Form::label('medicalstructure_id', 'Medical Structure*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((Auth::user()->role_id == 1) || (Auth::user()->role_id == 12) || (Auth::user()->role_id == 2))
    {!! Form::select('medicalstructure_id', $medicalstructure, old('medicalstructure_id',$appoitement->medicalstructure_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;', disabled)) !!}
    @else 
    {!! Form::select('medicalstructure_id', $medicalstructure, old('medicalstructure_id',$appoitement->medicalstructure_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;')) !!}
    @endif
    </div>
</div><div class="form-group">
    {!! Form::label('patient_id', 'Patient*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('patient_id', $patient, old('patient_id',$appoitement->patient_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;', disabled)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('doctor_id', 'Doctor', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('doctor_id', $doctor, old('doctor_id',$appoitement->doctor_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;', disabled)) !!}    
    </div>
</div>
<div class="form-group">
    {!! Form::label('date', 'Date*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    <!--@if($days>1)
    {!! Form::select('rendezvouspotentiel_id', $rendezvouspotentiel, rendezvouspotentiel[0], array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;')) !!}
    @else 
    {!! Form::select('rendezvouspotentiel_id', $rendezvouspotentiel, rendezvouspotentiel[0], array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;', disabled)) !!}
    @endif-->
    @if((auth()->user()->role_id==2) || (auth()->user()->role_id==10))
    {!! Form::select('rendezvouspotentiel_id', $rendezvouspotentiel, rendezvouspotentiel[0], array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;')) !!}
    @else 
    {!! Form::select('rendezvouspotentiel_id', $rendezvouspotentiel, rendezvouspotentiel[0], array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;', disabled)) !!}
    @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('confirmed', 'Confirmed', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">
    @if(auth()->user()->role_id==10)
    {!! Form::hidden('confirmed','') !!}
        {!! Form::checkbox('confirmed', 1, $appoitement->confirmed == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
    @else 
    {!! Form::hidden('confirmed','') !!}
        {!! Form::checkbox('confirmed', 1, $appoitement->confirmed == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger' , 'style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!}  
    @endif  
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if((auth()->user()->role_id==2) || (auth()->user()->role_id==10))
      {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;' )) !!}
      {!! link_to_route(config('quickadmin.route').'.appoitement.index', Cancel, null, array('class' => 'btn btn-default')) !!}
   @else
   {!! link_to_route(config('quickadmin.route').'.appoitement.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 6px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection