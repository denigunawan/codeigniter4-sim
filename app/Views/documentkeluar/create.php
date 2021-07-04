<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <h3 class="h3 mb-2 text-gray-800"> Data documentkeluar Document <em></em>
        <p style="color:red;"> PT HSRCC </p> Division Engginer
      </h3>
      <p class="mb-4">Data documentkeluar adalah data kode dan data lokasi penempatan documentkeluar document berada</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/documentkeluar') ?>"> <i class="nav-icon fas  fa-draw-polygon"></i> Data Drawing Kode</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-draw-polygon"></i> Add New Drawing Kode</li>
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
          <?php echo form_open_multipart('documentkeluar/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Kode Dokumen');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'kode_dokumen',
                      'id'    => 'kode_dokumen',
                      'value' => $inputs['kode_dokumen'],
                      'class' => 'form-control',
                      'placeholder' => 'Input Kode Dokumen'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Drawing Type', 'drawingtype_id');
                    echo form_dropdown('drawingtype_id', $drawingtype, $inputs['drawingtype_id'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Drawing Kode', 'staff');
                    echo form_dropdown('drawingkode_id', $drawingkode, $inputs['drawingkode_id'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Nomer Box');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'nomer_box',
                      'id'    => 'nomer_box',
                      'value' => $inputs['nomer_box'],
                      'class' => 'form-control',
                      'placeholder' => 'Input Nomer Box'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Isi Box');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'isi_box',
                      'id'    => 'isi_box',
                      'value' => $inputs['isi_box'],
                      'class' => 'form-control',
                      'placeholder' => 'Input Isi Box'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Bahasa Document', 'bahasa');
                    echo form_dropdown('bahasa_id', $bahasa, $inputs['bahasa_id'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Vendor Receiver', 'vendor');
                    echo form_dropdown('vendor_id', $vendor, $inputs['vendor_id'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Status Nota', 'status');
                    echo form_dropdown('status', ['' => 'Pilih', 'Masuk' => 'Masuk', 'Proses' => 'Proses', 'Keluar' => 'Keluar'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal Keluar');
                    $tanggal_keluar = [
                      'type'  => 'date',
                      'name'  => 'tanggal_keluar',
                      'id'    => 'tanggal_keluar',
                      'value' => $inputs['tanggal_keluar'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan tanggal keluar'
                    ];
                    echo form_input($tanggal_keluar);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Penanggung Jawab Data', 'staff');
                    echo form_dropdown('karyawan_id', $karyawan, $inputs['karyawan_id'], ['class' => 'form-control']);
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('documentkeluar'); ?>" class="btn btn-outline-info">Back</a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>