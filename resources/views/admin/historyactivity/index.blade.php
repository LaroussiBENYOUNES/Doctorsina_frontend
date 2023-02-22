@extends('admin.layouts.master')

@section('content')

@if((Auth::user()->role_id == 10) || (Auth::user()->role_id == 2))
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.historyactivity.create', 'New Hisory Activity' , null, array('class' => 'btn btn-success')) !!}</p>
@endif

@if ($historyactivity->count())
<div class="x_panel">
<div class="x_content" style="width:92%; margin-left:50px; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
            @if((Auth::user()->role_id != 12))
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
            @endif
                        <th>Patient</th>
<th>Activity</th>
<th>Begginning date</th>
<th>End Date</th>
<th>Place</th>
@if((Auth::user()->role_id == 10) || (Auth::user()->role_id == 2) || (Auth::user()->role_id == 1))
                        <th>&nbsp;</th>
                    @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($historyactivity as $row)
                        <tr>
                        @if((Auth::user()->role_id != 12))
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                        @endif
                            <td>{{ isset($row->user->name) ? $row->user->name : '' }}</td>
                            <td>{!! link_to_route(config('quickadmin.route').'.activity.edit', $row->activity->alias, array($row->activity->id), array('style' => 'background-color:  #e6f2ff')) !!}</td>
<td>{{ $row->begginningdate }}</td>
<td>{{ $row->enddate }}</td>
<td>{{ $row->place }}</td>
@if((Auth::user()->role_id == 10) || (Auth::user()->role_id == 2) || (Auth::user()->role_id == 1))
                            <td style="width:15%">
                            @if((Auth::user()->role_id == 10) || (Auth::user()->role_id == 2))
                                {!! link_to_route(config('quickadmin.route').'.historyactivity.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            @endif
                            <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.historyactivity.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.historyactivity.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
            @endif
        </div>
	</div>
@else
<div style="margin-left:40px">
    No history activity yet.
</div>
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This history activity and it`s details will be permanantly deleted!',
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
text: 'This history activities and it`s details will be permanantly deleted!',
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