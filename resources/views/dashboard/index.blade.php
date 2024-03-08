@extends('layout.index')
@section('content')
        <div class="col-12">
            <div class="card">
                <?php
                $hour = date('H');
                $greetings = $hour >= 18 ? 'Malam' : ($hour >= 15 ? 'Sore' : ($hour >= 12 ? 'Siang' : 'Pagi'));
                ?>
                <div class="card-header">
                    <h4>Selamat {{ $greetings }},&nbsp; <b>{{ Auth::user()->name }}</b>&nbsp;!</h4>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
