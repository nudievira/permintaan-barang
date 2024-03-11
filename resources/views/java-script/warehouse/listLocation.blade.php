<script>
    $(function() {
        var dataTable = $("#list_location").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "ajax": {
                "url": "{{ route('warehouse.dataTableLocation') }}",
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
                    data: 'rak_number',
                    name: 'rak_number',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
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
        });

        // Menempatkan kotak pencarian dan tombol navigasi di pojok kanan atas
        dataTable.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example1_wrapper .dataTables_filter').addClass('text-end mt-2');
    });
</script>
