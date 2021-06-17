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
                        <li class="breadcrumb-item"><a href="<?= base_url('Permohonan') ?>">Permohonan</a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                                <h3 class="card-title">Konfirmasi Permohonan - <?= $permohonan['jenis_permohonan'] . " - " . $permohonan['nama_akun'] ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="<?= base_url('Permohonan/konfirmasi/') . $permohonan['id_permohonan'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Status Permohonan:</label>
                                        <select name="status" class="form-control">
                                            <option value="Disetujui">Disetujui</option>
                                            <option value="Tidak Disetujui">Tidak Disetujui</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Surat Konfirmasi:</label>
                                        <textarea class="textarea" name="surat" cols="30" rows="5" class="form-control"></textarea>
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