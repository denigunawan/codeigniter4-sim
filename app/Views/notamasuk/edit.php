<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <h3 class="h3 mb-2 text-gray-800"> Data notamasuk Document <em></em>
        <p style="color:red;"> PT HSRCC </p> Division Engginer
      </h3>
      <p class="mb-4">Data notamasuk adalah data kode dan data lokasi penempatan notamasuk document berada</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/notamasuk') ?>"> <i class="nav-icon fas  fa-file-contract"></i> Data notamasuk</a></li>
          <li class=" breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-file-contract"></i> Edit Data notamasuk</li>
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
            <?php echo form_open_multipart('notamasuk/update/' . $notamasuk['notamasuk_id']); ?>
            <div class="card-header">Form Edit notamasuk</div>
            <div class="card-body">
              <?php echo form_hidden('notamasuk_id', $notamasuk['notamasuk_id']); ?>
              <div class="row">
                <div class="col-md-8">

                  <div class="form-group">
                    <?php echo form_label('Kode Nota', 'kode_nota'); ?>
                    <?php echo form_input('kode_nota', $notamasuk['kode_nota'], ['class' => 'form-control', 'placeholder' => 'notamasuk Document']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Nama Barang', 'nama_barang'); ?>
                    <?php echo form_input('nama_barang', $notamasuk['nama_barang'], ['class' => 'form-control', 'placeholder' => 'notamasuk kode']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Jumlah Barang', 'jumlah_barang'); ?>
                    <?php echo form_input('jumlah_barang', $notamasuk['jumlah_barang'], ['class' => 'form-control', 'placeholder' => 'notamasuk kode']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Tanggal Terdata', 'tanggal_masuk'); ?>
                    <?php echo form_input('tanggal_masuk', $notamasuk['tanggal_masuk'], ['class' => 'form-control', 'placeholder' => 'Tanggal Terdata', 'type' => 'DATE']); ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Status Nota', 'status');
                    echo form_dropdown('status', ['' => 'Pilih', 'Masuk' => 'Masuk', 'Proses' => 'Proses', 'Keluar' => 'Keluar'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Vendor Sender', 'karyawan'); ?>
                    <?php echo form_dropdown('vendor_id', $vendor, $notamasuk['vendor_id'], ['class' => 'form-control']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Staff Verified', 'karyawan'); ?>
                    <?php echo form_dropdown('karyawan_id', $karyawan, $notamasuk['karyawan_id'], ['class' => 'form-control']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('notamasuk'); ?>" class="btn btn-outline-info">Back</a>
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