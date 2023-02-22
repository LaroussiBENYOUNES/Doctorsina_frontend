@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        <h3 style="margin-left:10px">Edit Medical Structure</h1>
    @else
    <h3 style="margin-left:10px">Medical Structure Details</h1>
        <br>
    @endif
        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($medicalstructure, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.medicalstructure.update', $medicalstructure->id))) !!}

<div class="form-group">
    {!! Form::label('label', 'Label*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
    {!! Form::text('label', old('label',$medicalstructure->label), array('class'=>'form-control')) !!}
    @else
    {!! Form::text('label', old('label',$medicalstructure->label), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif
    </div>
</div><div class="form-group">
    {!! Form::label('alias', 'Alias', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::text('alias', old('alias',$medicalstructure->alias), array('class'=>'form-control')) !!}
    @else
    {!! Form::text('alias', old('alias',$medicalstructure->alias), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::textarea('description', old('description',$medicalstructure->description), array('class'=>'form-control', 'rows' => '5')) !!}
    @else
    {!! Form::textarea('description', old('description',$medicalstructure->description), array('class'=>'form-control', 'rows' => '5' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('country_id', 'Country', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::select('country_id', $country, old('country_id', $medicalstructure->country_id), array('class'=>'form-control')) !!}
     @else
     {!! Form::select('country_id', $country, old('country_id', $medicalstructure->country_id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
 @endif
    </div>
    </div>
<div class="form-group">
    {!! Form::label('structuretype_id', 'Structure Type *', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
        {!! Form::select('structuretype_id', $structuretype, old('structuretype_id',$medicalstructure->structuretype_id), array('class'=>'form-control')) !!}
      @else  
      {!! Form::select('structuretype_id', $structuretype, old('structuretype_id',$medicalstructure->structuretype_id), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    @endif
    </div>
</div>


@if((auth()->user()->role_id)==1)
<div class="form-group">
    {!! Form::label('signaled', 'Signaled', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">
        {!! Form::hidden('signaled','') !!}
        {!! Form::checkbox('signaled', 1, $medicalstructure->signaled == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">
        {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $medicalstructure->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
        
    </div>
</div>
@endif

<div class="table-responsive" style="margin-left:150px">  
                <table class="table" id="dynamic_field" style="width:600px;">  
                <tr id="row1" style="border-style:hidden;">  
                       <!-- <td><input type="text" name="name[]" id="sp1" placeholder="Enter your Name" class="form-control name_list" /></td>  -->
                       <td style="width:75%;" >  
                       @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
                            {!! Form::select('speciality_id', $specialitiesselect, $firstsp->id, array('class'=>'form-control')) !!} 
                        @else
                        {!! Form::select('speciality_id', $specialitiesselect, $firstsp->id, array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!} 
                        @endif
                       </td>
                        <td style="width:25%;">
                        @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
                        <button type="button" name="add" id="add" style="background-color: #2A3F54; color: #FFFFFF;" class="btn">Add More</button>
                        @endif
                        </td>  
                    </tr>  
                @foreach($speciality as $sp)
                    <tr id='row{!!$sp->indice!!}' style="border-style:hidden;">  
                       <!-- <td><input type="text" name="name[]" id="sp1" placeholder="Enter your Name" class="form-control name_list" /></td>  -->
                       <td style="width:75%;" >  
                       @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
                            {!! Form::select('speciality_id', $specialitiesselect, $sp->id, array('class'=>'form-control')) !!} 
                       @else
                       {!! Form::select('speciality_id', $specialitiesselect, $sp->id, array('class'=>'form-control'  ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!} 
                        @endif
                       </td>
                        <td style="width:25%;">
                        @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
                        <button type="button" name="remove" id='{!!$sp->indice!!}' class="btn btn-danger btn_remove">X</button>
                        @endif
                        </td>  
                    </tr>  
                @endforeach
                </table>  
            </div>


<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
    @if((auth()->user()->role_id==1)||(auth()->user()->role_id==12))
      {!! Form::submit(Update, array('class' => 'btn', 'style' =>'background-color: #2A3F54; color: #FFFFFF; margin-left: 6px')) !!}
      {!! link_to_route(config('quickadmin.route').'.medicalstructure.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.medicalstructure.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 6px')) !!}
  @endif
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection

@section('javascript')
<script>

  var i=1;  
        $(document).ready(function () {
            var postURL = "<?php echo url('addmore'); ?>";
            var source =  {!! json_encode($speciality) !!};  
            i=1 + source.length;
      var tabspecilities = []


      $('#add').click(function(){  
           i++;  
         //  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="sp'+i+'" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
         $('#dynamic_field').append('<tr id="row'+i+'" style="border-style:hidden;" class="dynamic-added"><td style="width:75%;" >{!! Form::select('speciality_id', $specialitiesselect, old('speciality_id'), array('class'=>'form-control')) !!}</td><td style="width:25%;" ><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           i--;
           var button_id = $(this).attr("id");   
           $('#row'+button_id).remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });



    })

</script>

@stop