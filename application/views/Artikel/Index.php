<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <a href="<?= base_url('Home/artikel/Info_Program') ?>" class="btn btn-flat btn-primary btn-block">Info Program</a>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <a href="<?= base_url('Home/artikel/Agenda') ?>" class="btn btn-flat btn-danger btn-block">Agenda</a>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <a href="<?= base_url('Home/artikel/Berita') ?>" class="btn btn-flat btn-success btn-block">Berita</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <hr>
                    <h2>Artikel</h2>
                </div>
                <?php foreach ($artikel as $data) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="row shadow-lg p-3 mt-3">
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <img src="<?= base_url('upload/artikel/') . $data['sampul_artikel'] ?>" width="250" height="150">
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <a href="<?= base_url('Home/detail_artikel/') . $data['id_artikel'] ?>" class="text-dark">
                                    <h4><?= $data['judul_artikel'] ?></h4>
                                </a>
                                <p>Kategori: <?= $data['kategori'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->