@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
        <h3 style="margin-left:10px" >Edit History Allergy</h3>
       @else
       <h3 style="margin-left:10px" >History Allergy Details</h3>
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

{!! Form::model($historyallergy, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.historyallergy.update', $historyallergy->id))) !!}

<div class="form-group">
    {!! Form::label('user_id', 'Patient*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::select('user_id', $user, old('user_id',$historyactivity->user_id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('allergy_id', 'Allergy*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::select('allergy_id', $allergy, old('allergy_id',$historyallergy->allergy_id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}   
        
    </div>
</div><div class="form-group">
    {!! Form::label('begginningdate', 'Begginning Date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
        {!! Form::text('begginningdate', old('begginningdate',$historyallergy->begginningdate), array('class'=>'form-control datepicker')) !!}
    @else
    {!! Form::text('begginningdate', old('begginningdate',$historyallergy->begginningdate), array('class'=>'form-control datepicker'  ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
    @endif         
    </div>
</div><div class="form-group">
    {!! Form::label('enddate', 'End Date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
        {!! Form::text('enddate', old('enddate',$historyallergy->enddate), array('class'=>'form-control datepicker')) !!}
     @else 
     {!! Form::text('enddate', old('enddate',$historyallergy->enddate), array('class'=>'form-control datepicker' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
     @endif         
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
      {!! Form::submit(Update, array('class' => 'btn'  , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.historyallergy.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.historyallergy.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 7px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection

@section('javascript')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<script>

$(document).ready(function() {
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

</script>
@stop
