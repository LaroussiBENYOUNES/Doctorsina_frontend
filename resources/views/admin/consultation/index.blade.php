@extends('admin.layouts.master')

@section('content')

@if(auth()->user()->role_id==10)
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.consultation.create', 'New Consultation' , null, array('class' => 'btn btn-success')) !!}</p>
@endif
@if ($consultation->count())
 <div  class="x_panel">
 <div class="x_content" style="width:100%; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Id appoitement</th>
                        <th>Id visitnature</th>
                        <th>Id visitstatus</th>
                        <th>Id visittype</th>
                         <th>Date</th>
                         <th>Time</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($consultation as $row)
                        <tr>

                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>
                            {!! link_to_route(config('quickadmin.route').'.appoitement.edit', $row->appoitement_id, array($row->appoitement_id), array('style' => 'background-color:  #e6f2ff')) !!}
                            </td>
                          
                           
                            <td>{{ isset($row->visitnature_alias) ? link_to_route(config('quickadmin.route').'.visitnature.edit', $row->visitnature_alias, array($row->visitnature_id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
                            <td>{{ isset($row->visitstatus_alias) ? link_to_route(config('quickadmin.route').'.visitstatus.edit', $row->visitstatus_alias, array($row->visitstatus_id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
                            <td>{{ isset($row->visittype_alias) ? link_to_route(config('quickadmin.route').'.visittype.edit', $row->visittype_alias, array($row->visittype_id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->time }}</td>

                            <td style="width:15%">
                            @if(auth()->user()->role_id==10)
                               {!! link_to_route(config('quickadmin.route').'.consultation.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}  
                               <!--{!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.consultation.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}--> 
                                <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.consultation.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                 <input type="hidden" id="send" name="toDelete">
                                {!! Form::close() !!}
                                @endif

                                @if((auth()->user()->role_id==1) || (auth()->user()->role_id==2))
                            {!! link_to_route(config('quickadmin.route').'.consultation.edit', Details, array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.consultation.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                 <input type="hidden" id="send" name="toDelete">
                                {!! Form::close() !!}
                            @endif   
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if((auth()->user()->role_id==1) || (auth()->user()->role_id==10) || (auth()->user()->role_id==2))
            <div class="row">
                <div class="col-xs-12">
                <br>
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.consultation.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
            @endif
        </div>
	</div>
@else
   No Consultation yet.
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This consultation and it`s details will be permanantly deleted!',
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
text: 'This consultation and it`s details will be permanantly deleted!',
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