<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <marquee style="color: red;">
        <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
      </marquee>

      <h1 class="h3 mb-2 text-gray-800"> Data jabatan Masjid Al-Hikmah Kp. payangan</h1>
      <p class="mb-4">Data jabatan yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>

      Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/jabatan') ?>">Data jabatan</a></li>
          <li class="breadcrumb-item" aria-current="page">Edit Data</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="<?php echo base_url('jabatan/update'); ?>" method="post">
            <div class="card">
              <div class="card-body">
                <?php
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

                <input type="hidden" name="jabatan_id" value="<?php echo $jabatan['jabatan_id']; ?>">
                <div class="form-group">
                  <label for="">Nama Jabatan</label>
                  <input type="text" class="form-control" name="nama_jabatan" value="<?php echo $jabatan['nama_jabatan']; ?>">
                </div>
                <div class="form-group">
                  <label for="">Jenis jabatan</label>
                  <input type="text" class="form-control" name="jenis_jabatan" value="<?php echo $jabatan['jenis_jabatan']; ?>">
                </div>
                <div class="form-group">
                  <label for="">Tanggal Join</label>
                  <input type="date" class="form-control" name="tanggal_masuk" value="<?php echo $jabatan['tanggal_masuk']; ?>">
                </div>
              </div>
              <div class="card-footer">
                <a href="<?php echo base_url('jabatan'); ?>" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<?php echo view('_partials/footer'); ?>