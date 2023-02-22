@extends('admin.layouts.master')

@section('content')

<div style="margin-left:150px;">
<div class="row">
<div class="col-sm-6 col-sm-offset-2">
@if(auth()->user()->role_id==10)
        <h3 style="margin-left:10px" >Edit Consultation</h3>
       @else
       <h3 style="margin-left:10px" >Consultation Details</h3>
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

{!! Form::model($consultation, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.consultation.update', $consultation->id))) !!}

<div class="form-group">
    {!! Form::label('appoitement_id', 'appoitement*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('appoitement_id', old('appoitement_id',$consultation->appoitement_id), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF; color: #708090;','readonly')) !!}
    </div>
</div>
<!--<div class="form-group">
  {!! Form::label('report_id', 'report*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
    {!! Form::select('report_id', $report, old('report_id',$consultation->report_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;')) !!}     
    @else
    {!! Form::select('report_id', $report, old('report_id',$consultation->report_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;' , 'disabled')) !!}     
    @endif
    </div>
</div>-->

<div class="form-group">
{!! Form::label('visitnature_id', 'VisitNature', array('class'=>'col-sm-2 control-label')) !!}
<div class="col-sm-6">
@if(auth()->user()->role_id==10)
    {!! Form::select('visitnature_id', $visitnature, old('visitnature_id',$consultation->visitnature_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;')) !!}
    @else
    {!! Form::select('visitnature_id', $visitnature, old('visitnature_id',$consultation->visitnature_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;', 'disabled')) !!}
    @endif
    </div>
</div>
<div class="form-group">
{!! Form::label('visitstatus_id', 'VisitStatus', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
    {!! Form::select('visitstatus_id', $visitstatus, old('visitstatus_id',$consultation->visitstatus_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;')) !!}
    @else
    {!! Form::select('visitstatus_id', $visitstatus, old('visitstatus_id',$consultation->visitstatus_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;', 'disabled')) !!}
    @endif
    </div>
    </div>
    <div class="form-group">
    {!! Form::label('visittype_id', 'VisitType', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    @if(auth()->user()->role_id==10)
    {!! Form::select('visittype_id', $visittype, old('visittype_id',$consulatation->visittype_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;')) !!}
    @else
    {!! Form::select('visittype_id', $visittype, old('visittype_id',$consulatation->visittype_id), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;', 'disabled')) !!}
    @endif
    </div>
    </div>
<div class="form-group">
    {!! Form::label('date', 'Date', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('date', old('date',$consultation->date), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF; color: #708090;', 'readonly')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('time', 'Time', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('time', old('date',$consultation->time), array('class'=>'form-control', 'style' => 'background-color: #FFFFFF; color: #708090;', 'readonly')) !!}
    </div>
</div>
<br>
<div class="table-responsive" style="margin-left:155px">  
                <table class="table" id="dynamic_field" style="width:645px; overflow: hidden;">  
                <tr id="row1" style="border-style:hidden;">  
                       <td style="width:30%;" >  
                       @if(auth()->user()->role_id==10)

                            {!! Form::select('question_id', $questionselect, $firstresponse->question_id, array('class'=>'form-control')) !!} 
                      @else
                      {!! Form::select('question_id', $questionselect, $firstresponse->question_id, array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!} 
                      @endif
                       </td>
                       <td>
                       @if(auth()->user()->role_id==10)
                       {!! Form::textarea('patient_response1', $firstresponse->patient_response, array('class'=>'form-control', 'rows' => '2')) !!}
                       @else
                       {!! Form::textarea('patient_response1', $firstresponse->patient_response, array('class'=>'form-control' ,'style' => 'background-color: #FFFFFF; color: #708090;','readonly', 'rows' => '2')) !!}
                       @endif
                       </td>
                       @if(auth()->user()->role_id==10)
                        <td style="width:28%;"><button type="button" name="add" id="add" style="background-color: #2A3F54; color: #FFFFFF;" class="btn">Add More</button></td>  
                            @endif
                    </tr>  
                @foreach($responses as $dp)
                    <tr id='row{!!$dp->indice!!}' style="border-style:hidden;">  
                       <td style="width:30%;" > 
                       @if(auth()->user()->role_id==10) 
                            {!! Form::select('question_id', $questionselect, $dp->question_id, array('class'=>'form-control')) !!} 
                      @else
                      {!! Form::select('question_id', $questionselect, $dp->question_id, array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;','disabled')) !!} 
                      @endif
                       </td>
                       <td>
                       @if(auth()->user()->role_id==10) 
                       <textarea  id="patientresponse{!!$dp->indice!!}" class="form-control" name="patient_response{!!$dp->indice!!}">{!!$dp->patient_response!!}</textarea>
                       @else
                       <textarea  id="patientresponse{!!$dp->indice!!}" class="form-control" name="patient_response{!!$dp->indice!!}" readonly>{!!$dp->patient_response!!}</textarea>
                       @endif
                       </td>
                       @if(auth()->user()->role_id==10) 
                        <td style="width:28%;"><button type="button" name="remove" id='{!!$dp->indice!!}' class="btn btn-danger btn_remove">X</button></td>  
                        @endif
                    </tr>  
                @endforeach
                </table>  
            </div>
            
<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    @if(auth()->user()->role_id==10) 
      {!! Form::submit(Update, array('class' => 'btn' ,  'style' => 'background-color: #2A3F54; color: #FFFFFF;margin-left: 7px')) !!}
      {!! link_to_route(config('quickadmin.route').'.consultation.index', Cancel, null, array('class' => 'btn btn-default')) !!}
    @else
    {!! link_to_route(config('quickadmin.route').'.consultation.index', 'Go back', null, array('class' => 'btn',  'style' => 'background-color: #2A3F54; color: #FFFFFF; margin-left: 7px')) !!}
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
         $('#dynamic_field').append('<tr id="row'+i+'" style="border-style:hidden;" class="dynamic-added"><td style="width:30%;" >{!! Form::select('question_id', $questionselect, old('question_id'), array('class'=>'form-control')) !!}</td><td><textarea  id="patient_response'+i+'" name="patient_response'+i+'" class="form-control" value="" /></textarea></td><td style="width:28%;" ><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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