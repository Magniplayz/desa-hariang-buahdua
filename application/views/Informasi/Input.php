<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Profil Desa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Isi form dibawah</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="<?= base_url('Informasi') ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Desa:</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $profil['nama_desa'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Visi:</label>
                                        <textarea name="visi" cols="30" rows="2" class="form-control"><?= $profil['visi'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Misi:</label>
                                        <textarea name="misi" cols="30" rows="2" class="form-control"><?= $profil['misi'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat:</label>
                                        <textarea name="alamat" cols="30" rows="2" class="form-control"><?= $profil['alamat_desa'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sejarah:</label>
                                        <textarea class="textarea" name="sejarah" cols="30" rows="5" class="form-control"><?= $profil['sejarah_desa'] ?></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->