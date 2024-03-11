<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PT rajawali</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Gudang
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fpb.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Form Pembelian Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('warehouse.listLocation') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stok Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>

</aside>
