<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
      <h4><b><i>DIVISION ENGGINER</i></b></h4>
      <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
      <h3 class="h3 mb-2 text-gray-800"> Data Users <br>
      </h3>
      <p class="mb-4">Data Users Hanya Bisa Dimasukan Oleh Developer atau Manager</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/users') ?>"> <i class="nav-icon fas  fa-user-lock"></i> Data Users</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-user-friends"></i> Tambah Data Users</li>
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
          <?php echo form_open_multipart('users/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <?php
                    echo form_label('Nama users');
                    $nama_user = [
                      'type'  => 'text',
                      'name'  => 'nama_user',
                      'id'    => 'nama_user',
                      'value' => $inputs['nama_user'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nama users'
                    ];
                    echo form_input($nama_user);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Username users');
                    $username = [
                      'type'  => 'text',
                      'name'  => 'username',
                      'id'    => 'username',
                      'value' => $inputs['username'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan username users'
                    ];
                    echo form_input($username);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Password users');
                    $password = [
                      'type'  => 'password',
                      'name'  => 'password',
                      'id'    => 'password',
                      'value' => $inputs['password'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan password users'
                    ];
                    echo form_input($password);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Hak Akses Users');
                    $level = [
                      'type'  => 'number',
                      'name'  => 'level',
                      'id'    => 'level',
                      'value' => $inputs['level'],
                      'class' => 'form-control',
                      'placeholder' => 'level users'
                    ];
                    echo form_input($level);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('users'); ?>" class="btn btn-outline-info"><i class="nav-icon fas fa-backward"></i> Back</a>
              <button type="submit" class="btn btn-primary float-right"><i class="nav-icon fas fa-save"></i> Simpan</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</div>
<?php echo view('_partials/footer'); ?>