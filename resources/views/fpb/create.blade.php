@extends('layout.index')
<style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Opsional: Jika ingin memberi jarak pada tombol */
    .btn {
        margin-left: auto;
    }
    .cancel {
        margin-left: 10px;

    }


</style>
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form id="create_fpb" method="POST" class="mt-3" action="{{ route('fpb.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buat Permintaan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <span>NIK Peminta</span>
                                        <select id="nik_user" class="form-control select2" name="idUser"
                                            style="width: 100%;" required>
                                            <option value="">Pilih NIK Karyawan</option>
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}">{{ $item->NIK }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('idUser'))
                                            <span class="text-danger">{{ $errors->first('idUser') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input tengah -->
                                    <div class="form-group">
                                        <span>Nama :</span>
                                        <input type="text" value="" id="name_user" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- text input kanan -->
                                    <div class="form-group">
                                        <span>Departement :</span>
                                        <input type="text" id="departement_user" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="width: 33%;">
                                <span>Tanggal Permintaan :</span>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="dateRequest" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" required>
                                    <div class="input-group-append" data-target="#reservationdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    @if ($errors->has('dateRequest'))
                                    <span class="text-danger">{{ $errors->first('dateRequest') }}</span>
                                @endif

                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <label>Daftar Barang</label>
                                <span class="btn btn-sm btn-success mb-2" id="add_product"><i
                                        class="fas fa-plus-circle"></i>
                                    Tambah</span>
                            </div>
                            <table class="table table-bordered table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="30%">Barang</th>
                                        <th>Lokasi</th>
                                        <th>Tersedia</th>
                                        <th>Kuantiti</th>
                                        <th>Satuan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="justify-content-end px-3" style="text-align: end">
                        <button class="btn btn-outline-primary btn-sm" id="save_fpb">Kirim</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        @push('javascript-bottom')
            @include('java-script.fpb.create')
        @endpush
    @endsection
