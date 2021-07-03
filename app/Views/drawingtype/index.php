<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <h3 class="h3 mb-2 text-gray-800"> Data Rak Document <em></em>
                <p style="color:red;"> PT HSRCC </p> Division Engginer
            </h3>
            <p class="mb-4">Data Rak adalah data kode dan data lokasi penempatan Rak document berada</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-draw-polygon"></i> Data Drawing Kode</li>
                </ol>
            </nav>
        </div>
    </div>


    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-sm">
                        <a href="<?php echo base_url('drawingtype/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-folder-plus"></i> | Tambah Pendataan Pengurus</a>
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
                                        <th>Drawing Type</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>Staff Verified</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($drawingtype as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['drawing_type']; ?></td>
                                            <td><?php echo $row['tanggal_masuk']; ?></td>
                                            <td><?php echo $row['nama_karyawan']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('drawingtype/edit/' . $row['drawingtype_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('drawingtype/delete/' . $row['drawingtype_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                                        <th>Drawing Type</th>
                                        <th>Tanggal Registrasi</th>
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