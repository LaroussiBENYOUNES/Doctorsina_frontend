@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($patient, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.patient.update', $patient->id))) !!}
<div class="container" style="margin-left:140px">
<div class="form-group">
    {!! Form::label('fullname', 'Full Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('fullname', old('fullname',$patient->fullname), array('class'=>'form-control','style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('user_id', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('user_id', $user, old('user_id',$patient->user_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('birthday', 'Birthday', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('birthday', old('birthday',$patient->birthday), array('class'=>'form-control','style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('gender', 'Gender', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('gender', old('gender',$patient->gender), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('identitymatricule', 'Matricule', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('identitymatricule', old('identitymatricule',$patient->identitymatricule), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('passport', 'Passport', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('passport', old('passport',$patient->passport), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF', readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $patient->activated == 1) !!}
        
    </div>
</div><!--<div class="form-group">
    {!! Form::label('authorize', 'Authorize', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::hidden('authorize','') !!}
        {!! Form::checkbox('authorize', 1, $patient->authorize == 1) !!}
        
    </div>
</div>--><div class="form-group">
    {!! Form::label('signaled', 'SIgnaled', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::hidden('signaled','') !!}
        {!! Form::checkbox('signaled', 1, $patient->signaled == 1) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.patient.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection