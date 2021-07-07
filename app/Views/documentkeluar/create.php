<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <p style="color:red;"> <b>PT HIGH SPEED RAILWAYS CONTRACTOR CONSORTIUM<b /><br></p>
      <h4><b><i>DIVISION ENGGINER</i></b></h4>
      <img src="<?php echo base_url('hsrcc.png'); ?>" alt="gambar hsrcc"> <br><br>
      <h3 class="h3 mb-2 text-gray-800"> Data Document Keluar <br>
      </h3>
      <div class="mb-4"> Pastikan sebelum menginputkan data kedalam form, data tersebut sudah di approved oleh Manager</div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-campground"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/documentkeluar') ?>"> <i class="nav-icon fas  fa-receipt"></i> Data Document Keluar</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-file"></i> Data Document Keluar</li>
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
                      'placeholder' => 'Masukan Kode Dokumen'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Dokumen Type');
                    $dokumenType = [
                      'type'  => 'text',
                      'name'  => 'document_type',
                      'id'    => 'document_type',
                      'value' => $inputs['document_type'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Type Documents'
                    ];
                    echo form_input($dokumenType);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Document Number');
                    $documentNumber = [
                      'type'  => 'text',
                      'name'  => 'document_number',
                      'id'    => 'document_number',
                      'value' => $inputs['document_number'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Document Number'
                    ];
                    echo form_input($documentNumber);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Judul Dokumen');
                    $judulDokumen = [
                      'type'  => 'text',
                      'name'  => 'judul_dokumen',
                      'id'    => 'judul_dokumen',
                      'value' => $inputs['judul_dokumen'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Judul Dokumen'
                    ];
                    echo form_input($judulDokumen);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Nomer Box Document');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'nomer_box',
                      'id'    => 'nomer_box',
                      'value' => $inputs['nomer_box'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nomer Box Document'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label(' Jumlah Isi Document');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'isi_box',
                      'id'    => 'isi_box',
                      'value' => $inputs['isi_box'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Jumlah Isi Dari Box Document'
                    ];
                    echo form_input($nama);
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
                    echo form_label('Status Nota', 'status');
                    echo form_dropdown('status', ['' => 'Pilih', 'Masuk' => 'Masuk', 'Proses' => 'Proses', 'Keluar' => 'Keluar'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label(' Jumlah Isi Document');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'isi_box',
                      'id'    => 'isi_box',
                      'value' => $inputs['isi_box'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Jumlah Isi Dari Box Document'
                    ];
                    echo form_input($nama);
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
                    echo form_label('Status Nota', 'status');
                    echo form_dropdown('status', ['' => 'Pilih', 'Masuk' => 'Masuk', 'Proses' => 'Proses', 'Keluar' => 'Keluar'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal Keluar Document');
                    $tanggal_keluar = [
                      'type'  => 'date',
                      'name'  => 'tanggal_keluar',
                      'id'    => 'tanggal_keluar',
                      'value' => $inputs['tanggal_keluar'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan tanggal keluar Document'
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
            <a href="<?php echo base_url('documentkeluar'); ?>" class="btn btn-outline-info"><i class="nav-icon fas fa-backward"></i>Back</a>
            <button type="submit" class="btn btn-primary float-right"> <i class="nav-icon fas fa-save"></i> Simpan</button>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>