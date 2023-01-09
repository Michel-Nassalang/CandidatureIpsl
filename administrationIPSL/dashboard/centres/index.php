<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
    session_start();
    if($_SESSION['pseudo-admin'] == NULL){
      header('Location: ../../admin/');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administration Candidature IPSL</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/ipsl.ico" type="image/x-icon">
</head>
<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href=""><img src="../../../images/ipsl.png" class="d-inline-block align-top"/></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="../../../images/ipsl.png" class="d-inline-block align-top"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                        <i class="icon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Recherche" aria-label="Recherche" aria-describedby="Recherche">
                    </div>
                </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="icon-bell mx-0"></i>
                <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                
                <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                        <i class="ti-info-alt mx-0"></i>
                    </div>
                    </div>
                    <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Informations</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                        Messages privés
                    </p>
                    </div>
                </a>
                <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                        <i class="ti-user mx-0"></i>
                    </div>
                    </div>
                    <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Nouvelles inscriptions</h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                        # personnes
                    </p>
                    </div>
                </a>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <!-- Profil administrateur -->
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="../../../images/profils/profil.png" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                    <i class="ti-settings text-primary"></i>
                    Paramètres
                </a>
                <a class="dropdown-item">
                    <i class="ti-power-off text-primary"></i>
                    Deconnexion
                </a>
                </div>
            </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
            </div>
        </nav>

        <!-- partial:partials/sidebar.html -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="../">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-candidats" aria-expanded="false" aria-controls="ui-candidats">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Candidats</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-candidats">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../candidats/">Liste des candidats</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../modif-candidat/">Modification candidats</a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-centre_exam" aria-expanded="false" aria-controls="ui-centre_exam">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Centres d'examen</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-centre_exam">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="../centres/">Liste des centres</a></li>
                    <li class="nav-item"><a class="nav-link" href="../aj-mod-centre/">Ajout ou modification</a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-candidature" aria-expanded="false" aria-controls="ui-candidature">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Dépôts de dossiers</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-candidature">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../candidatures/">Candidatures</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../validation/">Validation</a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-admission" aria-expanded="false" aria-controls="ui-admission">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Admissions</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-admission">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../admis/">Listes des admis</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../ajout-admis/">Ajouts des admis</a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-contact" aria-expanded="false" aria-controls="ui-contact">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Contacts</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-contact">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../sms-lu/">Messages lues</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../sms-non-lu/">Messages non lues</a></li>
                </ul>
                </div>
            </li>
            </ul>
            </nav>
            <!-- ---------------------- -->
            <?php
                $sql="SELECT * FROM centre";
                $requete = $db->prepare($sql);
                $requete->execute();
                $centres=$requete->fetchAll(); 
                $requete->closeCursor();           
            ?> 
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Liste des centres d'examen</h4>
                            <p class="card-description">
                                Centres<code> Examen</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th>Nom établissement</th>
                                    <th>Lieu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($centres as $centre): ?>
                                    <tr>
                                    <td><?= $centre['libelle'] ?></td>
                                    <td><?= $centre['lieu'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" onclick="window.location.href ='page-centre/?id= <?= $centre['id'] ?>';">Modifier</button>
                                    </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------- -->
        </div>
    </div>

    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../js/dashboard.js"></script>
    <script src="../js/Chart.roundedBarCharts.js"></script>
</body>
</html>