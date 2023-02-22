@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
<div class="col-sm-6 col-sm-offset-2">
        <h3>New Report</h3><br>

        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => config('quickadmin.route').'.report.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', old('description'), array('class'=>'form-control', 'rows' => '5')) !!}
        
    </div>
</div><br><div class="form-group">
    {!! Form::label('datereport', 'Date Report*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('datereport', old('datereport'), array('class'=>'form-control datepicker')) !!}
        
    </div>
</div><br><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, true, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
        
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
      {!! Form::submit( Add , array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
    </div>
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
