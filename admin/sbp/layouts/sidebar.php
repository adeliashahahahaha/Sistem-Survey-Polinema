<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="asset/LOGO POLITEKNIK NEGERI MALANG.png" alt="sispolin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISPOLIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
            SBP EDAS 
          </a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php echo ($menu == 'alternatif')? 'active' : '' ?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Data Alternatif
              </p>
            </a>
          </li>    
          <li class="nav-item">
            <a href="kriteria.php" class="nav-link <?php echo ($menu == 'kriteria')? 'active' : '' ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Data Kriteria
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="perhitungan.php" class="nav-link <?php echo ($menu == 'perhitungan')? 'active' : '' ?>">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Data Perhitungan
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="hasil.php" class="nav-link <?php echo ($menu == 'hasil')? 'active' : '' ?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Data Hasil Akhir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../user.php" class="nav-link <?php echo ($menu == 'kembali')? 'active' : '' ?>">
              <i class="nav-icon fas fa-arrow-circle-left"></i>
              <p>
                Kembali
              </p>
            </a>
          </li>         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>