@extends('layout.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Permintaan Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{ route('fpb.create') }}" class="btn btn-outline-info btn-sm"><i
                                class="fas fa-plus-circle"></i> Permintaan</a>
                        <table id="list_fpb" class="table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>NO </th>
                                    <th>NO FPB</th>
                                    <th>Nama</th>
                                    <th>Departement</th>
                                    <th>Tanggal Permintaan</th>
                                    <th>Status</th>
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
        @include('java-script.fpb.index')
    @endpush
@endsection
