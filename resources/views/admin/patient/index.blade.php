@extends('admin.layouts.master')

@section('content')
<!--
<p>{!! link_to_route(config('quickadmin.route').'.patient.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>
-->
@if ($patient->count())
    <div class="x_panel" style="margin-top:20px;">
    <div class="x_content" style="width:100%; overflow: hidden; overflow-y:auto; max-height:400px;">

            <table class="table table-striped responsive-utilities jambo_table" id="datatable">
                <thead>
                    <tr>
                     <!--   <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>-->
                        <th>Full Name</th>
<th>Email</th>
<th>Birthday</th>
<th>Gender</th>
@if(Auth::user()->role_id == 1)
<th>Matricule</th>
<th>Passport</th>
@endif
<th>Activated</th>
<th>Signaled</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($patient as $row)
                        <tr>
                          <!--  <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>-->
                            <td>{{ $row->fullname }}</td>
<td>{{ isset($row->user->email) ? $row->user->email : '' }}</td>
<td>{{ $row->birthday }}</td>
<td>{{ $row->gender }}</td>
@if(Auth::user()->role_id == 1)
<td>{{ $row->identitymatricule }}</td>
<td>{{ $row->passport }}</td>
@endif
<td>{{ $row->activated }}</td>
<td>{{ $row->signaled }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.patient.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                               <!-- {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.patient.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.patient.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
            -->
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