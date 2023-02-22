@extends('admin.layouts.master')

@section('content')
<!--
@if(Auth::user()->role_id == 1)
<p style="margin-top:30px">{!! link_to_route(config('quickadmin.route').'.doctor.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>
@endif
-->
@if ($doctor->count())
@if(Auth::user()->role_id == 1)
    <div class="x_panel">
    @endif
    <div class="x_content" style="width:100%;  overflow: hidden; overflow-y:auto; max-height:250px;">
            <table class="table table-striped responsive-utilities jambo_table" id="datatable">
                <thead>
                    <tr class="headings">
                    @if(Auth::user()->role_id == 1)
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                    @endif
                        <th>Full Name</th>
<th>Email</th>
<th>Country</th>
<th>Speciality</th>
<th>Birthday</th>
<th>Male</th>
@if(Auth::user()->role_id == 1)
<th>Code Cnam</th>
<th>Matricule</th>
@endif
<th>Activated</th>
<th>Signaled</th>
@if(Auth::user()->role_id == 1)
                        <th>&nbsp;</th>
                    @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($doctor as $row)
                        <tr>
                        @if(Auth::user()->role_id == 1)
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                        @endif
                            <td>{{ $row->fullname }}</td>
<td>{{ isset($row->user->email) ? $row->user->email : '' }}</td>
<td>{{ isset($row->country->alias) ? $row->country->alias : '' }}</td>
<td>{{ isset($row->speciality->name) ? $row->speciality->name : '' }}</td>
<td>{{ $row->birthday }}</td>
<td>{{ $row->gender }}</td>
@if(Auth::user()->role_id == 1)
<td>{{ $row->codecnam }}</td>
<td>{{ $row->matricule }}</td>
@endif
<td>{{ $row->activated }}</td>
<td>{{ $row->signaled }}</td>
@if(Auth::user()->role_id == 1)
                            <td>
                                {!! link_to_route(config('quickadmin.route').'.doctor.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.doctor.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(Auth::user()->role_id == 1)
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.doctor.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
            @endif
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
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
    </script>
@stop