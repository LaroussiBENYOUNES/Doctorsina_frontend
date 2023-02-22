@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    <h3 style="margin-left:10px">New History Activity</h3>
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

{!! Form::open(array('route' => config('quickadmin.route').'.historyactivity.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('user_id', 'User*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::select('user_id', $user, old('user_id'), array('class'=>'form-control')) !!}
     @else
     {!! Form::select('user_id',$user, old('user_id', auth()->user()->id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('activity_id', 'Activity*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('activity_id', $activity, old('activity_id'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('begginningdate', 'Begginning date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('begginningdate', old('begginningdate'), array('class'=>'form-control datepicker')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('enddate', 'End Date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('enddate', old('enddate'), array('class'=>'form-control datepicker')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('place', 'Place', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('place', old('place'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      {!! Form::submit( Add , array('class' => 'btn' , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
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