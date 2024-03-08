<!DOCTYPE html>
<html lang="en">

<!-- {{-- section head --}} -->
@include('layout.head')
<!-- {{-- end section head --}} -->
{{-- <style>
    .select2-container .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
        border: 1px solid #ced4da !important;
    }

    .select2-container {
        width: 100% !important;
    }
    .custom-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .cancel {
        margin-left: 10px;

    }

    .col-6 table {
        width: 100%;
        /* Menentukan lebar tabel */
        table-layout: fixed;
        /* Menggunakan lebar tabel yang telah ditentukan */
    }

    .col-6 td:first-child {
        width: 50%;
        /* Menentukan lebar kolom pertama */
        text-align: left;
        /* Mengatur teks pada kolom pertama menjadi rata kiri */
    }

    .col-6 td:nth-child(2) {
        width: 5%;
        /* Menentukan lebar kolom kedua */
    }

    /* Gaya tambahan jika diperlukan */
    body {
        font-family: Arial, sans-serif;
    }

    .col-6 {
        margin: 20px;
        /* Memberi margin pada div */
    }
    .options-container {
        position: relative;
        display: inline-block;
    }

    .options {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 10px;
        border-radius: 5px;
    }

    .options a {
        display: block;
        padding: 5px;
        text-decoration: none;
        color: #333;
    }

    .icon-options {
        cursor: pointer;
        /* Menjadikan pointer tangan saat diarahkan ke sini */
    }

</style> --}}

<body>
    <div class="wrapper">

        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header">
                <a href="index.html" class="logo">
                    {{-- <img src="../assets/img/logo.png" alt="navbar brand" class="navbar-brand"> --}}
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar -->
            @include('layout.navbar')
            <!-- /.navbar -->
        </div>

        <!-- Main Sidebar Container -->
        @include('layout.sidebar')

        <div class="main-panel">
            <div class="content">
                <!-- Bread Crumb Start -->
                <div class="panel-header bg-white shadow-sm">
                    <div class="page-inner  py-3 mb-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div class="">
                                <div class="header d-sm-flex align-items-center  text-center">
                                    <h1 class="page-header banner-title">Dashboard </h1>
                                    <ul class="breadcrumb justify-content-sm-start justify-content-center">
                                        <li><a href="../demo/index.html"><i class="icon-home"></i></a></li>
                                        <li><a href="../demo/index.html">Dashboard</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bread Crumb End -->

                <div class="page-inner">
                    @yield('content')
                </div>

            </div>

            <!-- {{-- section footer --}} -->
            @include('layout.footer')
            <!-- {{-- end section footer --}} -->
        </div>

       

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('layout.script')
</body>

</html>