<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url() ?>" class="navbar-brand">
                    <!-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                    <span class="brand-text font-weight-light">LOGO</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Home/informasi') ?>" class="nav-link">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Home/artikel') ?>" class="nav-link">Artikel</a>
                        </li>
                        <?php if ($this->session->userdata('id_akun') != null) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Layanan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Permohonan Surat</a>
                                    <a class="dropdown-item" href="<?= base_url('Pengaduan') ?>">Pengaduan</a>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-user"></i>
                            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <?php if ($akun != null) : ?>
                                <a href="<?= base_url('Profil') ?>" class="dropdown-item">
                                    <i class="fas fa-user-cog mr-2"></i>Profil
                                </a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <?php if ($akun == null) : ?>
                                <a href="<?= base_url('Auth') ?>" class="dropdown-item">
                                    <i class="fas fa-user mr-2"></i>Login
                                </a>
                            <?php endif; ?>
                            <?php if ($akun != null) : ?>
                                <a href="<?= base_url('Auth') ?>" class="dropdown-item">
                                    <i class="fas fa-exit mr-2"></i>Logout
                                </a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <span class="badge badge-danger navbar-badge">0</span>
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Keranjang</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->