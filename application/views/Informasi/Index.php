<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <h2><?= $profil['nama_desa'] ?></h2>
                        <p><?= $profil['alamat_desa'] ?></p>
                    </div>
                    <hr>
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <h3><b>VISI</b></h3>
                        <h4><?= $profil['visi'] ?></h4>
                        <h3><b>MISI</b></h3>
                        <h4><?= $profil['misi'] ?></h4>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <h3><b>SEJARAH</b></h3>
                        <?= $profil['sejarah_desa'] ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->