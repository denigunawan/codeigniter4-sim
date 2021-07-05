<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
            <h4><b><i>DIVISION ENGGINER</i></b></h4>
            <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
            <h3 class="h3 mb-2 text-gray-800"> Data Document Keluar <br>
            </h3>
            <p class="mb-4">Data Document Keluar Hanya Bisa Dimasukan Oleh Semua Roles</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-users"></i> Data Document Keluar</li>
                </ol>
            </nav>
        </div>
    </div>


    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-sm">
                        <a href="<?php echo base_url('documentkeluar/create'); ?>" class="btn btn-outline-danger float-right"><i class="nav-icon fas fa-folder-plus"></i> | Tambah Document Keluar</a>
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
                                        <th>Kode Dokumen</th>
                                        <th>Document Type</th>
                                        <th>Document Number</th>
                                        <th>Judul Dokumen</th>
                                        <th>Nomer Box</th>
                                        <th>Vender Receiver</th>
                                        <th>Document Bahasa</th>
                                        <th>Bahasa Dokumen</th>
                                        <th>Approved</th>
                                        <th>Jabatan</th>
                                        <th>Status Dokumen</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Staff</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($documentkeluar as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['kode_dokumen']; ?></td>
                                            <td><?php echo $row['document_type']; ?></td>
                                            <td><?php echo $row['document_number']; ?></td>
                                            <td><?php echo $row['judul_dokumen']; ?></td>
                                            <td><?php echo $row['nomer_box']; ?></td>
                                            <td><?php echo $row['isi_box']; ?></td>
                                            <td><?php echo $row['vendor']; ?></td>
                                            <td><?php echo $row['bahasa']; ?></td>
                                            <td><?php echo $row['approved']; ?></td>
                                            <td><?php echo $row['jabatan']; ?></td>
                                            <td><?php echo $row['status_document']; ?></td>
                                            <td><?php echo $row['tanggal_keluar']; ?></td>
                                            <td><?php echo $row['karyawan_id']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('documentkeluar/edit/' . $row['document_keluar_id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('documentkeluar/delete/' . $row['document_keluar_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                                        <th>Kode Dokumen</th>
                                        <th>Document Type</th>
                                        <th>Document Number</th>
                                        <th>Judul Dokumen</th>
                                        <th>Nomer Box</th>
                                        <th>Vender Receiver</th>
                                        <th>Document Bahasa</th>
                                        <th>Bahasa Dokumen</th>
                                        <th>Approved</th>
                                        <th>Jabatan</th>
                                        <th>Status Dokumen</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Staff</th>
                                        <th>Actions</th>
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