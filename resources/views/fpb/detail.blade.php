@extends('layout.index')
<?php
use App\Helpers\CurrentTimestamp;
?>

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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail FPB</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <td>No FPB</td>
                                        <td>:</td>
                                        <td>{{ $fpb->no_fpb }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px">Permintaan</td>
                                        <td style="padding-top: 10px">:</td>
                                        <td style="padding-top: 10px">{{ $fpb->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px">Departement</td>
                                        <td style="padding-top: 10px">:</td>
                                        <td style="padding-top: 10px">{{ $fpb->user->departement->name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px">Tanggal Permintaan</td>
                                        <td style="padding-top: 10px">:</td>
                                        <td style="padding-top: 10px">
                                            {{ CurrentTimestamp::convertDate($fpb->date_request) }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px">Keterangan</td>
                                        <td style="padding-top: 10px">:</td>
                                        <td style="padding-top: 10px">
                                            @if ($fpb->status == 10)
                                                <span class="badge bg-success">Selesai</span>
                                            @else
                                                <span class="badge bg-success">Proses</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                        <table class="table table-bordered table-striped mt-5" id="myTable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Barang</th>
                                    <th>Lokasi</th>
                                    <th>Kuantiti</th>
                                    <th>Satuan</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fpb->fpbItem as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->product->location->rak_number }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->product->uom }}</td>
                                        <td>{{ $item->note ? $item->note : '-' }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        @push('javascript-bottom')
        @endpush
    @endsection
