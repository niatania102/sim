<?php
$page = $_GET['page'];
$nrp = $_GET['id'];

include "../database/config.php";

$namaResult = "";
$nrpResult = "";
$thnTerimaResult = "";
$tglLahirResult = "";
$emailResult = "";
$ipkResult = 0.001;
$idProdiResult = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="" rel="icon">
  <title>Uji Program SIM - <?=ucfirst($page)?> Data Mahasiswa</title>
  <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../template/css/ruang-admin.min.css" rel="stylesheet">
  <!-- Bootstrap DatePicker -->
  <link href="../template/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="">
        </div>
        <div class="sidebar-brand-text mx-3">Ujicoba SIM</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Bootstrap UI</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bootstrap UI</h6>
            <a class="collapse-item" href="alerts.html">Alerts</a>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
            <a class="collapse-item" href="modals.html">Modals</a>
            <a class="collapse-item" href="popovers.html">Popovers</a>
            <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
          </div>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse show" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item active" href="index.php">Data Mahasiswa</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=ucfirst($page)?> Data Mahasiswa</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
            </ol>
          </div>

          <div class="">
            <div class="">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?=ucfirst($page)?> Data Mahasiswa</h6>
                </div>
                <div class="card-body">
                <?php
                    $stmt = $conn->prepare("SELECT * FROM mahasiswa");
                    $stmt->execute();
                    $res = $stmt->get_result();
                    while($row=$res->fetch_assoc()) {
                        if(md5($row['Nrp'])==$nrp){ //check if NRP exists
                            $nrpResult = $row['Nrp'];
                            $thnTerimaResult = $row['ThnTerima'];
                            $namaResult = $row['Nama'];
                            $tglLahirResult = $row['TglLahir'];
                            $emailResult = $row['Email'];
                            $ipkResult = $row['Ipk'];
                            $idProdiResult = $row['IdProdi'];
                            break;
                        }
                    }
                ?>
                    <form role="form" method="post" action="../database/updateInsertMahasiswa.php?page=<?=$page?>">
                    <?php if($page!="tambah"){?>
                        <div class="form-group">
                        <label for="exampleInputNrp1">NRP</label>
                        <input type="text" disabled class="form-control" id="nrp" name="nrp" aria-describedby="nrpHelp" required="required"
                        <?php if($nrpResult!="") echo 'value="'.$nrpResult.'"';?>>
                        <small id="nrpHelp" class="form-text text-muted">NRP Mahasiswa.</small>
                        </div>
                    <?php }?>
                        <div class="form-group">
                        <label for="exampleInputThnTerima1">Tahun Terima</label>
                        <input type="text" class="form-control" id="thnTerima" name="thnTerima" required="required" aria-describedby="thnTerimaHelp"
                            placeholder="Masukkan Tahun Terima Mahasiswa" <?php if($thnTerimaResult!="") echo 'value="'.$thnTerimaResult.'"';?> >
                        <small id="thnTerimaHelp" class="form-text text-muted">Tahun Terima Mahasiswa.</small>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputNama1">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" required="required" aria-describedby="namaHelp"
                            placeholder="Masukkan Nama Mahasiswa" <?php if($namaResult!="") echo 'value="'.$namaResult.'"';?>
                        <small id="namaHelp" class="form-text text-muted">Nama Mahasiswa.</small>
                        </div>
                        <div class="form-group" id="simple-date2">
                            <label for="tglLahir">Tanggal Lahir Mahasiswa</label>
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" required="required" <?php if($tglLahirResult!="") echo 'value="'.$tglLahirResult.'"';?> id="tglLahir" name="tglLahir">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            placeholder="Masukkan email" <?php if($emailResult!="") echo 'value="'.$emailResult.'"';?>>
                        <small id="emailHelp" class="form-text text-muted">Masukkan Email Mahasiswa.</small>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">IPK Mahasiswa</label>
                        <input type="number" class="form-control" id="ipk" name="ipk" step=".001" required="required" placeholder="Masukkan IPK Mahasiswa" <?php if($ipkResult!="") echo 'value="'.$ipkResult.'"';?>>
                        </div>
                        <div class="form-group">
                            <label for="select2SinglePlaceholder">Pilih Program Studi Mahasiswa</label>

                            <select class="select2-single-placeholder form-control" name="idProdi" required="required" id="idProdi">
                                <option value="">Select</option>
                            <?php
                            $stmt2 = $conn->prepare("SELECT * FROM prodi");
                            $stmt2->execute();
                            $res2 = $stmt2->get_result();
                            while($row2=$res2->fetch_assoc()) {
                            ?>
                                <option value="<?=$row2['IdProdi']?>" <?php if($row2['IdProdi'] == $idProdiResult) echo 'selected';?>><?=$row2['Nama']?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
            </div>

          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div>

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../template/vendor/jquery/jquery.min.js"></script>
  <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../template/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../template/js/ruang-admin.min.js"></script>
  <!-- Bootstrap Datepicker -->
  <script src="../template/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('#simple-date2 .input-group.date').datepicker({
        startView: 1,
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        todayBtn: 'linked',
      });
  </script>
</body>

</html>