@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h4>Create doctor</h5>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>
<div class="container" style="margin-left:140px">
{!! Form::open(array('route' => config('quickadmin.route').'.doctor.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('fullname', 'Full Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('fullname', old('fullname'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('user_id', 'Email*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('user_id', $user, old('user_id'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('country_id', 'Country*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('country_id', $country, old('country_id'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('speciality_id', 'Speciality*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('speciality_id', $speciality, old('speciality_id'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('birthday', 'Birthday', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('birthday', old('birthday'), array('class'=>'form-control datepicker')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('gender', 'Male', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::radio('gender', 'Male', false) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('gender', 'Female', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::radio('gender', 'Female', false) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('codecnam', 'Code Cnam', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('codecnam', old('codecnam'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('matricule', 'Matricule', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('matricule', old('matricule'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, true) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('signaled', 'Signaled', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::hidden('signaled','') !!}
        {!! Form::checkbox('signaled', 1, false) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection