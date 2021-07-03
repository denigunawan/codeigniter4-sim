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
          <li class="breadcrumb-item"><a href="<?php echo base_url('/rak') ?>"> <i class="nav-icon fas  fa-file-contract"></i> Data Rak</a></li>
          <li class=" breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-file-contract"></i> Edit Data Rak</li>
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
            <?php echo form_open_multipart('rak/update/' . $rak['rak_id']); ?>
            <div class="card-header">Form Edit rak</div>
            <div class="card-body">
              <?php echo form_hidden('rak_id', $rak['rak_id']); ?>
              <div class="row">
                <div class="col-md-8">

                  <div class="form-group">
                    <?php echo form_label('Nama Rak', 'nama_rak'); ?>
                    <?php echo form_input('nama_rak', $rak['nama_rak'], ['class' => 'form-control', 'placeholder' => 'rak Document']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Kode Rak', 'kode_rak'); ?>
                    <?php echo form_input('kode_rak', $rak['kode_rak'], ['class' => 'form-control', 'placeholder' => 'rak kode']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Tanggal Terdata', 'tanggal_masuk'); ?>
                    <?php echo form_input('tanggal_masuk', $rak['tanggal_masuk'], ['class' => 'form-control', 'placeholder' => 'Tanggal Terdata', 'type' => 'DATE']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Staff Verified', 'karyawan'); ?>
                    <?php echo form_dropdown('karyawan_id', $karyawan, $rak['karyawan_id'], ['class' => 'form-control']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('rak'); ?>" class="btn btn-outline-info">Back</a>
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