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
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-user"></i> Tambah Data Karyawan</li>
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
          <?php echo form_open_multipart('karyawan/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Nama Karyawan');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'nama_karyawan',
                      'id'    => 'nama_karyawan',
                      'value' => $inputs['nama_karyawan'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nama Karyawan'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Jabatan Karyawan', 'jabatan');
                    echo form_dropdown('jabatan', ['' => 'Pilih Jabatan', 'Manager' => 'Manager', 'Translator' => 'Translator', 'Staff Engginer' => 'Staff Engginer'], $inputs['jabatan'], ['class' => 'form-control']);
                    ?>
                  </div>

                  <div class="form-group">
                    <?php
                    echo form_label('Status Karyawan', 'Status');
                    echo form_dropdown('status', ['' => 'Pilih', 'AKTIF' => 'AKTIF', 'OFF' => 'OFF'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Diviso Karyawan');
                    $handphone = [
                      'type'  => 'text',
                      'name'  => 'divisi',
                      'id'    => 'divisi',
                      'value' => $inputs['divisi'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Divisi'
                    ];
                    echo form_input($handphone);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('DivisI Karyawan');
                    $divisi = [
                      'type'  => 'text',
                      'name'  => 'divisi',
                      'id'    => 'divisi',
                      'value' => $inputs['divisi'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Devisi Karyawan'
                    ];
                    echo form_input($divisi);
                    ?>
                  </div>

                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal  Terdata');
                    $tanggalmasuk = [
                      'type'  => 'date',
                      'name'  => 'tanggalmasuk',
                      'id'    => 'tanggalmasuk',
                      'value' => $inputs['tanggalmasuk'],
                      'class' => 'form-control',
                      'placeholder' => 'tanggalmasuk'
                    ];
                    echo form_input($tanggalmasuk);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('karyawan'); ?>" class="btn btn-outline-info">Back</a>
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