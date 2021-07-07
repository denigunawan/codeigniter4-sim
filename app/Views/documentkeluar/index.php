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
            <div class="mb-4"> Pastikan sebelum menginputkan data kedalam form, data tersebut sudah di approved oleh Manager</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-receipt"></i> Data Document Keluar</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-sm">
                        <a href="<?php echo base_url('documentkeluar/create'); ?>" class="btn btn-outline-danger float-right"><i class="nav-icon fas fa-plus-square"></i> Data Document Keluar</a>
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

                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Dokumen</th>
                                        <th class="text-center">Document Type</th>
                                        <th class="text-center">Document Number</th>
                                        <th class="text-center">Judul Dokumen</th>
                                        <th class="text-center">Nomer Box</th>
                                        <th class="text-center">Vender Receiver</th>
                                        <th class="text-center">Document Bahasa</th>
                                        <th class="text-center">Bahasa Dokumen</th>
                                        <th class="text-center">Approved</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Status Dokumen</th>
                                        <th class="text-center">Tanggal Keluar</th>
                                        <th class="text-center">Staff</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($documentkeluar as $key => $row) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $key + 1; ?></td>
                                            <td class="text-center"><?php echo $row['kode_dokumen']; ?></td>
                                            <td class="text-center"><?php echo $row['document_type']; ?></td>
                                            <td class="text-center"><?php echo $row['document_number']; ?></td>
                                            <td class="text-center"><?php echo $row['judul_dokumen']; ?></td>
                                            <td class="text-center"><?php echo $row['nomer_box']; ?></td>
                                            <td class="text-center"><?php echo $row['isi_box']; ?></td>
                                            <td class="text-center"><?php echo $row['vendor']; ?></td>
                                            <td class="text-center"><?php echo $row['bahasa']; ?></td>
                                            <td class="text-center"><?php echo $row['approved']; ?></td>
                                            <td class="text-center"><?php echo $row['jabatan']; ?></td>
                                            <td class="text-center"><?php echo $row['status_document']; ?></td>
                                            <td class="text-center"><?php echo $row['tanggal_keluar']; ?></td>
                                            <td class="text-center"><?php echo $row['nama_karyawan']; ?></td>
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
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Dokumen</th>
                                        <th class="text-center">Document Type</th>
                                        <th class="text-center">Document Number</th>
                                        <th class="text-center">Judul Dokumen</th>
                                        <th class="text-center">Nomer Box</th>
                                        <th class="text-center">Vender Receiver</th>
                                        <th class="text-center">Document Bahasa</th>
                                        <th class="text-center">Bahasa Dokumen</th>
                                        <th class="text-center">Approved</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Status Dokumen</th>
                                        <th class="text-center">Tanggal Keluar</th>
                                        <th class="text-center">Staff</th>
                                        <th class="text-center">Actions</th>
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