@extends('layout.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Lokasi Produk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="list_location" class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th width="80%">Lokasi</th>
                                    <th>Action</th>
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
        @include('java-script.warehouse.listLocation')
    @endpush
@endsection
