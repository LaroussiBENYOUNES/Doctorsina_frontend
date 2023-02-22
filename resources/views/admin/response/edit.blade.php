@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">

<div class="row">
<div class="col-sm-6 col-sm-offset-2">
        <h3>Edit</h3><br>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($response, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.response.update', $response->id))) !!}

<div class="form-group">
    {!! Form::label('question_id', 'Question*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('question_id', $question, old('question_id',$response->question_id), array('class'=>'form-control' , 'style' => 'background-color: #FFFFFF; color: #708090;', 'readonly')) !!}
        
    </div>
</div><br><div class="form-group">
    {!! Form::label('consultation_id', 'ID Consultation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('consultation_id', $consultation, old('consultation_id',$response->consultation_id), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF; color: #708090;', 'readonly')) !!}
        
    </div>
</div><br><div class="form-group">
    {!! Form::label('patient_response', 'Response*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::textarea('patient_response', old('patient_response',$response->patient_response), array('class'=>'form-control', 'rows' => '5')) !!}
        
    </div>
</div><!--<div class="form-group">
    {!! Form::label('accepted', 'Accepted', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::hidden('accepted','') !!}
        {!! Form::checkbox('accepted', 1, $response->accepted == 1) !!}
        
    </div>
</div>-->

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(Update, array('class' => 'btn' ,  'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.response.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection