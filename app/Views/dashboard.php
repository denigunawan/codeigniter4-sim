<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><i class="fas fa-campground"></i> Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> <i class="fas fa-home"></i>
                Home</a></li>
            <li class="breadcrumb-item active"><i class="fas fa-campground"></i>
              Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="col-lg-12">
        <div class="card shadow-lg">
          <div class="card-header">
            <h5 class="m-0 text-center">Totaly Data Devision Engginer On HSRCC </h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Document Masuk</span>
                    <span class="info-box-number"><?php echo $total_documentmasuk ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Document Keluar</span>
                    <span class="info-box-number"><?php echo $total_documentkeluar ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Nota Masuk</span>
                    <span class="info-box-number"><?php echo $total_notamasuk ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Nota Keluar</span>
                    <span class="info-box-number"><?php echo $total_notakeluar ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Drawing Kode</span>
                    <span class="info-box-number"><?php echo $total_drawingkode ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Drawing Type</span>
                    <span class="info-box-number"><?php echo $total_drawingtype ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"> Data Jabatan</span>
                    <span class="info-box-number"><?php echo $total_jabatan  ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"> Data Rak</span>
                    <span class="info-box-number"><?php echo $total_rak ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"> Data Language</span>
                    <span class="info-box-number"><?php echo $total_bahasa ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"> Data Vendor </span>
                    <span class="info-box-number"><?php echo $total_vendor ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-danger shadow-lg elevation-1"><i class="fas fa-archive"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"> Data Users</span>
                    <span class="info-box-number"><?php echo $total_user ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
<?php echo view('_partials/footer'); ?>