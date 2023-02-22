@extends('admin.layouts.master')

@section('content')
<div class="container" style="margin-left:150px">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
        <h3 style="margin-left:10px">New medical staff</h3>
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

{!! Form::open(array('route' => config('quickadmin.route').'.medicalstaff.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('user_id', 'Email*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('user_id', $user, old('user_id'), array('class'=>'form-control')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('medicalstructure_id', 'Medical Structure*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('medicalstructure_id', $medicalstructure, old('medicalstructure_id'), array('class'=>'form-control','id' => 'medicalstructure_id')) !!}
        
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      {!! Form::submit( Add, array('class' => 'btn btn-primary', 'style' =>'background-color: #2A3F54; color: #FFFFFF;')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection