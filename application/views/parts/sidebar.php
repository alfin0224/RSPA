      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        
        <?php if(function_exists('check_if_role_is')){
          if (check_if_role_is('sopir')): ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
              <a class="nav-link" href="<?php echo base_url('user_adm/rekap_operasional_ambulan'); ?>">
                <i class="fa fa-ambulance"></i>&nbsp
                <span class="nav-link-text">Ambulan</span>
              </a>
            </li>
            <?php else: ?>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo base_url('user_adm/'); ?>">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePendaftar" data-parent="#exampleAccordion">
                  <i class="fa fa-child" style="font-size:140%"></i>&nbsp
                  <span class="nav-link-text">Calon Pasien RSPA</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapsePendaftar">
                  <li>
                    <a href="<?php echo base_url('user_adm/pasien_pendaftar'); ?>">Pasien Pendaftar</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('user_adm/daftar_pasien_ditolak'); ?>">Pasien Ditolak</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePasienRSPA" data-parent="#exampleAccordion">
                  <i class="fa fa-child" style="font-size:140%"></i>&nbsp
                  <span class="nav-link-text">Pasien RSPA</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapsePasienRSPA">
                  <li>
                    <a href="<?php echo base_url('user_adm/pasien'); ?>">Daftar Pasien RSPA</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('user_adm/jadwal_inap_pasien'); ?>">Jadwal Inap Pasien</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('user_adm/riwayat_inap_pasien'); ?>">Riwayat Inap Pasien</a>
                  </li>
                </ul>
              </li>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseKelolaRSPA" data-parent="#exampleAccordion">
                  <i class="fa fa-archive"></i>&nbsp
                  <span class="nav-link-text">Kelola RSPA</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseKelolaRSPA">
                  <li>
                    <a href="<?php echo base_url('user_adm/kamar'); ?>">Kamar RSPA</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('user_adm/rekap_belanja'); ?>">Rekap Belanja</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('user_adm/aset'); ?>">Kelola Aset</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('user_adm/kelola_kontak'); ?>">Kelola Kontak</a>
                  </li>

                </ul>
              </li>
              
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                <a class="nav-link" href="<?php echo base_url('user_adm/rekap_operasional_ambulan'); ?>">
                  <i class="fa fa-ambulance"></i>&nbsp
                  <span class="nav-link-text">Ambulan</span>
                </a>
              </li>
            <?php endif;
          } ?>
        </ul>