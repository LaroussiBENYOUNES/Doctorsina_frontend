@extends('admin.layouts.master')

@section('content')

<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id!=12)
        <h3 style="margin-left:10px" >Edit Allergy</h3>
       @else
       <h3 style="margin-left:10px" >Allergy Details</h3>
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

{!! Form::model($allergy, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.allergy.update', $allergy->id))) !!}

<div class="form-group">
    {!! Form::label('alias', 'Alias*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id!=12)
        {!! Form::text('alias', old('alias',$allergy->alias), array('class'=>'form-control')) !!}
     @else  
     {!! Form::text('alias', old('alias',$allergy->alias), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
     @endif         
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id!=12)
        {!! Form::textarea('description', old('description',$allergy->description), array('class'=>'form-control','rows' => '6')) !!}
     @else
     {!! Form::textarea('description', old('description',$allergy->description), array('class'=>'form-control', 'rows' => '6', 'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
     @endif        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id!=12)
      {!! Form::submit(Update, array('class' => 'btn' , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.allergy.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.allergy.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 7px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}

@endsection