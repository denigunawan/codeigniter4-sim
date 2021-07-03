<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <h3 class="h3 mb-2 text-gray-800"> Data drawingkode Document <em></em>
        <p style="color:red;"> PT HSRCC </p> Division Engginer
      </h3>
      <p class="mb-4">Data drawingkode adalah data kode dan data lokasi penempatan drawingkode document berada</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/drawingkode') ?>"> <i class="nav-icon fas  fa-draw-polygon"></i> Data Drawing Kode</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-draw-polygon"></i> Edit Drawing Kode</li>
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
            <?php echo form_open_multipart('drawingkode/update/' . $drawingkode['drawingkode_id']); ?>
            <div class="card-header">Form Edit drawingkode</div>
            <div class="card-body">
              <?php echo form_hidden('drawingkode_id', $drawingkode['drawingkode_id']); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <?php echo form_label('Drawing Kode', 'drawing_kode'); ?>
                    <?php echo form_input('drawing_kode', $drawingkode['drawing_kode'], ['class' => 'form-control', 'placeholder' => 'drawingkode Document']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Tanggal Terdata', 'tanggal_masuk'); ?>
                    <?php echo form_input('tanggal_masuk', $drawingkode['tanggal_masuk'], ['class' => 'form-control', 'placeholder' => 'Tanggal Terdata', 'type' => 'DATE']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Staff Verified', 'karyawan'); ?>
                    <?php echo form_dropdown('karyawan_id', $karyawan, $drawingkode['karyawan_id'], ['class' => 'form-control']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('drawingkode'); ?>" class="btn btn-outline-info">Back</a>
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