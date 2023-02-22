@extends('admin.layouts.master')

@section('content')


@if(Auth::user()->role_id == 2)
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.appoitement.create', 'New Appoitement' , null, array('class' => 'btn btn-success')) !!}</p>
@endif
@if ($appoitement->count())
    <div class="x_panel">
    <div class="x_content" style="width:100%; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Medical Structure</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Confirmed</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($appoitement as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->medicalstructure->id) ? link_to_route(config('quickadmin.route').'.medicalstructure.edit', $row->medicalstructure->label, array($row->medicalstructure->id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
<td>{{ isset($row->patient->fullname) ? $row->patient->fullname : '' }}</td>
<td>{{ isset($row->doctor->fullname) ? $row->doctor->fullname : '' }}</td>
<td>{{ $row->date }}</td>
<td>{{ $row->time }}</td>
<td>{!! Form::checkbox('confirmed', 1, $row->confirmed == 1, array('class'=>'marg5','data-toggle'=>'toggle','disabled ','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}</td>

                            <td>
                            @if((Auth::user()->role_id == 1) || (Auth::user()->role_id == 12))
                            {!! link_to_route(config('quickadmin.route').'.appoitement.edit', Details, array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            @endif 
                            @if((Auth::user()->role_id == 10) || (Auth::user()->role_id == 2))
                                {!! link_to_route(config('quickadmin.route').'.appoitement.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            @endif 
                                <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.appoitement.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                <input type="hidden" id="send" name="toDelete">
                                {!! Form::close() !!}
                                @if((Auth::user()->role_id) == 10)
                               {!! link_to_route(config('quickadmin.route').'.consultation.create', "Consultation", array($row->id), array('class' => 'btn btn-xs btn-warning')) !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                <br>
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.appoitement.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    <div style="margin-left:40px">
    No appoitement yet.
    </div>
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This appoitement and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                if (value) {
                    var toDelete = [];
                    var send = $('#send');
                    toDelete.push(id);
                    send.val(JSON.stringify(toDelete));
                    $('#massDelete').submit();           
                }    
        })
    }
        $(document).ready(function () {

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $('#delete').click(function () {

event.preventDefault();
const url = $(this).attr('href');
swal({
title: 'Are you sure?',
text: 'This countries and it`s details will be permanantly deleted!',
icon: 'warning',
buttons: ["Cancel", "Yes!"],
}).then(function(value) {
if (value) {

    var send = $('#send');
    var mass = $('.mass').is(":checked");
    if (mass == true) {
        send.val('mass');
    } else {
        var toDelete = [];
        $('.single').each(function () {
            if ($(this).is(":checked")) {
                toDelete.push($(this).data('id'));
            }
        });
        send.val(JSON.stringify(toDelete));
    }
    $('#massDelete').submit();
 
}
});
});
        });
    </script>
@stop