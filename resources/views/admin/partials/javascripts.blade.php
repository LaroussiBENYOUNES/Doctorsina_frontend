<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
{{--<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>--}}
{{--<script src="{{ url('quickadmin/js') }}/timepicker.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>--}}
<script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
{{--<script src="{{ url('quickadmin/js') }}/bootstrap.min.js"></script>--}}
{{--<script src="{{ url('quickadmin/js') }}/main.js"></script>--}}

{{--<script>--}}

    {{--$('.datepicker').datepicker({--}}
        {{--autoclose: true,--}}
        {{--dateFormat: "{{ config('quickadmin.date_format_jquery') }}"--}}
    {{--});--}}

    {{--$('.datetimepicker').datetimepicker({--}}
        {{--autoclose: true,--}}
        {{--dateFormat: "{{ config('quickadmin.date_format_jquery') }}",--}}
        {{--timeFormat: "{{ config('quickadmin.time_format_jquery') }}"--}}
    {{--});--}}

    {{--$('#datatable').dataTable( {--}}
        {{--"language": {--}}
            {{--"url": "{{ trans('quickadmin::strings.datatable_url_language') }}"--}}
        {{--}--}}
    {{--});--}}

{{--</script>--}}


<script src="{{ url('quickadmin/js') }}/bootstrap.min.js"></script>

<!-- chart js -->
<script src="{{ url('quickadmin/js') }}/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="{{ url('quickadmin/js') }}/progressbar/bootstrap-progressbar.min.js"></script>
<script src="{{ url('quickadmin/js') }}/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="{{ url('quickadmin/js') }}/icheck/icheck.min.js"></script>
<script src="{{ url('quickadmin/js') }}/datatables/js/jquery.dataTables.js"></script>
<script src="{{ url('quickadmin/js') }}/datatables/tools/js/dataTables.tableTools.js"></script>

<!-- ChekBox -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ url('quickadmin/js') }}/custom.js"></script>

<!-- main script file -->
<script src="{{ url('quickadmin/js') }}/main.js"></script>


<!-- Datatables -->

<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        var oTable = $('#example').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
            }
        });
        $("tfoot input").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function () {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function (i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>
