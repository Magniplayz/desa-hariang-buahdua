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
                        <li class="breadcrumb-item active">Permohonan</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Permohonan Surat Masyarakat</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th>File Pendukung</th>
                                        <th>Status</th>
                                        <th>Pemohon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($permohonan as $data) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['jenis_permohonan'] ?></td>
                                            <td><?= $data['keterangan_permohonan'] ?></td>
                                            <td>
                                                <a target="__blank" href="<?= base_url('upload/permohonan/') . $data['file_pendukung'] ?>"><?= $data['file_pendukung'] ?></a>
                                            </td>
                                            <td><?= $data['status_permohonan'] ?></td>
                                            <td><?= $data['nama_akun'] ?></td>
                                            <td>
                                                <a href="<?= base_url('Permohonan/konfirmasi/') . $data['id_permohonan'] ?>" class="btn btn-primary btn-flat" title="Konfirmasi permohonan"><i class="fas fa-forward"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->