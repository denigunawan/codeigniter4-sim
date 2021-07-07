<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
      <h4><b><i>DIVISION ENGGINER</i></b></h4>
      <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
      <h3 class="h3 mb-2 text-gray-800"> Data Nota Masuk Barang <br>
      </h3>
      <p class="mb-4">Data nota masuk adalah data kode dan data lokasi penempatan notamasuk document berada</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/notamasuk') ?>"> <i class="nav-icon fas  fa-clipboard-list"></i> Data notamasuk</a></li>
          <li class=" breadcrumb-item" aria-current="page"><i class="nav-icon fas fa-clipboard-list"></i> Tambah Data nota masuk</li>
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
          <?php echo form_open_multipart('notamasuk/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Kode Nota');
                    $kodenota = [
                      'type'  => 'text',
                      'name'  => 'kode_nota',
                      'id'    => 'kode_nota',
                      'value' => $inputs['kode_nota'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan kode nota'
                    ];
                    echo form_input($kodenota);
                    ?>
                  </div>

                  <div class="form-group">
                    <?php
                    echo form_label('nama barang keluar');
                    $namabarang = [
                      'type'  => 'text',
                      'name'  => 'nama_barang',
                      'id'    => 'nama_barang',
                      'value' => $inputs['nama_barang'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan nama barang'
                    ];
                    echo form_input($namabarang);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Jumlah barang keluar');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'jumlah_barang',
                      'id'    => 'jumlah_barang',
                      'value' => $inputs['jumlah_barang'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Jumlah barang'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
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
                    echo form_label('Status Nota', 'status_document');
                    echo form_dropdown('status_document', ['' => 'Pilih', 'Masuk' => 'Masuk', 'Keluar' => 'Keluar'], $inputs['status_document'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('vendor Sender', 'vendor');
                    echo form_dropdown('vendor', ['' => 'Pilih Vendor', 'KJB' => 'KJB', 'HSRCC' => 'HSRCC'], $inputs['vendor'], ['class' => 'form-control']);
                    ?>
                  </div>

                </div>

                <div class="col-md-12">
                  <div class="form-group ">
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
            <a href="<?php echo base_url('notamasuk'); ?>" class="btn btn-outline-info float-left"> <i class="nav-icon fas fa-backward"></i> Back</a>
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