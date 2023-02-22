@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
<div class="col-sm-6 col-sm-offset-2">
@if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        <h3 style="margin-left:10px">Edit Schedule</h3><br>
@else
<h3 style="margin-left:10px">Schedule Details</h3><br>
@endif
        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($schedule, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.schedule.update', $schedule->id))) !!}

<div class="form-group">
    {!! Form::label('monday', 'Monday*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('monday', old('monday',$schedule->monday), array('class'=>'form-control')) !!}
      @else
      {!! Form::text('monday', old('monday',$schedule->monday), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
      @endif  
    </div>
</div><div class="form-group">
    {!! Form::label('tuesday', 'Tuesday*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('tuesday', old('tuesday',$schedule->tuesday), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('tuesday', old('tuesday',$schedule->tuesday), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
@endif 
    </div>
</div><div class="form-group">
    {!! Form::label('wednesday', 'Wednesday*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('wednesday', old('wednesday',$schedule->wednesday), array('class'=>'form-control')) !!}
      @else  
      {!! Form::text('wednesday', old('wednesday',$schedule->wednesday), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
      @endif 
    </div>
</div><div class="form-group">
    {!! Form::label('thursday', 'Thursday*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('thursday', old('thursday',$schedule->thursday), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('thursday', old('thursday',$schedule->thursday), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('friday', 'Friday*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('friday', old('friday',$schedule->friday), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('friday', old('friday',$schedule->friday), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
@endif
    </div>
</div><div class="form-group">
    {!! Form::label('saturday', 'Saturday*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('saturday', old('saturday',$schedule->saturday), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('saturday', old('saturday',$schedule->saturday), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
@endif 
    </div>
</div><div class="form-group">
    {!! Form::label('sunday', 'Sunday*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('sunday', old('sunday',$schedule->sunday), array('class'=>'form-control')) !!}
      @else
      {!! Form::text('sunday', old('sunday',$schedule->sunday), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
      @endif 
    </div>
</div><div class="form-group">
    {!! Form::label('label', 'Label*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('label', old('label',$schedule->label), array('class'=>'form-control')) !!}
      @else 
      {!! Form::text('label', old('label',$schedule->label), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
      @endif 
    </div>
</div><div class="form-group">
    {!! Form::label('alias', 'Alias', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('alias', old('alias',$schedule->alias), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('alias', old('alias',$schedule->alias), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::textarea('description', old('description',$schedule->description), array('class'=>'form-control', 'rows' => '5')) !!}
    @else
    {!! Form::textarea('description', old('description',$schedule->description), array('class'=>'form-control', 'rows' => '5','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif

    </div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">
    @if(auth()->user()->role_id==1)
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $schedule->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
     @else
     {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $schedule->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger' , 'style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!}
    @endif   
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
      {!! Form::submit(Update, array('class' => 'btn'  , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.schedule.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.schedule.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 6px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}

@endsection