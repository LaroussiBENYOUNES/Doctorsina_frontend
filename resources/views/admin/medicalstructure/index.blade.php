@extends('admin.layouts.master')

@section('content')

@if((auth()->user()->role_id==12))
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.medicalstructure.create', 'New Medical Structure' , null, array('class' => 'btn btn-success')) !!}</p>
@endif
@if ($medicalstructure->count())
    <div class="x_panel">
    <div class="x_content" style="width:92%; margin-left:50px; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                        <th>
                        @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) || ((auth()->user()->role_id==10)&&($wao==1)))

                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        @endif
                        </th>
                        <th>Label</th>
<th>Alias</th>
<!--<th>Structure Type </th>-->
<th>Signaled</th>
<th>Activated</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($medicalstructure as $row)
                        <tr>
                            <td>
                            @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) || ((auth()->user()->role_id==10)&&($wao==1)))
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            @endif
                            </td>
                            <td >{{ $row->label }}</td>
<td>{{ $row->alias }}</td>
<!--<td>{!! link_to_route(config('quickadmin.route').'.structuretype.edit', ($row->structuretype->name) ? $row->structuretype->name : '' , array($row->structuretype->id)) !!}</td>-->
<td>{!! Form::checkbox('signaled', 1, $row->signaled == 1, array('class'=>'marg5','data-toggle'=>'toggle','disabled ','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}</td>
<td>{!! Form::checkbox('activated', 1, $row->activated == 1, array('class'=>'marg5','data-toggle'=>'toggle','disabled ','data-size'=>'mini','data-onstyle'=>'success','data-offstyle'=>'danger')) !!}</td>

                            <td style="width:15%">
                            @if((auth()->user()->role_id==12) || ((auth()->user()->role_id==10)&&($wao==1)) || (auth()->user()->role_id==1))

                                {!! link_to_route(config('quickadmin.route').'.medicalstructure.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                <!--{!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.medicalstructure.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}-->
                                  <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.medicalstructure.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
                            @else 
                            {!! link_to_route(config('quickadmin.route').'.medicalstructure.edit', Details, array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            @endif   
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) || ((auth()->user()->role_id==10)&&($wao==1)))
            <div class="row">
                <div class="col-xs-12">
                <br>
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
           
            {!! Form::open(['route' => config('quickadmin.route').'.medicalstructure.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
            @endif
        </div>
	</div>
@else
<div style="margin-left:40px">
    No medical structure yet.
</div>
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This medical structure and it`s details will be permanantly deleted!',
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
text: 'This medical structures and it`s details will be permanantly deleted!',
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