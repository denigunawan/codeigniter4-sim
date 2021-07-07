<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
            <h4><b><i>DIVISION ENGGINER</i></b></h4>
            <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
            <h3 class="h3 mb-2 text-gray-800"> Laporan Data Document Keluar<br></h3><br><br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/documentkeluar') ?>"> <i class="nav-icon fas  fa-receipt"></i> Data Document Keluar</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-print"></i> Laporan Data Document Keluar</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-sm">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
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
                                        <th class="text-center">Staff Verified</th>
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
                                            <td><?php echo $row['nama_karyawan']; ?></td>
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