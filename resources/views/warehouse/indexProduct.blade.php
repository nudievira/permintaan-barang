@extends('layout.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Produk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="list_location" class="table table-bordered table-striped datatable" width="100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Produk</th>
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                    <th>Kuantiti</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->


    @push('javascript-bottom')
        <script>
            $(document).ready(function() {
                getData({{ $id }})
            })
        </script>
        @include('java-script.warehouse.listProduct')
    @endpush
@endsection
