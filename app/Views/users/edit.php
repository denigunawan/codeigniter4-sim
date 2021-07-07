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
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-user-edit"></i> Edit Data Users</li>
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
            <?php echo form_open_multipart('users/update/' . $users['id']); ?>
            <div class="card-body">
              <?php echo form_hidden('id', $users['id']); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <?php echo form_label('Nama Users', 'Nama'); ?>
                    <?php echo form_input('nama_user', $users['nama_user'], ['class' => 'form-control', 'placeholder' => 'Nama Users']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Username', 'Username'); ?>
                    <?php echo form_input('username', $users['username'], ['class' => 'form-control', 'placeholder' => 'Username', 'type' => 'text']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Password Users', 'Password'); ?>
                    <?php echo form_input('password', $users['password'], ['class' => 'form-control', 'placeholder' => 'Password Users', 'type' => 'text']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Level Hak Akses Users', 'hak akses'); ?>
                    <?php echo form_input('level', $users['level'], ['class' => 'form-control', 'placeholder' => 'Level Akses Users']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('users'); ?>" class="btn btn-outline-info"><i class="nav-icon fas fa-backward"></i> Back</a>
              <button type="submit" class="btn btn-primary float-right"> <i class="nav-icon fas fa-save"></i> Update Data</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>