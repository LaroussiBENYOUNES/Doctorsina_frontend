@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">

<div class="row">
<div class="col-sm-6 col-sm-offset-2">
        <h3 style="margin-left:10px">New Visit Type</h3><br>

        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => config('quickadmin.route').'.visittype.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('alias', 'Alias*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('alias', old('alias'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', old('description'), array('class'=>'form-control', 'rows' => '5')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, true, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      {!! Form::submit( Add , array('class' => 'btn' , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection