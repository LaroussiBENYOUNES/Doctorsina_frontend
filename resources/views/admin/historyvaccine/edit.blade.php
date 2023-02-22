@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
        <h3 style="margin-left:10px" >Edit History Vaccine</h3>
       @else
       <h3 style="margin-left:10px" >History Vaccine Details</h3>
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

{!! Form::model($historyvaccine, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.historyvaccine.update', $historyvaccine->id))) !!}

<div class="form-group">
    {!! Form::label('user_id', 'Patient*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::select('user_id', $user, old('user_id',$historyvaccine->user_id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('vaccine_id', 'Vaccine*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('vaccine_id', $vaccine, old('vaccine_id',$historyvaccine->vaccine_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('datevaccin', 'Date*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('datevaccin', old('datevaccin',$historyvaccine->datevaccin), array('class'=>'form-control datepicker')) !!}
     @else
     {!! Form::text('datevaccin', old('datevaccin',$historyvaccine->datevaccin), array('class'=>'form-control datepicker','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('nbr', 'Number*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('nbr', old('nbr',$historyvaccine->nbr), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('nbr', old('nbr',$historyvaccine->nbr), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'readonly')) !!}
     @endif  
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
      {!! Form::submit(Update, array('class' => 'btn'  , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.historyvaccine.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.historyvaccine.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 7px')) !!}
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
