<script>
    $(function() {
        var dataTable = $("#list_fpb").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "ajax": {
                "url": "{{ route('fpb.dataTable') }}",
                "type": "GET"
                // Tambahkan properti lain yang diperlukan untuk permintaan Ajax, jika ada
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    name: 'index',
                    width: '5%',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'no_fpb',
                    name: 'no_fpb',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'user.name',
                    name: 'user.name',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'user.departement.name',
                    name: 'user.departement.name',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'date_formater',
                    name: 'date_formater',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: false,
                    searchable: false,
                    width: '15%',
                }
            ]
        });

        // Menempatkan kotak pencarian dan tombol navigasi di pojok kanan atas
        dataTable.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example1_wrapper .dataTables_filter').addClass('text-end mt-2');
    });
</script>

{{-- <script type="text/javascript">
    function getDataPo() {
        var data_table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            pageLenght: 10,
            lenghtChange:false,
            lengthMenu: [
                    [10, 20, 50, 100, -1],
                    [10, 20, 50, 100, "All"]
                ],
                ajax:{
                    url: "{{ route('fpb.dataTable') }}",
                },
                initComplete: function(settings, json) {
                    if (json.code > 300) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Info',
                            text: json.errors,
                        });
                    }
                },
                "columns": [{
                    data: 'DT_RowIndex',
                    name: 'index',
                    width: '5%',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'no_fpb',
                    name: 'no_fpb',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'user.name',
                    name: 'user.name',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'user.departement.name',
                    name: 'user.departement.name',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'date_request',
                    name: 'date_request',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start multiline',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: false,
                    searchable: false
                }
            ]

        })
    }
</script> --}}

