@extends('admin.layouts.master')

@section('content')


@if(Auth::user()->role_id == 10)
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.historyvaccine.create', 'New History Vaccine' , null, array('class' => 'btn btn-success')) !!}</p>
@endif
@if ($historyvaccine->count())
<div class="x_panel">
<div class="x_content" style="width:92%; margin-left:50px; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
            @if((Auth::user()->role_id != 12) )
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
            @endif
                        <th>Patient</th>
<th>Vaccine</th>
<th>Date</th>
<th>Number</th>

@if((Auth::user()->role_id == 10) || (Auth::user()->role_id == 2) || (Auth::user()->role_id == 1))
                        <th>&nbsp;</th>
                    @endif
           </tr>
                </thead>

                <tbody>
                    @foreach ($historyvaccine as $row)
                        <tr>
                        @if((Auth::user()->role_id != 12))
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                        @endif
                            <td>{{ isset($row->user->name) ? $row->user->name : '' }}</td>
                            <td>{!! link_to_route(config('quickadmin.route').'.vaccine.edit', $row->vaccine->alias, array($row->vaccine->id), array('style' => 'background-color:  #e6f2ff')) !!}</td>
<td>{{ $row->datevaccin }}</td>
<td>{{ $row->nbr }}</td>

@if((Auth::user()->role_id == 10) || (Auth::user()->role_id == 2) || (Auth::user()->role_id == 1))
                            <td style="width:15%">
<<<<<<< HEAD
                             @if(Auth::user()->role_id == 10)
=======
                            @if(Auth::user()->role_id == 10)
>>>>>>> d0e115de76b6e3002604503fb7805d350ca9d8ab
                                {!! link_to_route(config('quickadmin.route').'.historyvaccine.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            @endif
                            <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.historyvaccine.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                 <input type="hidden" id="send" name="toDelete">
                                 {!! Form::close() !!}
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if((Auth::user()->role_id != 12)) 
            <div class="row">
                <div class="col-xs-12">
                <br>
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.historyvaccine.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
            @endif
        </div>
	</div>
@else
<div style="margin-left:40px">
    No history vaccine yet.
</div>
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This history vaccine and it`s details will be permanantly deleted!',
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
            $('#delete').click(function () {

event.preventDefault();
const url = $(this).attr('href');
swal({
title: 'Are you sure?',
text: 'This history vaccines and it`s details will be permanantly deleted!',
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