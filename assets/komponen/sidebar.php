        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="./assets/img/logo-sumut.png" alt="Logo" class="brand-image"
                    style="">
                <span class="brand-text font-weight-light">Siap Layani</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./assets/vendor/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <p class="d-block text-white">Selamat Datang</p>
                        <!-- <a href="#" class="d-block"><?= ucwords($_SESSION['nama']); ?></a> -->
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="./dashboard.php" class="nav-link active ">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">General</li>

                        <?php

                        // if (isset($_SESSION['jabatan'])) {
                        //     if ($_SESSION['jabatan'] == 'Fo' or $_SESSION['jabatan'] == 'FO') {
                        ?>

                        <!-- LINK Layanan -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-luggage-cart"></i>
                                <p>
                                    Layanan
                                </p>
                            </a>
                        </li>
                        <!-- END LINK Layanan -->

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Tulis Surat
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">LAPORAN</li>
                        <li class="nav-item">
                            <a href="./table-tamu.php" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>Daftar Tamu</p>
                            </a>
                        </li>

                        <?php
                        // } elseif ($_SESSION['jabatan'] == 'Kepala Dinas' || $_SESSION['jabatan'] == 'Sekretaris' || $_SESSION['jabatan'] == 'Kepala Bidang') { 

                        ?>

                        <!-- LINK Surat Menyurat -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Surat Menyurat
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Surat Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-trash-alt nav-icon"></i>
                                        <p>Tong Sampah Surat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END LINK Surat Menyurat -->

                        <li class="nav-header">LAPORAN</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./table-tamu.php" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>Daftar Tamu</p>
                            </a>
                        </li>

                        <?php
                        // } else { 

                        ?>
                        <!-- LINK Surat Menyurat -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Surat Menyurat
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Surat Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-trash-alt nav-icon"></i>
                                        <p>Tong Sampah Surat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END LINK Surat Menyurat -->

                        <!-- LINK Akun Pengguna -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Akun Pengguna
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Tambah Akun</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./table-login.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Daftar Akun</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END LINK Akun Pengguna -->

                        <!-- LINK Daftar Pegawai -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Daftar Pegawai
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Daftar Data Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Daftar Data Honorer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./table-login.php" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>Daftar Data ASN</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END LINK Daftar Pegawai -->

                        <li class="nav-header">LAPORAN</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./table-tamu.php" class="nav-link">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>Daftar Tamu</p>
                            </a>
                        </li>
                        <?php
                        // }
                        // } 
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>