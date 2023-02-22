@extends('admin.layouts.master')

@section('content')

<div style="margin-left:150px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
        <h3 style="margin-left:10px" >Edit Gastrology Exam</h3>
       @else
       <h3 style="margin-left:10px" >Gastrology Exam Details</h3>
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

{!! Form::model($gastrologyexam, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.gastrologyexam.update', $gastrologyexam->id))) !!}

<div class="form-group">
    {!! Form::label('way', 'Way', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('way', old('way',$gastrologyexam->way), array('class'=>'form-control')) !!}
    @else
    {!! Form::text('way', old('way',$gastrologyexam->way), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
    @endif

    </div>
</div><div class="form-group">
    {!! Form::label('gastroscopy', 'Gastroscopy', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('gastroscopy', old('gastroscopy',$gastrologyexam->gastroscopy), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('gastroscopy', old('gastroscopy',$gastrologyexam->gastroscopy), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
     @endif

    </div>
</div><div class="form-group">
    {!! Form::label('colonoscopy', 'Colonoscopy', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('colonoscopy', old('colonoscopy',$gastrologyexam->colonoscopy), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('colonoscopy', old('colonoscopy',$gastrologyexam->colonoscopy), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('consultation_id', 'Consultation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('consultation_id', old('consultation_id',$gastrologyexam->consultation_id), array('class'=>'form-control', readonly)) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
    {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.gastrologyexam.index', Cancel, null, array('class' => 'btn btn-default')) !!}    </div>
   @else
    {!! link_to_route(config('quickadmin.route').'.gastrologyexam.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}

@endsection