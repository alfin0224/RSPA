<?php 

if(function_exists('check_if_role_is')){
  if (check_if_role_is('pengelola')): ?>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-bell"></i>
        <!--     <span class="d-lg-none">Alerts -->
          <?php 
          foreach ($jml_notif as $j) { 
            if ($j->jml == 0) {

            } else {
              ?>
              <span class="badge badge-pill badge-warning">
                <?php
                echo $j->jml;
                ?> New
              </span>
              <!--     </span> -->
              <span class="indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
              </span>
              <?php 
            }
          }
          ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">Pendaftar Baru:</h6>
          <div class="dropdown-divider"></div>
          <?php 
          foreach ($jml_notif as $j) { 
            if ($j->jml == 0) { ?>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    Tidak ada Pendaftar
                  </strong>
                </span>
              </a>
              <div class="dropdown-divider"></div>
            <?php  } else {

              foreach ($pasien_pendaftar as $p) {
               ?>
               <a class="dropdown-item" href="<?php echo base_url('user_adm/pasien_pendaftar'); ?>">
                <span class="text-success">
                  <strong>
                    <?php echo $p->nama ?></strong>
                  </span>
                  <div class="dropdown-message small"><?php echo $p->jenis_penyakit ?></div>
                </a>
                <div class="dropdown-divider"></div>
              <?php } ?>
              <a class="dropdown-item small" href="<?php echo base_url('user_adm/pasien_pendaftar'); ?>">Lihat Semua Pendaftar</a>
              <?php 
            }
          }
          ?>
        </div>
      </li>

      <?php
    endif;
  }
  ?>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('user_adm/profil_admin'); ?>"><i class="fa fa-user"></i> My Profil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-fw fa-sign-out"></i>Logout</a>
    </li>
