  <!-- Navbar Dark -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark z-index-3 py-3 mb-3">
    <div class="container-fluid">
      <img src="<?= $base_url ?>pictures/logo_major.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" style="max-height: 2rem;">
      &nbsp;
      <a class="navbar-brand text-white" href="<?= $base_url ?>" rel="tooltip" title="Designed and Coded by jack" data-placement="bottom">
        กรอบมาตราฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ
      </a>
      <a href="<?= $base_url ?>Authen/logout" class="btn btn-sm  bg-gradient-primary  btn-round mb-0 ms-auto d-lg-none d-block">ออจากระบบ</a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto">

          <li class="nav-item mx-2">
            <a href="<?= $base_url ?>Eservice_course/index" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" role="button">
              บริหารจัดการหลักสูตร
            </a>
          </li>

          <li class="nav-item mx-2">
            <a href="<?= $base_url ?>Eservice_staff/index" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" role="button">
              ตั้งค่าข้อมูลพื้นฐาน มคอ.
            </a>
          </li>


        </ul>

        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <?php
            if ($this->session->userdata('id') != null) {
            ?>
              <span class="text-light">
                <i class="far fa-user-circle"></i>
                <?= $this->session->userdata('fullname')  ?> &nbsp;
              </span>
              <a href="<?= $base_url ?>Authen/logout" class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">ออกจากระบบ</a>
            <?php
            } else {
            ?>
              <a href="<?= $base_url ?>Authen/index" class="btn btn-sm  bg-gradient-success  mb-0 me-1 mt-2 mt-md-0">เข้าสู่ระบบ</a>
            <?php
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->