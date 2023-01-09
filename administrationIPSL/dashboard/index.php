<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
    session_start();
    if($_SESSION['pseudo-admin'] == NULL){
      header('Location: ../admin/');
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
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/ipsl.ico" type="image/x-icon">
</head>
<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href=""><img src="../../images/ipsl.png" class="d-inline-block align-top"/></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="../../images/ipsl.png" class="d-inline-block align-top"/></a>
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
                <img src="../../images/profils/profil.png" alt="profile"/>
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
            <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                <i class="icon-ellipsis"></i>
                </a>
            </li> -->
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
                <a class="nav-link" href="">
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
                    <li class="nav-item"> <a class="nav-link" href="candidats/">Liste des candidats</a></li>
                    <li class="nav-item"> <a class="nav-link" href="modif-candidat/">Modification candidats</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="centres/">Liste des centres</a></li>
                    <li class="nav-item"><a class="nav-link" href="aj-mod-centre/">Ajout ou modification</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="candidatures/">Candidatures</a></li>
                    <li class="nav-item"> <a class="nav-link" href="validation/">Validation</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="admis/">Listes des admis</a></li>
                    <li class="nav-item"> <a class="nav-link" href="ajout-admis/">Ajouts des admis</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="sms-lu/">Messages lues</a></li>
                    <li class="nav-item"> <a class="nav-link" href="sms-non-lu/">Messages non lues</a></li>
                </ul>
                </div>
            </li>
            </ul>
            </nav>
            <?php
                $connexion = $db->prepare('SELECT * FROM administrateur WHERE pseudo = :pseudo');
                $connexion->execute([
                            'pseudo' => $_SESSION['pseudo-admin']
                        ]);
                $compte = $connexion->fetch();
                $connexion->closeCursor();
            ?>
            <!-- Lieu d'affichage des pages du dashboard -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">  Bienvenue <?= $compte['prenom'] ?> <?=$compte['nom'] ?></h3>
                            <h6 class="font-weight-normal mb-0">Système d'administration de la gestion des candidatures. Vous avez<span class="text-primary"> # alertes!</span></h6>
                            </div>
                            <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Aujourd'hui (<?= date("j F , Y") ?>)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">Janvier - Mars</a>
                                <a class="dropdown-item" href="#">Mars - Juin</a>
                                <a class="dropdown-item" href="#">Juin - Octobre</a>
                                <a class="dropdown-item" href="#">Octobre - Decembres</a>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                        <div class="card tale-bg">
                            <div class="card-people mt-auto">
                            <img src="../../images/eleve.png" alt="èleves ingénieurs">
                            
                            </div>
                        </div>
                        </div>

                        <?php
                            $nbcandidat = $db->prepare('SELECT count(id_candidat) as nb FROM candidat');
                            $nbcandidat->execute();
                            $nbcand = $nbcandidat->fetch();
                            $nbcandidat->closeCursor();
                        ?>

                        <?php
                            $nbcentre = $db->prepare('SELECT count(id) as nb FROM centre');
                            $nbcentre->execute();
                            $nbcent = $nbcentre->fetch();
                            $nbcentre->closeCursor();
                        ?>

                        <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                <p class="mb-4">Candidats</p>
                                <p class="fs-30 mb-2"><?= $nbcand["nb"] ?></p>
                                <p>10.00% (30 jours)</p>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                <p class="mb-4">Centres</p>
                                <p class="fs-30 mb-2"><?= $nbcent["nb"] ?></p>
                                </div>
                            </div>
                            </div>
                        </div>

                        <?php
                            $nbcontact = $db->prepare('SELECT count(id_contact) as nb FROM contact');
                            $nbcontact->execute();
                            $nbcont = $nbcontact->fetch();
                            $nbcontact->closeCursor();
                        ?>
                        <?php
                            $nbinscription = $db->prepare('SELECT count(id_inscription) as nb FROM inscription WHERE val_admin = :val');
                            $nbinscription->execute([
                              'val' => 0
                            ]);
                            $nbins = $nbinscription->fetch();
                            $nbinscription->closeCursor();
                        ?>

                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                <p class="mb-4">Messages des contacts</p>
                                <p class="fs-30 mb-2"><?= $nbcont["nb"] ?></p>
                                <p>2.00% (30 jours)</p>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                <p class="mb-4">Nouvelles inscriptions</p>
                                <p class="fs-30 mb-2"><?= $nbins["nb"] ?></p>
                                <p>0.22% (30 jours)</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- 2eme partie avec les deux graphiques déterministes -->
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <p class="card-title">Order Details</p>
                            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                            <div class="d-flex flex-wrap mb-5">
                                <div class="mr-5 mt-3">
                                <p class="text-muted">Order value</p>
                                <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                                </div>
                                <div class="mr-5 mt-3">
                                <p class="text-muted">Orders</p>
                                <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                                </div>
                                <div class="mr-5 mt-3">
                                <p class="text-muted">Users</p>
                                <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                                </div>
                                <div class="mt-3">
                                <p class="text-muted">Downloads</p>
                                <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                                </div> 
                            </div>
                            <canvas id="order-chart"></canvas>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <p class="card-title">Sales Report</p>
                            <a href="#" class="text-info">View all</a>
                            </div>
                            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                            <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- 3eme partie avec carroussel des graphiques -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                        <div class="card position-relative">
                            <div class="card-body">
                            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                                <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                        <div class="ml-xl-4 mt-3">
                                        <p class="card-title">Detailed Reports</p>
                                        <h1 class="text-primary">$34040</h1>
                                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                        <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                        </div>  
                                        </div>
                                    <div class="col-md-12 col-xl-9">
                                        <div class="row">
                                        <div class="col-md-6 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                            <table class="table table-borderless report-table">
                                                <tr>
                                                <td class="text-muted">Illinois</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Washington</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Mississippi</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">California</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Maryland</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Alaska</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <canvas id="north-america-chart"></canvas>
                                            <div id="north-america-legend"></div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                        <div class="ml-xl-4 mt-3">
                                        <p class="card-title">Detailed Reports</p>
                                        <h1 class="text-primary">$34040</h1>
                                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                        <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                        </div>  
                                        </div>
                                    <div class="col-md-12 col-xl-9">
                                        <div class="row">
                                        <div class="col-md-6 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                            <table class="table table-borderless report-table">
                                                <tr>
                                                <td class="text-muted">Illinois</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Washington</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Mississippi</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">California</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Maryland</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                                </tr>
                                                <tr>
                                                <td class="text-muted">Alaska</td>
                                                <td class="w-100 px-0">
                                                    <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <canvas id="south-america-chart"></canvas>
                                            <div id="south-america-legend"></div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face2.jpg" alt="image"/>
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face3.jpg" alt="image"/>
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face4.jpg" alt="image"/>
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face5.jpg" alt="image"/>
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face6.jpg" alt="image"/>
                          </td>
                          <td>
                            John Doe
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 123.21
                          </td>
                          <td>
                            April 05, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face7.jpg" alt="image"/>
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td>
                            June 16, 2015
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>