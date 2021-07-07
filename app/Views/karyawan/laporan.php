<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
            <h4><b><i>DIVISION ENGGINER</i></b></h4>
            <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
            <h3 class="h3 mb-2 text-gray-800"> Laporan Data Karyawan<br></h3><br><br>
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/karyawan') ?>"> <i class="nav-icon fas  fa-users"></i> Data Karyawan</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-print"></i> Laporan Data Karyawan</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <a href="<?php echo base_url('karyawan/htmlToPdf') ?>" class="btn btn-primary">
Download PDF
</a>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Karyawan</th>
                                        <th class="text-center">Divisi Karyawan</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($karyawan as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['nama_karyawan']; ?></td>
                                            <td><?php echo $row['divisi']; ?></td>
                                            <td><?php echo $row['jabatan']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['tanggalmasuk']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Karyawan</th>
                                        <th class="text-center">Divisi Karyawan</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal Masuk</th>
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