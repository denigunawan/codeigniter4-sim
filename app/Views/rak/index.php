<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <marquee style="color: red;">
                <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
            </marquee>

            <h1 class="h3 mb-2 text-gray-800"> Data Pengurus Masjid Al-Hikmah Kp. payangan</h1>
            <p class="mb-4">Data Pengurus yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard') ?>"> <i class="nav-icon fas fa-mosque"></i>Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-users"></i> Data Pengurus</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-sm">
                        <a href="<?php echo base_url('rak/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-folder-plus"></i> | Tambah Pendataan Pengurus</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        if (!empty(session()->getFlashdata('success'))) { ?>
                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <?php if (!empty(session()->getFlashdata('info'))) { ?>
                            <div class="alert alert-info">
                                <?php echo session()->getFlashdata('info'); ?>
                            </div>
                        <?php } ?>

                        <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                            <div class="alert alert-warning">
                                <?php echo session()->getFlashdata('warning'); ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Rak</th>
                                        <th>Kode Rak</th>
                                        <th>Tanggal Terdata</th>
                                        <th>Staff Verified</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rak as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['nama_rak']; ?></td>
                                            <td><?php echo $row['kode_rak']; ?></td>
                                            <td><?php echo $row['tanggal_masuk']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('rak/edit/' . $row['rak_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('rak/delete/' . $row['rak_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Rak</th>
                                        <th>Kode Rak</th>
                                        <th>Tanggal Terdata</th>
                                        <th>Staff Verified</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
</div>

<?php echo view('_partials/footer'); ?>