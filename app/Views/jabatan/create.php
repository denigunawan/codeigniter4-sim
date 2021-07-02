<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <h3 class="h3 mb-2 text-gray-800"> Data Jabatan Teregistrasi <em></em>
        <p style="color:red;"> PT HSRCC </p> Division Engginer
      </h3>
      <p class="mb-4">Data Jabatan Hanya Bisa Dimasukan Oleh Developer atau Manager</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/jabatan') ?>"> <i class="nav-icon fas  fa-sitemap"></i> Data Jabatan</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-user"></i> Add New Jabatan</li>
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
          <?php echo form_open_multipart('jabatan/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Nama Jabatan');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'nama_jabatan',
                      'id'    => 'nama_jabatan',
                      'value' => $inputs['nama_jabatan'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nama Jabatan'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>

                  <div class="form-group">
                    <?php
                    echo form_label('Jenis Jabatan');
                    $pekerjaan = [
                      'type'  => 'text',
                      'name'  => 'jenis_jabatan',
                      'id'    => 'jenis_jabatan',
                      'value' => $inputs['jenis_jabatan'],
                      'class' => 'form-control',
                      'placeholder' => 'Jenis Jabatan...'
                    ];
                    echo form_input($pekerjaan);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal  Terdata');
                    $tanggalmasuk = [
                      'type'  => 'date',
                      'name'  => 'tanggal_masuk',
                      'id'    => 'tanggal_masuk',
                      'value' => $inputs['tanggal_masuk'],
                      'class' => 'form-control',
                      'placeholder' => 'tanggal_masuk'
                    ];
                    echo form_input($tanggalmasuk);
                    ?>
                  </div>

                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('jabatan'); ?>" class="btn btn-outline-info">Back</a>
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