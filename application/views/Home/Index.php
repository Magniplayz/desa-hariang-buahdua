<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2>Selamat datang di website Desa Hariang Buahdua</h2>
                </div>
                <?php if ($akun['id_akun'] != null) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?= $jml_permohonan ?></h3>

                                        <p>Permohonan Surat</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <a href="<?= base_url('Permohonan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?= $jml_pengaduan ?></h3>

                                        <p>Pengaduan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    <a href="<?= base_url('Pengaduan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->