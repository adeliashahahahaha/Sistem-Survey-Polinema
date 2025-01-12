<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="polinema.png" alt="sispolin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISPOLIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
            Administrator
          </a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- <li class="nav-item">
            <a href="index.php" class="nav-link <?php //echo ($menu == 'beranda')? 'active' : '' ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="user.php" class="nav-link <?php echo ($menu == 'user')? 'active' : '' ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kategori.php" class="nav-link <?php echo ($menu == 'kategori')? 'active' : '' ?>">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="survey.php" class="nav-link <?php echo ($menu == 'survey')? 'active' : '' ?>">
              <i class="nav-icon far fa-clipboard"></i>
              <p>
                Data Survey
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="soal.php" class="nav-link <?php echo ($menu == 'form')? 'active' : '' ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Form Soal
              </p>
            </a>
          </li>         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Hasil Responden
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dosen.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tendik.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tenaga Pendidik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mahasiswa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="alumni.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alumni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ortu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orang Tua</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="industri.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Industri</p>
                </a>
            </ul>
          </li>
          <li class="nav-item">
            <a href="sbp/index.php" class="nav-link <?php echo ($menu == 'rekomendasi')? 'active' : '' ?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Analitik
              </p>
            </a>
          </li>         
          <li class="nav-item">
            <a href="model/session.php?act=logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>