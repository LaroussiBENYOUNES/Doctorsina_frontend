@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
<div class="col-sm-6 col-sm-offset-2">
        <h3>Edit Report</h3><br>

        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($report, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.report.update', $report->id))) !!}

<div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', old('description',$report->description), array('class'=>'form-control', 'rows' => '5')) !!}
        
    </div>
</div><br><div class="form-group">
    {!! Form::label('datereport', 'Date Report*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('datereport', old('datereport',$report->datereport), array('class'=>'form-control datepicker')) !!}
        
    </div>
</div><br><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $report->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
        
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.report.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection