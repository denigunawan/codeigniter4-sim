<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <marquee style="color: red;">
                <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
            </marquee>

            <h1 class="h3 mb-2 text-gray-800"> Data karyawan Masjid Al-Hikmah Kp. payangan</h1>
            <p class="mb-4">Data karyawan yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard') ?>"> <i class="nav-icon fas fa-mosque"></i>Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-users"></i> Data karyawan</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-sm">
                        <a href="<?php echo base_url('karyawan/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-folder-plus"></i> | Tambah Pendataan karyawan</a>
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
                                        <th>nama karyawan</th>
                                        <th>telephone</th>
                                        <th>alamat</th>
                                        <th>divisi</th>
                                        <th>jabatan</th>
                                        <th>status</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($karyawan as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['nama_karyawan']; ?></td>
                                            <td><?php echo $row['telephone']; ?></td>
                                            <td><?php echo $row['alamat']; ?></td>
                                            <td><?php echo $row['divisi']; ?></td>
                                            <td><?php echo $row['jabatan_id']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['tanggalmasuk']; ?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('karyawan/edit/' . $row['karyawan_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('karyawan/delete/' . $row['karyawan_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                                        <th>nama karyawan</th>
                                        <th>telephone</th>
                                        <th>alamat</th>
                                        <th>divisi</th>
                                        <th>jabatan</th>
                                        <th>status</th>
                                        <th>Tanggal Masuk</th>
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