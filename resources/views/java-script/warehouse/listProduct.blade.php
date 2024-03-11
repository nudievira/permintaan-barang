<script type="text/javascript">

    function getData(id) {
        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            pageLength: 10,
            lengthChange: false,
            lengthMenu: [
                [10, 20, 50, 100, -1],
                [11, 20, 50, 100, "All"]
            ],
            ajax: {
                url: "{{ route('warehouse.dataTableProduct') }}",
                type: "get",
                data: {
                    id: id
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'index',
                    width: '5%',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'uom',
                    name: 'uom',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'category_product.name',
                    name: 'category_product.name',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'qty',
                    name: 'qty',
                    fixedColumns: true,
                    defaultContent: '-',
                    className: 'text-start',
                    orderable: false,
                    searchable: false
                },
            ]
        })
    }
</script>
