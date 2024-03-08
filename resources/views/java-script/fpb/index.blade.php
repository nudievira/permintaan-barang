<script>
    $(function() {
        $("#example1").DataTable({
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
                    data: 'po_number',
                    name: 'po_number',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'vendor.vendor_name',
                    name: 'vendor.vendor_name',
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
