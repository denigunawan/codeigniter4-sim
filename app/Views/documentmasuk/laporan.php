<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
            <h4><b><i>DIVISION ENGGINER</i></b></h4>
            <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
            <h3 class="h3 mb-2 text-gray-800"> Laporan Data Document Masuk<br></h3><br><br>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/documentmasuk') ?>"> <i class="nav-icon fas  fa-receipt"></i> Data Document Masuk</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-file"></i>Laporan Data Document Masuk</li>
                </ol>
            </nav>
        </div>
    </div>


    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Dokumen</th>
                                        <th class="text-center">Drawing Type</th>
                                        <th class="text-center">Drawing Kode</th>
                                        <th class="text-center">Judul Dokumen</th>
                                        <th class="text-center">Vendor</th>
                                        <th class="text-center">Bahasa Dokumen</th>
                                        <th class="text-center">Status Dokumen</th>
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Staff Verified</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($documentmasuk as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['kode_dokumen']; ?></td>
                                            <td><?php echo $row['document_type']; ?></td>
                                            <td><?php echo $row['document_number']; ?></td>
                                            <td><?php echo $row['judul_dokumen']; ?></td>
                                            <td><?php echo $row['vendor']; ?></td>
                                            <td><?php echo $row['bahasa']; ?></td>
                                            <td><?php echo $row['status_document']; ?></td>
                                            <td><?php echo $row['tanggal_masuk']; ?></td>
                                            <td><?php echo $row['nama_karyawan']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Dokumen</th>
                                        <th class="text-center">Drawing Type</th>
                                        <th class="text-center">Drawing Kode</th>
                                        <th class="text-center">Judul Dokumen</th>
                                        <th class="text-center">Vendor</th>
                                        <th class="text-center">Bahasa Dokumen</th>
                                        <th class="text-center">Status Dokumen</th>
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Staff Verified</th>
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