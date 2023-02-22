@extends('admin.layouts.master')

@section('content')

@if((auth()->user()->role_id==12) || (auth()->user()->role_id==1))
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.servicecontact.create', 'New Service Contact' , null, array('class' => 'btn btn-success')) !!}</p>
@endif
@if ($servicecontact->count())
<div class="x_panel">
<div class="x_content" style="width:92%; margin-left:50px; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
            @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1))
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                    @endif
                    <th>Medical Structure</th>
                    <th>Site</th>

                        <th>Service</th>
<th>Contact</th>
<th>Contact Type</th>
@if((auth()->user()->role_id==12) || (auth()->user()->role_id==1))
                        <th>&nbsp;</th>
                    @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($servicecontact as $row)
                        <tr>
                        @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1))
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                        @endif
                        <td>{!! link_to_route(config('quickadmin.route').'.medicalstructure.edit', $row->label_medicalstructure, array($row->id_medicalstructure), array('style' => 'background-color:  #e6f2ff')) !!}</td>
                        <td>{!! link_to_route(config('quickadmin.route').'.site.edit', $row->label_site, array($row->id_site), array('style' => 'background-color:  #e6f2ff')) !!}</td>
                        <td>{!! link_to_route(config('quickadmin.route').'.service.edit', $row->label_service, array($row->id_service), array('style' => 'background-color:  #e6f2ff')) !!}</td>
<td>{{ $row->contact }}</td>
<td>{{ $row->contacttype }}</td>
@if((auth()->user()->role_id==12) || (auth()->user()->role_id==1))
                            <td>
                                {!! link_to_route(config('quickadmin.route').'.servicecontact.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                <!--{!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.servicecontact.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}-->

                                <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.servicecontact.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                 <input type="hidden" id="send" name="toDelete">
                                 {!! Form::close() !!}
                            </td>
                        @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1))
            <div class="row">
                <div class="col-xs-12">
                <br>
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.servicecontact.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
         @endif
        </div>
	</div>
@else
<div style="margin-left:40px;">
No service contact yet. 
</div>
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This service contact and it`s details will be permanantly deleted!',
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
text: 'This service contact and it`s details will be permanantly deleted!',
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