

@extends('admin.layouts.master')

@section('content')

<?php
$url = url()->full();
$pos = strpos($url, "?");
$idappoitement = substr($url, $pos+1);
$idappoitement = (int)$idappoitement;

?>


<div style="margin-left:150px; margin-top:30px;">
<h4 style="margin-left:5px">Liste Appoitement</h4><br>
@if ($appoitement->count())
   
        <div class="x_content" style="width:83%;  overflow: hidden; overflow-y:auto; max-height:250px;">
            <table class="table table-striped responsive-utilities jambo_table" id="datatable">
                <thead>
                    <tr class="headings">
                        <th>
                            ID
                        </th>
                        <th>Medical Structure</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Confirmed</th>

                      
                    </tr>
                </thead>

                <tbody>
                    @foreach ($appoitement as $row)
                        <tr>
                            <td>
                                {{$row->id}}
                            </td>
                            <td>{{ isset($row->medicalstructure->label) ? $row->medicalstructure->label : '' }}</td>
<td>{{ isset($row->patient->fullname) ? $row->patient->fullname : '' }}</td>
<td>{{ isset($row->doctor->fullname) ? $row->doctor->fullname : '' }}</td>
<td>{{ $row->date }}</td>
<td>{{ $row->time }}</td>
<td>{!! Form::checkbox('confirmed', 1, $row->confirmed == 1, array('class'=>'marg5','data-toggle'=>'toggle','disabled ','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}</td>

                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
	
    @endif
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
    <br><br>
        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div><br>
<h4>New Consultation</h4><br>
{!! Form::open(array('route' => config('quickadmin.route').'.consultation.store', null, 'class' => 'form-horizontal')) !!}

    
<div class="container">
  <div class="row">
    <div class="col-sm-5">
    <label style="margin-left:3px"> ID appoitement </label>
    {!! Form::select('appoitement_id', $appoitementselect, old('appoitement_id',$idappoitement), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;margin-top:20px;')) !!}
    <br>
    </div>
    <!--
    <div class="col-sm-5">
    <label style="margin-left:3px"> ID report </label>
    {!! Form::select('report_id', $report, old('report_id',$report), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;margin-top:20px;')) !!}
    <br>
    </div>-->
    <div class="col-sm-5">
    <label style="margin-left:3px"> ID visitnature </label>
    {!! Form::select('visitnature_id', $visitnature, old('visitnature_id',$visitnature), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;margin-top:20px;')) !!}
    <br>
    </div>
    <div class="col-sm-5">
    <label style="margin-left:3px"> ID visitstatus </label>
    {!! Form::select('visitstatus_id', $visitstatus, old('visitstatus_id',$visitstatus), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;margin-top:20px;')) !!}
    <br>
    </div>
    <div class="col-sm-5">
    <label style="margin-left:3px"> ID visittype </label>
    {!! Form::select('visittype_id', $visittype, old('visittype_id',$visittype), array('class'=>'form-control','style' => 'background-color: #FFFFFF; color: #708090;margin-left:2px;margin-top:20px;')) !!}
    <br>
    </div>
    <div class="col-sm-12"><br>

    <div class="table-responsive">  
                <table class="table" id="dynamic_field" style="width:900px; overflow: hidden;">  
                    <tr id="row1" style="border-style:hidden;">  
                       <!-- <td><input type="text" name="name[]" id="sp1" placeholder="Enter your Name" class="form-control name_list" /></td>  -->
                       <td style="width:30%;" >  
                            {!! Form::select('question_id', $question, old('question_id'), array('class'=>'form-control')) !!} 
                       </td>
                       <td>
                       {!! Form::textarea('patient_response1', null, array('class'=>'form-control', 'rows' => '2')) !!}
                       </td>
                     
                        <td style="width:28%;"><button type="button" name="add" id="add" style="background-color: #2A3F54; color: #FFFFFF; margin-left:15px" class="btn">Add More</button></td>  
                    </tr>  
                </table>  
            </div>
            </div>
    <div class="col-sm-8"><br>
    {!! Form::submit( Add , array('class' => 'btn btn-primary', 'style' => 'margin-top:25px;background-color: #2A3F54; color: #FFFFFF; margin-left:680px; width:100px;')) !!}
    </div>
  </div>
</div>
</div>


{!! Form::close() !!}
</div>
@endsection

@section('javascript')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<script>
  $(document).ready(function() {
    var i=1;  

    $('#add').click(function(){  
           i++;  
         //  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="sp'+i+'" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
         $('#dynamic_field').append('<tr id="row'+i+'" style="border-style:hidden;" class="dynamic-added"><td style="width:30%;" >{!! Form::select('question_id', $question, old('question_id'), array('class'=>'form-control')) !!}</td><td><textarea  id="patient_response'+i+'" name="patient_response'+i+'" class="form-control" value="" /></textarea></td><td style="width:28%;" ><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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


        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

</script>

@stop