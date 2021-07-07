<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
        <img src="<?php echo base_url('hsrcc.png'); ?>" alt="HSRCC Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light text-red"><b>Division Engginer</b></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <h6 style="color:azure"><?php if (session()->get('level') == 1) {
                                            echo 'Manager';
                                        } elseif (session()->get('level') == 2) {
                                            echo 'Translator';
                                        } elseif (session()->get('level') == 3) {
                                            echo "Staff Engginer";
                                        } else {
                                            echo 'Developer';
                                        } ?></h6>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('nama_user'); ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('/'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-campground"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php if(session()->get('level') == 3 || session()->get('level') == 1) { ?> 
                <li class="nav-item">
                    <a href="<?php echo base_url('documentmasuk'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Data Document Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('documentkeluar'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Data Document Keluar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('notamasuk'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Nota Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('notakeluar'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Nota Keluar
                        </p>
                    </a>
                </li>
                <?php } ?>
                    
                    <?php if(session()->get('level') == 1)  { ?>
                    <li class="nav-item ">
                        <a href="<?php echo base_url('users'); ?>" class="nav-link">
                            <i class="fas fa-user-lock nav-icon"></i>
                            <p>Users Management</p>
                        </a>
                    </li>

                 <li class="nav-item">
                    <a href="<?php echo base_url('karyawan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <?php } ?>
                <?php if(session()->get('level') == 2) { ?> 
                <li class="nav-item">
                    <a href="<?php echo base_url('documentmasuk/laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reports Docs Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('documentkeluar/laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reports Docs Keluar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('notamasuk/laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reports Nota Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('notakeluar/laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reports Nota Keluar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('users/laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reports Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('karyawan/laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reports Data Karyawan
                        </p>
                    </a>
                </li>
                <?php  } ?>
            </ul>
        </nav>
    </div>
</aside>