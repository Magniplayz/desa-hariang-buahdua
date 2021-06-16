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
                        <li class="breadcrumb-item"><a href="<?= base_url('Akun') ?>">Akun</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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
                    <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Isi Form Di Bawah</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="<?= base_url('Akun/add') ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Sesuai KTP / KK</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama">
                                        <p class="text-danger"><?= form_error('nama') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input name="username" type="text" class="form-control" placeholder="Masukkan Username (Tanpa Spasi)">
                                        <p class="text-danger"><?= form_error('username') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email (Opsional)</label>
                                        <input name="email" type="email" class="form-control" placeholder="Masukkan Email">
                                        <p class="text-danger"><?= form_error('email') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Akun</label>
                                        <select name="level" class="form-control">
                                            <option value="0">Masyarakat</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Sekretaris</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password Akun</label>
                                        <input name="pass" type="password" class="form-control" placeholder="Masukkan Password">
                                        <p class="text-danger"><?= form_error('pass') ?></p>
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