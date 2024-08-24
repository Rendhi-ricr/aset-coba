<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Manajemen Aset</span>
        </a>
        <?php if (session()->get('level') == 'admin') : ?>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Tools & Components
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/">
                        <i class="align-middle" data-feather="square"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a data-bs-target="#multi" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-down align-middle">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg> <span class="align-middle">Master</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <!-- <li class="sidebar-item">
                        <a href="/panel/barang" class="sidebar-link ms-4">Barang</a>
                    </li> -->
                        <!-- <li class="sidebar-item">
                        <a href="/panel/kategori" class="sidebar-link ms-4">
                            Kategori Barang
                        </a>
                    </li> -->
                        <li class="sidebar-item">
                            <a href="/panel/gedung" class="sidebar-link ms-4">
                                Data Gedung
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/panel/ruangan" class="sidebar-link ms-4">
                                Data Ruangan
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/panel/kategori" class="sidebar-link ms-4">
                                Data Kategori
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/panel/barang" class="sidebar-link ms-4">
                                Data Item /
                                Barang
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/panel/aset">
                        <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Data Aset</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/panel/peminjaman">
                        <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Data Peminjaman</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/panel/pengaduan">
                        <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Data Pengaduan</span>
                    </a>
                </li>
            <?php endif; ?>


            <!-- <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Kerjasama</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Staff</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugins & Addons
            </li> -->
            <?php if (session()->get('level') == 'mahasiswa') : ?>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/user/peminjaman">
                        <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Data Peminjaman</span>
                    </a>
                </li>
            <?php endif; ?>

            </ul>



    </div>
</nav>