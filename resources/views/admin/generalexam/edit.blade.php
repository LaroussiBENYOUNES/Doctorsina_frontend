@extends('admin.layouts.master')

@section('content')

<div style="margin-left:150px;">
<div class="row">
<div class="col-sm-6 col-sm-offset-2">
@if(auth()->user()->role_id==10)
        <h3 style="margin-left:10px" >Edit General Exam</h3>
       @else
       <h3 style="margin-left:10px" >General Exam Details</h3>
       @endif
        <br>
        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
        </div>
</div>

{!! Form::model($generalexam, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.generalexam.update', $generalexam->id))) !!}
<div class="form-group">
    {!! Form::label('weight', 'Wheight', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
    {!! Form::text('weight', old('weight',$generalexam->weight), array('class'=>'form-control')) !!}
  @else
  {!! Form::text('weight', old('weight',$generalexam->weight), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
  @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('size', 'Size', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
    {!! Form::text('size', old('size',$generalexam->size), array('class'=>'form-control')) !!}
  @else
  {!! Form::text('size', old('size',$generalexam->size), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
  @endif
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('fever', 'Fever', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
    {!! Form::text('fever', old('fever',$generalexam->fever), array('class'=>'form-control')) !!}
  @else
  {!! Form::text('fever', old('fever',$generalexam->fever), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
  @endif
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('consultation_id', 'Consultation', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('consultation_id', old('consultation_id',$generalexam->consultation_id), array('class'=>'form-control', readonly)) !!}

    </div>
</div>
 

<div class="form-group" >
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
    {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.generalexam.index', Cancel, null, array('class' => 'btn btn-default')) !!}    </div>
   @else
    {!! link_to_route(config('quickadmin.route').'.generalexam.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection