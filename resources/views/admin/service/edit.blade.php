@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
<div class="col-sm-6 col-sm-offset-2">
@if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        <h3 style="margin-left:10px">Edit Service</h3>
        @else
        <h3 style="margin-left:10px">Service Details</h3>
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

{!! Form::model($service, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.service.update', $service->id))) !!}

<div class="form-group">
    {!! Form::label('site_id', 'Site*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::select('site_id', $site, old('site_id',$service->site_id), array('class'=>'form-control')) !!}
     @else
     {!! Form::select('site_id', $site, old('site_id',$service->site_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('schedule_id', 'Schedule*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::select('schedule_id', $schedule, old('schedule_id',$service->schedule_id), array('class'=>'form-control')) !!}
     @else
     {!! Form::select('schedule_id', $schedule, old('schedule_id',$service->schedule_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('label', 'Label*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('label', old('label',$service->label), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('label', old('label',$service->label), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
     @endif  
    </div>
</div><div class="form-group">
    {!! Form::label('alias', 'Alias', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('alias', old('alias',$service->alias), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('alias', old('alias',$service->alias), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::textarea('description', old('description',$service->description), array('class'=>'form-control', 'rows' => '5')) !!}
    @else
    {!! Form::textarea('description', old('description',$service->description), array('class'=>'form-control', 'rows' => '5','style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif
    </div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">
    @if(auth()->user()->role_id==1)
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $service->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
     @else
     {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $service->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger' , 'style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!}
    @endif  
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==1)
      {!! Form::submit(Update, array('class' => 'btn' , 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.service.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.service.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 6px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}

@endsection