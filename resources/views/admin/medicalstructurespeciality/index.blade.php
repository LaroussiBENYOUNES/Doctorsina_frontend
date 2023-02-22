@extends('admin.layouts.master')

@section('content')

<!--
<p>{!! link_to_route(config('quickadmin.route').'.medicalstructurespeciality.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>
-->
@if ($medicalstructurespeciality->count())
<div class="x_panel">
    <div class="x_content" style="width:92%; margin-left:50px; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                    <!--
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        -->
                        <th style="width:50%">Speciality</th>
<th>Medical Structure</th>
<!--
                        <th>&nbsp;</th>
                    -->
                    </tr>
                </thead>

                <tbody>
                    @foreach ($medicalstructurespeciality as $row)
                        <tr>
                        <!--
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            -->

                            <td>{!! link_to_route(config('quickadmin.route').'.speciality.edit', $row->speciality->name, array($row->speciality->id), array('style' => 'background-color:  #e6f2ff')) !!}</td>
<td>{{ isset($row->medicalstructure->label) ? link_to_route(config('quickadmin.route').'.medicalstructure.edit', $row->medicalstructure->label, array($row->medicalstructure->id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
<!--
                            <td>
                                {!! link_to_route(config('quickadmin.route').'.medicalstructurespeciality.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.medicalstructurespeciality.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@else
    No medical structure specialities yet.
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