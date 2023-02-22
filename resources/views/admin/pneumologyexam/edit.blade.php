@extends('admin.layouts.master')

@section('content')

<div style="margin-left:150px;">
<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
        <h3 style="margin-left:10px" >Edit Pneumology Exam</h3>
       @else
       <h3 style="margin-left:10px" >Pneumology Exam Details</h3>
       @endif
        <br>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($pneumologyexam, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.pneumologyexam.update', $pneumologyexam->id))) !!}

<div class="form-group">
    {!! Form::label('dyspne', 'Dyspne', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('dyspne', old('dyspne',$pneumologyexam->dyspne), array('class'=>'form-control')) !!}
        @else
        {!! Form::text('dyspne', old('dyspne',$pneumologyexam->dyspne), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
    @endif   
    </div>
</div><div class="form-group">
    {!! Form::label('toux', 'Toux', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('toux', old('toux',$pneumologyexam->toux), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('toux', old('toux',$pneumologyexam->toux), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('hoqqet', 'Hoqqet', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('hoqqet', old('hoqqet',$pneumologyexam->hoqqet), array('class'=>'form-control')) !!}
      @else
      {!! Form::text('hoqqet', old('hoqqet',$pneumologyexam->hoqqet), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
      @endif
    </div>
</div><div class="form-group">
    {!! Form::label('consultation_id', 'Consultation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('consultation_id', old('consultation_id',$pneumologyexam->consultation_id), array('class'=>'form-control', readonly)) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
    {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.pneumologyexam.index', Cancel, null, array('class' => 'btn btn-default')) !!}    </div>
   @else
    {!! link_to_route(config('quickadmin.route').'.pneumologyexam.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
  @endif
  </div>
</div>

{!! Form::close() !!}

@endsection