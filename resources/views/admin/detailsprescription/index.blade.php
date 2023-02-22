@extends('admin.layouts.master')

@section('content')

<!--@if(Auth::user()->role_id == 10)
<p style="margin-top:30px">{!! link_to_route(config('quickadmin.route').'.detailsprescription.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>
@endif-->
@if ($detailsprescription->count())
<div class="x_panel" style="margin-top:15px">
<div class="x_content" style="width:92%; margin-left:50px; overflow: hidden;">
            <table class="table table-striped responsive-utilities jambo_table datatable"  id="datatable">
            <thead style="position: sticky; top: 0; z-index: 999;">
            <tr class="headings">
                  
                      <th>Prescription</th>
<th>Drug</th>
<th>Dose</th>
<th>Duration</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($detailsprescription as $row)
                        <tr>
                           
                        <td>{{ isset($row->prescription_id) ? link_to_route(config('quickadmin.route').'.prescription.edit',  $row->prescription_id, array($row->prescription_id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>
                        <td>{{ isset($row->drug_alias) ? link_to_route(config('quickadmin.route').'.drug.edit',  $row->drug_alias, array($row->drug_id), array('style' => 'background-color:  #e6f2ff')) : '--' }}</td>

<td>{{ $row->dose }}</td>
<td>{{ $row->duration }}</td>

<<<<<<< HEAD
                            <td style="width:10%">
                               <!-- {!! link_to_route(config('quickadmin.route').'.detailsprescription.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!} -->
                               <!-- {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.detailsprescription.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}-->
                                <button class="btn btn-danger btn-xs" onclick="deleteone({!!$row->id!!})" >
                                    delete
                                 </button>
                                 {!! Form::open(['route' => config('quickadmin.route').'.detailsprescription.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                                 <input type="hidden" id="send" name="toDelete">
                                 {!! Form::close() !!}
                            </td>
                        @endif
                           </tr>  
=======
                           
                        </tr>
>>>>>>> 7a7926fd97c5b265940506b46e74106cc1765cd7
                    @endforeach
                </tbody>
            </table>
          
        </div>
	</div>
@else
    No details prescription yet.
@endif

@endsection

@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        
function deleteone(id) {
           swal({
                title: 'Are you sure?',
                text: 'This certificate and it`s details will be permanantly deleted!',
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
text: 'This certificates and it`s details will be permanantly deleted!',
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