  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-info elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>dashboard" class="brand-link navbar-info">
          <img src="<?= base_url() ?>assets/server-image/book.png" alt="AdminLTE Logo" class="brand-image">
          <span class="brand-text font-weight-light">SISFO Perpustakaan</span>
      </a>
      <?php
        $user = $this->session->userdata('server_library');

        if ($user['role'] == 'admin') {
            $nama = 'admin';
            $foto = 'admin.png';
            $path_file = 'server-image';
        } else {
            $path_file = 'server-image/dokumen-profile-petugas';
            $nama = $user['nama_petugas'];
            if ($user['jk'] == 'L') {
                $foto = 'L.png';
            } elseif ($user['jk'] == 'P') {
                $foto = 'P.png';
            } else {
                $foto = $user['foto_petugas'];
            }
        }


        ?>


      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= base_url('assets/' . $path_file . '/' . $foto) ?>" class="img-circle" alt="<?= $foto; ?>">
              </div>
              <div class="info">
                  <a href="<?= base_url() ?>dashboard" class="d-block"><?= $nama; ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->

          <nav class="mt-2">
              <ul class="nav nav-legacy nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="<?= base_url() ?>dashboard" class="nav-link <?php if ($aktif == 'dashboard') {
                                                                                echo "active";
                                                                            }  ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <?php
                    $user = $this->session->userdata('server_library');
                    if ($user['role'] == 'admin') { ?>
                      <li class="nav-item <?php if ($aktif == 'buku') {
                                                echo 'menu-open';
                                            } ?>">
                          <a href="#" class="nav-link <?php if ($aktif == 'buku') {
                                                            echo "active";
                                                        } ?>">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Buku
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?= base_url() ?>buku" class="nav-link <?php if ($tree_active == 'data-buku') {
                                                                                        echo "active";
                                                                                    } ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Buku</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?= base_url() ?>kategori" class="nav-link <?php if ($tree_active == 'data-kategori') {
                                                                                            echo "active";
                                                                                        } ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Kategori</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?= base_url() ?>penerbit" class="nav-link <?php if ($tree_active == 'data-penerbit') {
                                                                                            echo "active";
                                                                                        } ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Penerbit</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item <?php if ($aktif == 'siswa') {
                                                echo 'menu-open';
                                            } ?>">
                          <a href="#" class="nav-link <?php if ($aktif == 'siswa') {
                                                            echo "active";
                                                        } ?>">
                              <i class="nav-icon fas fa-user-graduate"></i>
                              <p>
                                  Siswa
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?= base_url() ?>siswa" class="nav-link <?php if ($tree_active == 'data-siswa') {
                                                                                        echo "active";
                                                                                    } ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Siswa</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?= base_url() ?>kelas" class="nav-link <?php if ($tree_active == 'data-kelas') {
                                                                                        echo "active";
                                                                                    } ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Kelas</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url() ?>lemari" class="nav-link <?php if ($aktif == 'lemari') {
                                                                                echo "active";
                                                                            } ?>">
                              <i class="nav-icon fas fa-inbox"></i>
                              <p>Lemari</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url() ?>petugas" class="nav-link <?php if ($aktif == 'petugas') {
                                                                                    echo "active";
                                                                                } ?>">
                              <i class="nav-icon fas fa-user-tie"></i>
                              <p>Petugas</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <?php
                            $user = $this->session->userdata('server_library');
                            $id     = $user['id_admin'];
                            ?>
                          <a href="<?= base_url('pengaturan-admin' . '/' . $id) ?>" class="nav-link <?php if ($aktif == 'cog-admin') {
                                                                                                        echo "active";
                                                                                                    } ?>">
                              <i class="nav-icon fas fa-cog"></i>
                              <p>Pengaturan Admin</p>
                          </a>
                      </li>
                  <?php } elseif ($user['role'] == 'petugas') { ?>
                      <li class="nav-item">
                          <a href="<?= base_url() ?>buku" class="nav-link <?php if ($aktif == 'buku') {
                                                                                echo "active";
                                                                            } ?>">
                              <i class="nav-icon fas fa-book"></i>
                              <p>Buku</p>
                          </a>
                      </li>
                      <li class="nav-item <?php if ($aktif == 'siswa') {
                                                echo 'menu-open';
                                            } ?>">
                          <a href="#" class="nav-link <?php if ($aktif == 'siswa') {
                                                            echo "active";
                                                        } ?>">
                              <i class="nav-icon fas fa-user-graduate"></i>
                              <p>
                                  Siswa
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?= base_url() ?>siswa" class="nav-link <?php if ($tree_active == 'data-siswa') {
                                                                                        echo "active";
                                                                                    } ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Siswa</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?= base_url() ?>kelas" class="nav-link <?php if ($tree_active == 'data-kelas') {
                                                                                        echo "active";
                                                                                    } ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Kelas</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="<?= base_url() ?>lemari" class="nav-link <?php if ($aktif == 'lemari') {
                                                                                echo "active";
                                                                            } ?>">
                              <i class="nav-icon fas fa-inbox"></i>
                              <p>Lemari</p>
                          </a>
                      </li>
                  <?php } ?>
                  <li class="nav-item">
                      <a href="<?= base_url() ?>rent" class="nav-link <?php if ($aktif == 'rent') {
                                                                            echo "active";
                                                                        } ?>">
                          <i class="nav-icon fas fa-book-reader"></i>
                          <p>Rent</p>
                      </a>
                  </li>
              </ul>
              <!-- /.sidebar -->

          </nav>

          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->

      <div class="sidebar-custom">
          <a href="<?= base_url() ?>signout" class="btn btn-danger hide-on-collapse pos-right"><i class="fas fa-sign-out-alt"></i> Signout</a>
      </div>
      <!-- /.sidebar-custom -->
  </aside>