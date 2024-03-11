<?php
use App\Helpers\CurrentTimestamp;
?>

<div class="col-lg-6">
    <table class="mb-4">
        <tr>
            <td>No FPB</td>
            <td>:</td>
            <td>{{ $fpb->no_fpb }}</td>
        </tr>
        <tr>
            <td>Permintaan</td>
            <td>:</td>
            <td>{{ $fpb->user->name }}</td>
        </tr>
        <tr>
            <td>Departement</td>
            <td>:</td>
            <td>{{ $fpb->user->departement->name }}</td>
        </tr>
        <tr>
            <td>Tanggal Permintaan</td>
            <td>:</td>
            <td>{{ CurrentTimestamp::convertDate($fpb->date_request) }}</td>
        </tr>
    </table>
<br>
    <table class="table table-bordered table-striped" id="myTable" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid #dddddd; padding: 8px;">No</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Barang</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Lokasi</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Kuantiti</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Satuan</th>
                <th style="border: 1px solid #dddddd; padding: 8px;">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fpb->fpbItem as $item)
                <tr>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $loop->index + 1 }}</td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $item->product->name }}</td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $item->product->location->rak_number }}</td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $item->qty }}</td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $item->product->uom }}</td>
                    <td style="border: 1px solid #dddddd; padding: 8px;">{{ $item->note ?: '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
