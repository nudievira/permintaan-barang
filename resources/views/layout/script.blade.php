<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../plugins/chart.js/Chart.min.js"></script>

<script src="../../plugins/sparklines/sparkline.js"></script>


<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>

<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="../../plugins/summernote/summernote-bs4.min.js"></script>

<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="../../dist/js/adminlte.js?v=3.2.0"></script>



{{-- <script src="dist/js/pages/dashboard.js"></script> --}}

{{-- <script src="dist/js/demo.js"></script> --}}
{{-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}

{{-- <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js "></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
<script>
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
{{-- @include('JavaScript.swal') --}}
@stack('javascript-bottom')
@include('sweetalert::alert')
