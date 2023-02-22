@extends('admin.layouts.master')

@section('content')

@if((Auth::user()->role_id != 12))
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.status.create', 'New Status' , null, array('class' => 'btn btn-success')) !!}</p>
@endif
@if ($status->count())
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
                        <th>Alias</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($status as $row)
                        <tr>
                        @if((Auth::user()->role_id != 12))
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            @endif

                            @if((Auth::user()->role_id != 12))
                            <td style="width:80%">{{ $row->alias }}</td>
                            @else
                            <td style="width:90%">{{ $row->alias }}</td>
                            @endif
                            <td>
                            @if((Auth::user()->role_id != 12))
                                {!! link_to_route(config('quickadmin.route').'.status.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.status.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                 <input type="hidden" id="send" name="toDelete">
                                 {!! Form::close() !!}
                            @else
                            {!! link_to_route(config('quickadmin.route').'.status.edit', Details, array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            @endif 
                            </td>
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
            {!! Form::open(['route' => config('quickadmin.route').'.status.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
            @endif
        </div>
	</div>
@else
<div style="margin-left:40px">
    No status yet.
</div>
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This status and it`s details will be permanantly deleted!',
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
text: 'This status and it`s details will be permanantly deleted!',
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