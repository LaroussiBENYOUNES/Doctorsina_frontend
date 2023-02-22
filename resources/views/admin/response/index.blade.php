@extends('admin.layouts.master')

@section('content')

@if ($response->count())
<div  class="x_panel">
 <div class="x_content" style="width:100%; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                
                        <th>Question</th>
<th>ID Consultation</th>
<th>Response</th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($response as $row)
                        <tr>
                     
                        @if((auth()->user()->role_id==10) || (auth()->user()->role_id==1))
                        <td>{{ isset($row->question_alias) ? link_to_route(config('quickadmin.route').'.question.edit', $row->question_alias, array($row->question_id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
                        @else
                        <td>{{ isset($row->question_alias) ? $row->question_alias : '--' }}</td>
                        @endif
                        <td>{{ isset($row->consultation_id) ? link_to_route(config('quickadmin.route').'.consultation.edit', $row->consultation_id, array($row->consultation_id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>


<td>{{ $row->patient_response }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
  
        </div>
	</div>
    </div>
@else
    No response yet.
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