<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
      <h4><b><i>DIVISION ENGGINER</i></b></h4>
      <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
      <h3 class="h3 mb-2 text-gray-800"> Data Karyawan <br>
      </h3>
      <p class="mb-4">Data Karyawan Hanya Bisa Dimasukan Oleh Developer atau Manager</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/karyawan') ?>"> <i class="nav-icon fas  fa-users"></i> Data Karyawan</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-user"></i> Edit Data Karyawan</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php
          $inputs = session()->getFlashdata('inputs');
          $errors = session()->getFlashdata('errors');
          if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
              Whoops! Ada kesalahan saat input data, yaitu:
              <ul>
                <?php foreach ($errors as $error) : ?>
                  <li><?= esc($error) ?></li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php } ?>
          <div class="card">
            <?php echo form_open_multipart('karyawan/update/' . $karyawan['karyawan_id']); ?>
            <div class="card-header">Form Edit Produk</div>
            <div class="card-body">
              <?php echo form_hidden('karyawan_id', $karyawan['karyawan_id']); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="form-group">
                      <?php echo form_label('nama', 'Name'); ?>
                      <?php echo form_input('nama_karyawan', $karyawan['nama_karyawan'], ['class' => 'form-control', 'placeholder' => 'Product Name']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Jabatan Karyawan', 'jabatan'); ?>
                      <?php echo form_dropdown('jabatan', ['' => 'Pilih Jabatan', 'Manager' => 'Manager', 'Translator' => 'Translator', 'Staff Engginer' => 'Staff Engginer'], $karyawan['jabatan'], ['class' => 'form-control']); ?>

                    </div>
                    <?php echo form_label('Divisi', 'divisi'); ?>
                    <?php echo form_input('divisi', $karyawan['divisi'], ['class' => 'form-control', 'placeholder' => 'Product SKU', 'type' => 'number']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Status', 'Status'); ?>
                    <?php echo form_dropdown('status', ['' => 'Pilih', 'AKTIF' => 'AKTIF', 'OFF' => 'OFF'], $karyawan['status'], ['class' => 'form-control']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Tanggal Masuk', 'Description'); ?>
                    <?php echo form_input('tanggalmasuk', $karyawan['tanggalmasuk'], ['class' => 'form-control', 'placeholder' => 'Product Description']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('karyawan'); ?>" class="btn btn-outline-info">Back</a>
              <button type="submit" class="btn btn-primary float-right">Update Data</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php echo view('_partials/footer'); ?>