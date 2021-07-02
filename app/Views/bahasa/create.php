<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <marquee style="color: red;">
        <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
      </marquee>

      <h1 class="h3 mb-2 text-gray-800"> Data Pengurus Masjid Al-Hikmah Kp. payangan</h1>
      <p class="mb-4">Data Pengurus yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/bahasa') ?>">Data Pengurus</a></li>
          <li class="breadcrumb-item" aria-current="page">Tambah Pengurus</li>
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
          <?php echo form_open_multipart('bahasa/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Bahasa Documents');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'bahasa_document',
                      'id'    => 'bahasa_document',
                      'value' => $inputs['bahasa_document'],
                      'class' => 'form-control',
                      'placeholder' => 'Input bahasa'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal Masuk');
                    $tanggal_masuk = [
                      'type'  => 'date',
                      'name'  => 'tanggal_masuk',
                      'id'    => 'tanggal_masuk',
                      'value' => $inputs['tanggal_masuk'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan tanggal masuk'
                    ];
                    echo form_input($tanggal_masuk);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Penanggung Jawab Data', 'daftarstaff');
                    echo form_dropdown('karyawan_id', $karyawan, $inputs['karyawan_id'], ['class' => 'form-control']);
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('bahasa'); ?>" class="btn btn-outline-info">Back</a>
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