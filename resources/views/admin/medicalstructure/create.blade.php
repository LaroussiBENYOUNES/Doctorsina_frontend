@extends('admin.layouts.master')

@section('content')
<div style="margin-left:180px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
        <h3 style="margin-left:10px">New Medical Structure</h1>
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

{!! Form::open(array('route' => config('quickadmin.route').'.medicalstructure.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}
<div class="form-group">
    {!! Form::label('label', 'Label*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('label', old('label'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('alias', 'Alias', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('alias', old('alias'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', old('description'), array('class'=>'form-control', 'rows' => '5')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('country_id', 'Country', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('country_id', $country, old('country_id'), array('class'=>'form-control')) !!}
        
    </div>
    </div>

<div class="form-group">
    {!! Form::label('structuretype_id', 'Structure Type', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::select('structuretype_id', $structuretype, old('structuretype_id'), array('class'=>'form-control')) !!}
        
    </div>
    </div>

    @if((auth()->user()->role_id)==1)
<div class="form-group">

    {!! Form::label('signaled', 'Signaled', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">

    {!! Form::hidden('signaled','') !!}
    {!! Form::checkbox('signaled', 1, false, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}   
</div>
</div><div class="form-group">
    {!! Form::label('activated', 'Activated', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6" style="margin-left:5px; margin-top:5px">

  {!! Form::hidden('activated','') !!}
     {!! Form::checkbox('activated', 1, true, array('class'=>'marg5','data-toggle'=>'toggle','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}
</div></div>
@endif
            <div class="table-responsive" style="margin-left:150px">  
                <table class="table" id="dynamic_field" style="width:600px;">  
                    <tr id="row1" style="border-style:hidden;">  
                       <!-- <td><input type="text" name="name[]" id="sp1" placeholder="Enter your Name" class="form-control name_list" /></td>  -->
                       <td style="width:75%;" >  
                            {!! Form::select('speciality_id', $speciality, old('speciality_id'), array('class'=>'form-control')) !!} 
                       </td>
                        <td style="width:25%;"><button type="button" name="add" id="add" style="background-color: #2A3F54; color: #FFFFFF;" class="btn">Add More</button></td>  
                    </tr>  
                </table>  
            </div>
           
          
            <div style="margin-left:160px">
  {!! Form::submit( Add , array('class' => 'btn', 'style' =>'background-color: #2A3F54; color: #FFFFFF;')) !!}  
</div>
<!--    <input id="showcategory" type="number" min="0" value="1" >
 <input value="1" type="number" onchange="return showcategory();"> 
   
    {!! Form::text('alias',$i, array('id'=>'sp0')) !!}-->
   

</div>



{!! Form::close() !!}
</div>
@endsection

@section('javascript')
    <script>
  function showProduct() {
    console.log("hiii")
  }
  var i=1;  
        $(document).ready(function () {
            var postURL = "<?php echo url('addmore'); ?>";
      i=1;  
      var tabspecilities = []


      $('#add').click(function(){  
           i++;  
         //  $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="sp'+i+'" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
         $('#dynamic_field').append('<tr id="row'+i+'" style="border-style:hidden;" class="dynamic-added"><td style="width:75%;" >{!! Form::select('speciality_id', $speciality, old('speciality_id'), array('class'=>'form-control')) !!}</td><td style="width:25%;" ><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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

      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
            $('#addspeciality').click(function (e) {
                document.getElementById("myText").value = "Johnny Bravo";

                {{$var++}};
                console.log("test",{{$var}});
                e.preventDefault()  // prevent the form from 'submitting'
            });

            $('#showcategory').keyup(function (e) {
                var numberSpecialies = document.getElementById("showcategory").value

                for(var i=0; i < numberSpecialies ; i++) {
                    document.getElementById('sp'+i).outerHTML =  "";
                }
                console.log("test");
                e.preventDefault()  // prevent the form from 'submitting'
            });

            $('#showcategory').change(function (e) {
                var numberSpecialies = document.getElementById("showcategory").value

                for(var i=0; i < numberSpecialies ; i++) {
                    document.getElementById('sp'+i).outerHTML =  "";
                }
                console.log("test");
                e.preventDefault()  // prevent the form from 'submitting'
            });
        });
    </script>
@stop