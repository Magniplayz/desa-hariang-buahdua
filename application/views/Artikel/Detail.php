<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2><?= $artikel['judul_artikel'] ?></h2>
                </div>
                <img src="<?= base_url('upload/artikel/') . $artikel['sampul_artikel'] ?>" width="100%" class="img-responsive" title="Foto Sampul Artikel">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="row shadow-lg p-3 mt-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <p>Kategori: <?= $artikel['kategori'] ?></p>
                            <hr>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <?= $artikel['isi_artikel'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->