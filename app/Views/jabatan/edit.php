<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <h3 class="h3 mb-2 text-gray-800"> Data Jabatan Terdata <em></em>
        <p style="color:red;"> PT HSRCC </p> Division Engginer
      </h3>
      <p class="mb-4">Data Jabatan Hanya Bisa Dimasukan Oleh Developer atau Manager</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/jabatan') ?>"> <i class="nav-icon fas  fa-sitemap"></i> Data Jabatan</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-user"></i> Edit Jabatan</li>
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