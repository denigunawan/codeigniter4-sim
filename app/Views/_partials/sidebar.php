<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
        <img src="<?php echo base_url('hsrcc.png'); ?>" alt="HSRCC Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light text-red"><b>Division Engginer</b></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
            <img src="dist/img/default-150x150.png" class="img-fluid" width="100">
            </div> -->
            <div class="image">
                <h6 style="color:azure"><?php if (session()->get('level') == 1) {
                                            echo 'ADMIN';
                                        } elseif (session()->get('level') == 2) {
                                            echo 'TRANSLETER';
                                        } else {
                                            echo 'MANAJER';
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
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Data Document Masuk
                            <span class="badge badge-info right"><?php echo $total_documentmasuk ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Data Document Keluar
                            <span class="badge badge-info right"><?php echo $total_documentkeluar ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Nota Masuk
                            <span class="badge badge-info right"><?php echo $total_notamasuk ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Nota Keluar
                            <span class=" badge badge-info right"><?php echo $total_notakeluar ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Data Vendor
                            <span class="badge badge-info right"><?php echo $total_vendor ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-draw-polygon"></i>
                        <p>
                            Data Drawing Type
                            <span class="badge badge-info right"><?php echo $total_drawingtype ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-draw-polygon"></i>
                        <p>
                            Data Drawing Kode
                            <span class="badge badge-info right"><?php echo $total_drawingkode ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Data Jabatan
                            <span class="badge badge-info right"><?php echo $total_jabatan ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-file-contract"></i>
                        <p>
                            Data Rak
                            <span class="badge badge-info right"><?php echo $total_rak ?></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-language"></i>
                        <p>
                            Data Bahasa
                            <span class="badge badge-info right"><?php echo $total_bahasa ?></span>
                        </p>
                    </a>
                </li>


                <?php if (session()->get('level') == 1) { ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                Manager Area
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('/user'); ?>" class="nav-link">
                                    <i class="fas fa-user-lock nav-icon"></i>
                                    <p>Users Management
                                        <span class="badge badge-info right"><?php echo $total_user ?></span>

                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php  } ?>
            </ul>
        </nav>
    </div>
</aside>