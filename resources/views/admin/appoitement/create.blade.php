@extends('admin.layouts.master')

@section('content')


@if ($appoitement->count())
    <div class="x_content" style="width:92%; margin-left:50px; overflow: hidden; overflow-y:auto; max-height:400px;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                      
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
                        <td>{{ isset($row->medicalstructure->id) ? link_to_route(config('quickadmin.route').'.medicalstructure.edit', $row->medicalstructure->label, array($row->medicalstructure->id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
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
<!-- step 1 : remplissage mot de recherche | lieu (country) -->
@if($step == 1)
<div style="margin-top:25px;">
<div class="col-sm-12">
<div id="containerapp" class="container">
  <div class="row">
    <div class="col-sm-5">
    <br><br>
      <!-- data list contient : les structures medicaux, les medecins et les specialités -->
      <input id="typesearch" list="typesearchd" type="text" class="form-control" placeholder="Doctors, medical structures, specialities..." />
      <datalist id="typesearchd">
        @foreach($typesearch as $key=>$value)
          <option  value="{!!$value->name!!}" id='{"id":"{!!$value->id!!}", "type":"{!!$value->type!!}", "name":"{!!$value->name!!}"}'></option>
        @endforeach 
      </datalist>
      <!----------------------------------->
    </div>
    <div class="col-sm-5">
    <!-- data list contient : les pays -->
    <br><br>
    <input list="wheresearchd" id="wheresearch" type="text" class="form-control" placeholder="Location..."  />
    <datalist id="wheresearchd">
        @foreach($wheresearch as $key=>$val)
          <option id='{!!$val->id!!}'>{{$val->name}}</option>
        @endforeach 
    </datalist>
    <!------------------------------------>
    </div>
    <div class="col-sm-2">
    <br><br>
    <button type="button" class="btn" id = "_search" style="background-color: #2A3F54; color: #FFFFFF; width:150px">Search</button>
    </div>
  </div>
 </div>
</div>
</div>
@endif
<!--------fin step 1------------------------>

<!--------step 2 ---------------------------->
@if($step == 2)
<!------ si l utilisateur cherche une structure medical ------>
<div style="margin-top:15px">
@if($type == "m")

<div class="container">
  <div class="row">
    <div class="col-sm-5" style="margin-left:130px">
    <div>
    <br>
    <label style="margin-left:5px">LABEL</label></div><br>
    <input type="text" class="form-control" value='{!!$medicalstructure->label!!}' readonly style="background-color: #FFFFFF; width:350px" >
    <label style="margin-left:5px; margin-top:26px">DESCRIPTION</label>
    <br><br><textarea rows="6"  type="text" class="form-control" readonly style="background-color: #FFFFFF; width:350px" >{!!$medicalstructure->description!!}</textarea>

    </div>
    <div class="col-sm-5">
    <div><br>
    <label style="margin-left:5px">SPECIALITY</label><br><br>
    <select style="width:346px;background-color: #FFFFFF; padding-left :10px; border-color: #DCDCDC ;color: #708090; height:30px;"id = "select_speciality">
        <option id="0"> Choose Speciality</option>
        @foreach($specialities as $sp)
        <option id="{!!$sp->id!!}">{!!$sp->name!!}</option>
        @endforeach
      </select>
    </div>
    <div >
    <label style="margin-left:5px; margin-top:30px">DOCTORS</label><br><br>
    <select id = "select_doctorsm" style="width:346px;background-color: #FFFFFF; padding-left :10px; border-color: #DCDCDC ;color: #708090; height:30px;">
      <option id="0">Choose Doctor</option>
    </select>
    </div>
    <div>
    <label style="margin-left:5px; margin-top:30px">APPOITEMENT</label><br><br>
    <select id = "select_app" style="width:346px;background-color: #FFFFFF; padding-left :10px; border-color: #DCDCDC ;color: #708090; height:30px;">
      <option id="0">Choose date of appoitement</option>
    </select>
    <button id = "validerapp"  type="button" class="btn" style="background-color: #2A3F54; color: #FFFFFF; margin-top:25px; margin-left:253px; width:100px" >BOOK</button>

    </div>
    </div>
    
  </div>
</div>

@endif
<!------- si l utilisateur cherche un medecin ----------->
@if($type == "d")
  <div id="containerapp" class="container">
    <div class="row">
      <div class="col-sm-3">
      <br><br>
        <label style="margin-left:5px">FULLNAME</label>
        <input type="text" class="form-control" value='{!!$doctor->fullname!!}' readonly style="background-color: #FFFFFF;" >
      </div>
      <div class="col-sm-3">
      <br><br>
        <label style="margin-left:5px">SPECIALITY</label>
        <input type="text" class="form-control" value='{!!$speciality1!!}' readonly style="background-color: #FFFFFF;" >
      </div>
      <div class="col-sm-3">
      <br><br>
        <label style="margin-left:5px">APPOITEMENT</label><br>
        <select id = "select_app" style="width:250px;background-color: #FFFFFF; padding-left :10px; border-color: #DCDCDC ;color: #708090; height:34px;">
          <option id="0">Choose date of appoitement</option>
          @foreach($rendezvouspotentiel as $rd)
          <option id="{!!$rd->date!!}|{!!$rd->time!!}">{!!$rd->date!!} | {!!$rd->time!!}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-3">
      <br><br>
        <label style="opacity: 0;">Choose date before</label><br>
        <button id="validatedoc" type="button" class="btn" style="background-color: #2A3F54; color: #FFFFFF; width:220px">BOOK</button>
      </div>
    </div>
@endif
<!------------- si l utilisateur cherche une specialité --------->
@if($type == "s")
<div style="margin-left:150px">
  <div id="containerapp" class="container">
    <div class="row">
      <div class="col-sm-5">
      <br><br>
        <label>LISTE OF DOCTORS</label><br><br>
        <select id = "select_step2_spec_doc" style="width:350px;background-color: #FFFFFF; padding-left :10px; border-color: #DCDCDC ;color: #708090; height:34px;">
          <option id="0">Choose doctor</option>
          @foreach($doctors as $rd)
          <option id='{!!$rd->id!!}'  value="{!!$value->name!!}" >{!!$rd->fullname!!}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-5">
      <br><br>
        <label>LISTE OF MEDICAL STRUCTURE </label><br><br>
        <select id = "select_step2_spec_medic" style="width:350px;background-color: #FFFFFF; padding-left :10px; border-color: #DCDCDC ;color: #708090; height:34px;">
          <option id="0">Choose medical structure</option>
          @foreach($medicalstructures as $rd)
          <option id='{!!$rd->id!!}'  value="{!!$value->label!!}" >{!!$rd->label!!}</option>
          @endforeach
        </select>
      </div>
  </div>
</div>
@endif
</div>
@endif
@endsection

@section('javascript')
<link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

        $(document).ready(function () {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

        // Si l utilisateur cherche une specialité
        // Charger select options par les structures medicaux qui ont la specialité chercher dans step 1

        $('#select_step2_spec_medic').change(function () {  
            select = document.getElementById('select_step2_spec_medic')
            var options = select.options;
            var idmedic = options[options.selectedIndex].id;
            var url = '{{ route("admin", [":id",":type",":name"]) }}';
            url = url.replace(':id', idmedic);
            url = url.replace(':type', "m");
            url = url.replace(':name', "qlq");
            window.location.href = url
        })

        // Charger select options par les medecins qui ont la specialité chercher dans step 1

        $('#select_step2_spec_doc').change(function () {  
            select = document.getElementById('select_step2_spec_doc')
            var options = select.options;
            var iddoctor = options[options.selectedIndex].id;
            var url = '{{ route("admin", [":id",":type",":name"]) }}';
            url = url.replace(':id', iddoctor);
            url = url.replace(':type', "d");
            url = url.replace(':name', "qlq");
            window.location.href = url
        })

        // Si l'utilisateur cherche un medecin | valider appoitement pour un docteur
   
        $('#validatedoc').click(function () {
            select = document.getElementById('select_app')
            var options = select.options;
            var date_time = options[options.selectedIndex].id;
            if(date_time == 0)
            {
              swal({
              title: 'You have to choose date of appoitement!',
              text: "Please choose one of the doctor's availability.",
              icon: 'warning',
              dangerMode: true,
              })
            }
            else {
              var tabdatetime = date_time.split('|');
              var source =  {!! json_encode($doctor) !!}
              $.ajax({
              url: "/validerappoitement/"+source.id+"/"+0+"/"+tabdatetime[0]+"/"+tabdatetime[1]+"/"+0,
              type:"GET",
              data: {},
              success:function(response){
                  swal({
                  title: 'Appoitement Booked!',
                  text: 'Please wait for doctor"s confirmation.',
                  icon: 'success',
              })
              }
            })
            }
        })

          // Si l'utilisateur cherche une structure medical | valider appoitement

        $('#validerapp').click(function () {
              select = document.getElementById('select_doctorsm')
              var options = select.options;
              var iddoctor = options[options.selectedIndex].id;
              var source =  {!! json_encode($medicalstructure) !!}
              select = document.getElementById('select_app')
              var options = select.options;
              var date_time = options[options.selectedIndex].id;
              var tabdatetime = date_time.split('|');
              select = document.getElementById('select_speciality')
              var options = select.options;
              var idspeciality = options[options.selectedIndex].id;
              if(idspeciality == 0) {
                swal({
                title: 'You have to choose speciality!',
                icon: 'warning',
                dangerMode: true,
              })
              }
              else {
                    if(iddoctor==0) {
                      if(tabdatetime[1]==undefined)
                        tabdatetime[1]=0;
                      $.ajax({
                        url: "/validerappoitement/"+iddoctor+"/"+source.id+"/"+tabdatetime[0]+"/"+tabdatetime[1]+"/"+idspeciality,
                        type:"GET",
                        data: {},
                        success:function(response){                         
                          swal({
                          title: 'Appoitement Booked!',
                          icon: 'success',
                          })
                        }
                      })
                    }
                    else {
                        if(tabdatetime[1]==undefined) {
                          $.ajax({
                          url: "/appoitementofdoctor/"+iddoctor,
                          type:"GET",
                          data: {},
                          success:function(response){
                             tabdatetime[0]=response[0].date;
                             tabdatetime[1]=response[0].time
                             $.ajax({
                                url: "/validerappoitement/"+iddoctor+"/"+source.id+"/"+tabdatetime[0]+"/"+tabdatetime[1]+"/"+idspeciality,
                                type:"GET",
                                data: {},
                                success:function(response){
                                  swal({
                                  title: 'Appoitement Booked!',
                                  icon: 'success',
                                  })
                                }
                              })
                            }
                          })
                       }
                       else {
                        $.ajax({
                                url: "/validerappoitement/"+iddoctor+"/"+source.id+"/"+tabdatetime[0]+"/"+tabdatetime[1]+"/"+idspeciality,
                                type:"GET",
                                data: {},
                                success:function(response){
                                  swal({
                                  title: 'Appoitement Booked!',
                                  icon: 'success',
                                  })
                                }
                              })
                       }
                   }
                }
        });

        // charger select par les disponibilités du docteur
        
        $('#select_doctorsm').change(function () {  
              select = document.getElementById('select_doctorsm')
              var options = select.options;
              var iddoctor = options[options.selectedIndex].id;
              $.ajax({
                url: "/appoitementofdoctor/"+iddoctor,
                type:"GET",
                data: {},
                success:function(response){
                  $('#select_app')
                  .empty()
                  .append('<option selected="selected" id="0">Book for appoitement</option>')
   
                  for (i = 0; i < response.length; i++)
                    { 
                           $('#select_app').append($('<option>',
                               {
                                  value: response[i].date +"|"+ response[i].time,
                                  id : response[i].date +"|"+ response[i].time,
                                  text: response[i].date +" | "+ response[i].time
                                }));
                     }
      
                 }
             })
        });

        // Charger la liste des docteurs qui travaillent dans la structure medical ayant la specialité selectionner

        $('#select_speciality').change(function () {  
              $('#select_app')
              .empty()
              .append('<option selected="selected" id="0">Book for appoitement</option>')
              select = document.getElementById('select_speciality')
              var options = select.options;
              var idspeciality = options[options.selectedIndex].id;
              var source =  {!! json_encode($medicalstructure) !!}
              $.ajax({
                url: "/sp_md_doc/"+idspeciality+"/"+source.id,
                type:"GET",
                data: {},
                success:function(response){
                  $('#select_doctorsm')
                  .empty()
                  .append('<option selected="selected" id="0" value="Choose doctor">Choose doctor</option>');
                for (i = 0; i < response.length; i++)
                    { 
                       $('#select_doctorsm').append($('<option>',
                            {
                                value: response[i].fullname,
                                id : response[i].id,
                                text: response[i].fullname
                      }));
                    }
                },
              });
        })
    
        // apres saisi du mot chercher | pays

        $('#_search').click(function () {

            var input_id = document.getElementById("typesearch");
            var datalist_id = document.getElementById("typesearchd");
            for (var i=0;i<datalist_id.options.length;i++) {
                if (datalist_id.options[i].value == input_id.value) {
                //console.log(datalist_id.options[i].id);
            break;
                }
            }
            if (datalist_id.options[i]==undefined)
            {
              swal({
              title: 'You have to write something!',
              text: 'Search for : Doctors, Medical Structures and Specialities.',
              icon: 'warning',
              dangerMode: true,
              })
            }

            else {
            var input_country = document.getElementById("wheresearch");
            var datalist_country = document.getElementById("wheresearchd");
            for (var j=0;j<datalist_country.options.length;j++) {
                if (datalist_country.options[j].value == input_country.value) {
                //console.log(datalist_id.options[i].id);
                break;
                 }
            }



            var idcountry ;
            if(datalist_country.options[j]==undefined)
               idcountry = 0
            else 
               idcountry =   datalist_country.options[j].id
            var obj = JSON.parse(datalist_id.options[i].id);

            var url = '{{ route("admin", [":id",":type", ":idcountry"]) }}';
            url = url.replace(':id', obj.id);
            url = url.replace(':type', obj.type);
            url = url.replace(':idcountry', idcountry);
            //url = url.replace(':name', obj.name);
            window.location.href = url

            }
        });
        
        // data list pays
        $( "#whereresearch" ).autocomplete({
            source: {!! json_encode($whereasearch) !!},
            select:function(e,data) { 
              console.log("test")
            }
        })
    });
</script>
@stop