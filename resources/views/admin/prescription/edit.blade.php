@extends('admin.layouts.master')

@section('content')

<div style="margin-left:150px;">
<div class="row">
<div class="col-sm-6 col-sm-offset-2">
@if(auth()->user()->role_id==10)
        <h3 style="margin-left:10px" >Edit Prescription</h3>
       @else
       <h3 style="margin-left:10px" >Prescription Details</h3>
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

{!! Form::model($prescription, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.prescription.update', $prescription->id))) !!}

<div class="form-group">
    {!! Form::label('consultation_id', 'Consultation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('consultation_id', $prescription->consultation_id, array('class'=>'form-control',  readonly)) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('label', 'Label', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::text('label', old('label',$prescription->label), array('class'=>'form-control')) !!}
     @else
     {!! Form::text('label', old('label',$prescription->label), array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
     @endif
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
        {!! Form::textarea('description', old('description',$prescription->description), array('class'=>'form-control', 'rows' => '5')) !!}
      @else
      {!! Form::textarea('description', old('description',$prescription->description), array('class'=>'form-control', 'rows' => '5' ,'style' => 'background-color: #FFFFFF; color: #708090;' , 'readonly')) !!}
     @endif 
    </div>
</div>
<!--
<div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">
        {!! Form::hidden('activated','') !!}
        {!! Form::checkbox('activated', 1, $prescription->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
    </div>
</div>
-->

<div class="table-responsive" style="margin-left:150px">  
                <table class="table" id="dynamic_field" style="width:652px; overflow: hidden;">  
                <tr id="row1" style="border-style:hidden;">  
                       <td style="width:30%;" >  
                       @if(auth()->user()->role_id==10)
                            {!! Form::select('drug_id', $drugselect, $firstdetaisprescription->drug_id, array('class'=>'form-control')) !!} 
                        @else
                        {!! Form::select('drug_id', $drugselect, $firstdetaisprescription->drug_id, array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!} 
                        @endif
                       </td>
                       <td>
                       @if(auth()->user()->role_id==10)
                       {!! Form::text('iddosage1', $firstdetaisprescription->dose, array('class'=>'form-control')) !!}
                       @else
                       {!! Form::text('iddosage1', $firstdetaisprescription->dose, array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
                       @endif
                       </td>
                       <td>
                       @if(auth()->user()->role_id==10)
                       {!! Form::text('idperiode1', $firstdetaisprescription->duration, array('class'=>'form-control')) !!}
                       @else
                       {!! Form::text('idperiode1', $firstdetaisprescription->duration, array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
                       @endif
                       </td>
                        <td style="width:28%;">
                        @if(auth()->user()->role_id==10)
                        <button type="button" name="add" id="add" style="background-color: #2A3F54; color: #FFFFFF;" class="btn">Add More</button>
                        @endif
                        </td>  
                    </tr>  
                @foreach($detailsprescriptions as $dp)
                    <tr id='row{!!$dp->indice!!}' style="border-style:hidden;">  
                       <td style="width:30%;" >  
                       @if(auth()->user()->role_id==10)
                            {!! Form::select('drug_id', $drugselect, $dp->drug_id, array('class'=>'form-control')) !!} 
                       @else
                       {!! Form::select('drug_id', $drugselect, $dp->drug_id, array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!} 
                       @endif
                       </td>
                       <td>
                       @if(auth()->user()->role_id==10)
                       <input  id="iddosage{!!$dp->indice!!}" class="form-control" name="iddosage{!!$dp->indice!!}" value="{!!$dp->dose!!}" />
                       @else
                       <input style="background-color: #FFFFFF; color: #70809;"  id="iddosage{!!$dp->indice!!}" class="form-control" name="iddosage{!!$dp->indice!!}" value="{!!$dp->dose!!}"  readonly/>
                       @endif
                       </td>
                       <td>
                       @if(auth()->user()->role_id==10)
                       <input  id="idperiode{!!$dp->indice!!}" class="form-control" name="idperiode{!!$dp->indice!!}" value="{!!$dp->duration!!}" />
                       @else
                       <input  style="background-color: #FFFFFF; color: #70809;" id="idperiode{!!$dp->indice!!}" class="form-control" name="idperiode{!!$dp->indice!!}" value="{!!$dp->duration!!}" readonly />
                       @endif
                       </td>
                        <td style="width:28%;">
                        @if(auth()->user()->role_id==10)
                        <button type="button" name="remove" id='{!!$dp->indice!!}' class="btn btn-danger btn_remove">X</button>
                        @endif
                        </td>  
                    </tr>  
                @endforeach
                </table>  
            </div>

<div class="form-group" >
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10)
      {!! Form::submit(Update, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
      {!! link_to_route(config('quickadmin.route').'.prescription.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else 
    {!! link_to_route(config('quickadmin.route').'.prescription.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
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
            var source =  {!! json_encode($i) !!};  
            
            i= source;
           
           var tabspecilities = []


      $('#add').click(function(){  
           i++;  
         //  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="sp'+i+'" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
         $('#dynamic_field').append('<tr id="row'+i+'" style="border-style:hidden;" class="dynamic-added"><td style="width:30%;" >{!! Form::select('drug_id', $drugselect, old('drug_id'), array('class'=>'form-control')) !!}</td><td><input  id="iddosage'+i+'" class="form-control" name="iddosage'+i+'" value="" /></td><td><input  id="idperiode'+i+'" class="form-control" name="idperiode'+i+'" value="" /></td><td style="width:28%;" ><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
         console.log("i : "+i);
      });  


      $(document).on('click', '.btn_remove', function(){  
           i--;
           var button_id = $(this).attr("id");   
           $('#row'+button_id).remove();  
           console.log("i : "+i);

      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
           
});
    </script>
@stop