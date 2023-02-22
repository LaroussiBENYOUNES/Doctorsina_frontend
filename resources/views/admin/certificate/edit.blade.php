@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">

<div class="row">
<div class="col-sm-6 col-sm-offset-2">
@if(auth()->user()->role_id==10)
        <h3 style="margin-left:10px" >Edit Certificate</h3>
       @else
       <h3 style="margin-left:10px" >Certificate Details</h3>
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

{!! Form::model($certificate, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.certificate.update', $certificate->id))) !!}

<div class="form-group">
    {!! Form::label('consultation_id', 'Consultation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::select('consultation_id', $consultation, old('consultation_id',$certificate->consultation_id), array('class'=>'form-control')) !!}
     @else 
     {!! Form::select('consultation_id', $consultation, old('consultation_id',$certificate->consultation_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}
     @endif  
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::textarea('description', old('description',$certificate->description), array('class'=>'form-control', 'rows' => '5')) !!}
     @else  
     {!! Form::textarea('description', old('description',$certificate->description), array('class'=>'form-control', 'rows' => '5','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
     @endif  
    </div>
</div>
<!--<div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $certificate->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
        
    </div>
</div>
-->
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
      {!! Form::submit(Update, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.certificate.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.certificate.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 7px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}

@endsection