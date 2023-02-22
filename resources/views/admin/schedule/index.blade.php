@extends('admin.layouts.master')

@section('content')

@if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) )
<p style="margin-top:15px; margin-left:40px">{!! link_to_route(config('quickadmin.route').'.schedule.create', 'New Schedule' , null, array('class' => 'btn btn-success')) !!}</p>
@endif

@if ($schedule->count())
<div class="x_panel">
<div class="x_content" style="width:100%;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                    @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) )
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                    @endif
                        <th>Monday</th>
<th>Tuesday</th>
<th>Wednesday</th>
<th>Thursday</th>
<th>Friday</th>
<th>Saturday</th>
<th>Sunday</th>
<th>Label</th>
@if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) )
                        <th>&nbsp;</th>
                    @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($schedule as $row)
                        <tr>
                        @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) )
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                        @endif
                            <td >{{ $row->monday }}</td>
<td>{{ $row->tuesday }}</td>
<td>{{ $row->wednesday }}</td>
<td>{{ $row->thursday }}</td>
<td>{{ $row->friday }}</td>
<td>{{ $row->saturday }}</td>
<td>{{ $row->sunday }}</td>
<td>{{ $row->label }}</td>

@if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) )
                            <td>
                                {!! link_to_route(config('quickadmin.route').'.schedule.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                <!--{!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.schedule.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}--> 
                                <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.schedule.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                 <input type="hidden" id="send" name="toDelete">
                                 {!! Form::close() !!}
                            </td>
                        @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if((auth()->user()->role_id==12) || (auth()->user()->role_id==1) )
            <div class="row">
                <div class="col-xs-12">
                <br>
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.schedule.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
          @endif
        </div>
	</div>
@else
   No schedule yet.
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
  
function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This schedule and it`s details will be permanantly deleted!',
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
text: 'This schedules and it`s details will be permanantly deleted!',
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