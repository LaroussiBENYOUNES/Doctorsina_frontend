@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
        <h3 style="margin-left:10px" >Edit History Attitude</h3>
       @else
       <h3 style="margin-left:10px" >History Attitude Details</h3>
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

{!! Form::model($historyattitude, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.historyattitude.update', $historyattitude->id))) !!}

<div class="form-group">
    {!! Form::label('user_id', 'User*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
      {!! Form::select('user_id', $user, old('user_id',$historyattitude->user_id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}
    </div>
</div><div class="form-group">
    {!! Form::label('attitude_id', 'Attitude*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
     {!! Form::select('attitude_id', $attitude, old('attitude_id',$historyattitude->attitude_id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}
    </div>
</div><div class="form-group">
    {!! Form::label('begginningdate', 'Begginning Date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
        {!! Form::text('begginningdate', old('begginningdate',$historyattitude->begginningdate), array('class'=>'form-control datepicker')) !!}
      @else 
      {!! Form::text('begginningdate', old('begginningdate',$historyattitude->begginningdate), array('class'=>'form-control datepicker'  ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
      @endif 
    </div>
</div><div class="form-group">
    {!! Form::label('enddate', 'End Date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
        {!! Form::text('enddate', old('enddate',$historyattitude->enddate), array('class'=>'form-control datepicker')) !!}
     @else
     {!! Form::text('enddate', old('enddate',$historyattitude->enddate), array('class'=>'form-control datepicker' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
     @endif
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if((auth()->user()->role_id==10) || (auth()->user()->role_id==2))
    {!! Form::submit(Update, array('class' => 'btn' , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.historyattitude.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.historyattitude.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 7px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}

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
