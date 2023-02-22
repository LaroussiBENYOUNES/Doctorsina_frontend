@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">

<div class="row">
<div class="col-sm-6 col-sm-offset-2">
@if(auth()->user()->role_id==1)
        <h3 style="margin-left:10px">Edit Zone</h3><br>
    @else
    <h3 style="margin-left:10px">Zone Details</h3><br>
@endif

        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
        	</div>
        @endif
    </div>
</div>

{!! Form::model($zone, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.zone.update', $zone->id))) !!}
<div class="form-group">
    {!! Form::label('alias', 'Alias*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==1)
        {!! Form::text('alias', old('alias',$zone->alias), array('class'=>'form-control')) !!}
    @else
        {!! Form::text('alias', old('alias',$zone->alias), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif
    </div>
</div><br><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==1)
        {!! Form::textarea('description', old('description',$zone->description), array('class'=>'form-control', 'rows'=>'5')) !!}
    @else
    {!! Form::textarea('description', old('description',$zone->description), array('class'=>'form-control', 'rows'=>'5' , 'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif
    </div>
</div><br><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6"  style="margin-left:5px; margin-top:5px">
    @if(auth()->user()->role_id==1)
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $zone->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
    @else 
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $zone->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger' , 'style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!}
    @endif
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==1)
      {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.zone.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.zone.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
    @endif
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection