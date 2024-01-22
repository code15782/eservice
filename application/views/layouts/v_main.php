<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= $base_url ?>pictures/logo_major.jpg">
  <link rel="icon" type="image/png" href="<?= $base_url ?>pictures/logo_major.jpg">
  <title>
    กรอบมาตราฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?= $base_url ?>templates/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= $base_url ?>templates/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= $base_url ?>templates/assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" integrity="sha512-rxThY3LYIfYsVCWPCW9dB0k+e3RZB39f23ylUYTEuZMDrN/vRqLdaCBo/FbvVT6uC2r0ObfPzotsfKF9Qc5W5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- main script -->
  <script>
    const configDatatable = {
      "responsive": false,
      "lengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "ทั้งหมด"]
      ],
      "language": {
        "lengthMenu": "แสดง _MENU_ แถว",
        "zeroRecords": "ไม่พบข้อมูล",
        "info": "กำลังแสดง หน้า _PAGE_ จาก _PAGES_",
        "infoEmpty": "ไม่มีข้อมูล",
        "search": "ค้นหา : "
      },
      "oLanguage": {
        "oPaginate": {
          "sFirst": "หน้าแรก", // This is the link to the first page
          "sPrevious": "ก่อน", // This is the link to the previous page
          "sNext": "หลัง", // This is the link to the next page
          "sLast": "หน้าสุดท้าย" // This is the link to the last page
        }
      }

    }
  </script>
</head>

<?php
if (isset($modal)) {
?>
  <!-- Modal -->
  <form action="<?= $path ?>" method="post">
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $modal['title'] ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= $modal['body'] ?>
          </div>
          <div class="modal-footer">
            <a href="<?= $modal['cancel_url'] ?>" type="button" class="btn bg-gradient-secondary"><?= $modal['cancel'] ?></a>
            <button type="submit" class="btn bg-gradient-success"><?= $modal['confirm'] ?></button>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php
}
?>

<body class="index-page bg-gray-200">

  <!-- navbar -->
  <?php
  if (isset($navbar_admin)) {
    echo $this->load->view('layouts/Admin/v_navbar', [], true);
  }
  ?>

  <?php
  if (isset($navbar_staff)) {
    echo $this->load->view('layouts/Staff/v_navbar', [], true);
  }
  ?>

  <?php
  if (isset($navbar_teacher)) {
    echo $this->load->view('layouts/Teacher/v_navbar', [], true);
  }
  ?>

  <?php if (isset($breadcrumbs)) { ?>
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <?php foreach ($breadcrumbs as $breadcrumb) { ?>
            <li class="breadcrumb-item"><a href="<?= $base_url . $breadcrumb['path'] ?>"><?= $breadcrumb['title'] ?></a></li>
          <?php } ?>
        </ol>
      </nav>
    </div>
  <?php } ?>


  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  <script>
    // Show full page LoadingOverlay
    $.LoadingOverlay("show");

    // Hide it after document ready 
    $(function() {
      $.LoadingOverlay("hide");
    });

    <?php
    if ($alert = $this->session->flashdata('alert')) {
    ?>
      Swal.fire({
        icon: '<?= $alert['icon'] ?>',
        title: '<?= $alert['title'] ?>',
        showConfirmButton: false,
        timer: 2500
      })
    <?php
    }
    ?>
  </script>

  <div class="<?= isset($no_body_class) ? '' : 'card card-body blur shadow-blur mx-3 mx-md-4' ?>">
    <?= $this->load->view($body, [], true) ?>
  </div>

  <!-- footer -->

  <!--   Core JS Files   -->
  <script src="<?= $base_url ?>templates/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?= $base_url ?>templates/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/countup.min.js"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/choices.min.js"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/prism.min.js"></script>
  <script src="<?= $base_url ?>templates/assets/js/plugins/highlight.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/rellax.min.js"></script>
  <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/tilt.min.js"></script>
  <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/choices.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="<?= $base_url ?>templates/assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?= $base_url ?>templates/assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
</body>

</html>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Prompt&display=swap');

  * {
    font-family: 'Prompt', sans-serif;
  }

  [id^="DataTables_Table_"]>label>input {
    border: 1px solid #d2d6da;
    border-radius: 5px;
  }
</style>