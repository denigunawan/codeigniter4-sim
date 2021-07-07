<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <h3 class="h3 mb-2 text-gray-800"> Data notakeluar Document <em></em>
        <p style="color:red;"> PT HSRCC </p> Division Engginer
      </h3>
      <p class="mb-4">Data notakeluar adalah data kode dan data lokasi penempatan notakeluar document berada</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/notakeluar') ?>"> <i class="nav-icon fas  fa-file-contract"></i> Data notakeluar</a></li>
          <li class=" breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-file-contract"></i> Edit Data notakeluar</li>
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
            <?php echo form_open_multipart('notakeluar/update/' . $notakeluar['notakeluar_id']); ?>
            <div class="card-body">
              <?php echo form_hidden('notakeluar_id', $notakeluar['notakeluar_id']); ?>
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <?php echo form_label('Kode Nota', 'kode_nota'); ?>
                    <?php echo form_input('kode_nota', $notakeluar['kode_nota'], ['class' => 'form-control', 'placeholder' => 'notakeluar Document']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Nama Barang', 'nama_barang'); ?>
                    <?php echo form_input('nama_barang', $notakeluar['nama_barang'], ['class' => 'form-control', 'placeholder' => 'notakeluar kode']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Jumlah Barang', 'jumlah_barang'); ?>
                    <?php echo form_input('jumlah_barang', $notakeluar['jumlah_barang'], ['class' => 'form-control', 'placeholder' => 'notakeluar kode']); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php echo form_label('Tanggal Terdata', 'tanggal_keluar'); ?>
                    <?php echo form_input('tanggal_keluar', $notakeluar['tanggal_keluar'], ['class' => 'form-control', 'placeholder' => 'Tanggal Terdata', 'type' => 'DATE']); ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Status Nota', 'status_document');
                    echo form_dropdown('status_document', ['' => 'Pilih', 'Masuk' => 'Masuk', 'Keluar' => 'Keluar'], $inputs['status_document'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Vendor Sender', 'vendor');
                    echo form_dropdown('vendor', ['' => 'Pilih', 'KJB' => 'KJB', 'HSRCC' => 'HSRCC'], $inputs['vendor'], ['class' => 'form-control']);
                    ?>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <?php echo form_label('Staff Verified', 'karyawan'); ?>
                    <?php echo form_dropdown('karyawan_id', $karyawan, $notakeluar['karyawan_id'], ['class' => 'form-control']); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('notakeluar'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Back</a>
            <button type="submit" class="btn btn-primary float-right"> <i class="nav-icon fas fa-save"></i> Update Data</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<?php echo view('_partials/footer'); ?>