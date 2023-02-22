@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
        <h3 style="margin-left:50px">Edit doctor</h3><br>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($doctor, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.doctor.update', $doctor->id))) !!}
<div class="container" style="margin-left:140px">
<div class="form-group">
    {!! Form::label('fullname', 'Full Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('fullname', old('fullname',$doctor->fullname), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('user_id', 'Email*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('user_id', $user, old('user_id',$doctor->user_id), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('country_id', 'Country*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('country_id', $country, old('country_id',$doctor->country_id), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('speciality_id', 'Speciality*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('speciality_id', $speciality, old('speciality_id',$doctor->speciality_id), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('birthday', 'Birthday', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('birthday', old('birthday',$doctor->birthday), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('gender', 'Gender', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('gender', old('gender',$doctor->gender), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div>

<div class="form-group">
    {!! Form::label('matricule', 'Matricule', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('matricule', old('matricule',$doctor->matricule), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $doctor->activated == 1) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('signaled', 'Signaled', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::hidden('signaled','') !!}
        {!! Form::checkbox('signaled', 1, $doctor->signaled == 1) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.doctor.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>
</div>
{!! Form::close() !!}

@endsection