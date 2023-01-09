<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
    session_start();
    if($_SESSION['pseudo-admin'] == NULL){
      header('Location: ../../../admin/');
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
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  
    <link rel="stylesheet" href="../../../../css/style.css">
    <link rel="stylesheet" href="../../../../css/dossier.css">
    <link rel="stylesheet" href="../../../../css/themify-icons.css">
    <link rel="stylesheet" href="../../../../assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../css/pop_up.css">
    <link rel="stylesheet" href="../../../../css/candidat.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/ipsl.ico" type="image/x-icon">
</head>
<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href=""><img src="../../../../images/ipsl.png" class="d-inline-block align-top"/></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="../../../../images/ipsl.png" class="d-inline-block align-top"/></a>
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
                <img src="../../../../images/profils/profil.png" alt="profile"/>
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
                <a class="nav-link" href="../../">
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
                    <li class="nav-item"> <a class="nav-link" href="../../candidats/">Liste des candidats</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../modif-candidat/">Modification candidats</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="../../centres/">Liste des centres</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../aj-mod-centre/">Ajout ou modification</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="../../candidatures/">Candidatures</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../validation/">Validation</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="../../admis/">Listes des admis</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../ajout-admis/">Ajouts des admis</a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="../../sms-lu/">Messages lues</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../sms-non-lu/">Messages non lues</a></li>
                </ul>
                </div>
            </li>
            </ul>
            </nav>
            <!-- ---------------------- -->
            <div class="main-panel">
                <div class="content-wrapper">
                                <?php
                    $connexion = $db->prepare('SELECT * FROM candidat WHERE id_candidat = :id');
                    $connexion->execute([
                                'id' => $_GET['id']
                            ]);
                    $compte = $connexion->fetch();
                    $connexion->closeCursor();
                ?>
                <div class="container-fluid pl-5 tete">    
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-6 tout">
                            <div class="intro">
                                <a href="../">Liste des candidats</a>
                                <span>→</span>
                                <a href=""><?= $compte['prenom'] ?>  <?=$compte['nom'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-10 mt-3">
                        <div class="row profil">
                            <div class="ml-3">
                                <?php 
                                        $path1 = "../../../../images/profils/user_". $compte['pseudo'] . ".png";
                                        $path2 = "../../../../images/profils/user_". $compte['pseudo'] . ".jpg";
                                        $path3 = "../../../../images/profils/user_". $compte['pseudo'] . ".jpeg";
                                        ?>
                                        <?php
                                        if (file_exists($path1)) {
                                            ?>
                                            <div class="col-lg-6 col-md-7 col-sm-10">
                                                <img src="<?= $path1 ?>" alt="" class="img-thumbnail">
                                            </div>
                                            <?php 
                                        }elseif (file_exists($path2)) {
                                            ?>
                                            <div class="col-lg-8 col-md-7 col-sm-10">
                                                <img src="<?= $path2 ?>" alt="" class="img-thumbnail">
                                            </div>
                                            <?php 
                                        }elseif (file_exists($path3)) {
                                            ?>
                                            <div class="col-lg-8 col-md-7 col-sm-10">
                                                <img src="<?= $path3 ?>" alt="" class="img-thumbnail">
                                            </div>
                                            <?php 
                                        }else{
                                            ?>
                                            <div class="col-lg col-md-7 col-sm-10">
                                                <img src="../../../../images/profils/profil.png" alt="" class="img-thumbnail">
                                            </div>
                                            <?php 
                                        }
                                ?>
                            </div>
                            <div class="ml-3 mt-5">
                                <h4><?= $compte['prenom'] ?> <?= $compte['nom'] ?></h4>
                                <h5><?= $compte['pseudo'] ?></h5>
                            </div>
                        </div>
                        <div class="column mt-4">
                            <h6><span>Statut: </span><?= $compte['statut'] ?></h6>
                            <h6><span>Age: </span> <?= $compte['age'] ?> ans</h6>
                            <h6><span>CNI: </span> <?=($compte['cni']=="") ? "Indéfini" : $compte['cni']; ?></h6>
                            <h6><span>Genre: </span> <?= $compte['genre'] ?></h6>
                        </div>
                    </div>
                    <?php
                        $candidat = $db->prepare('SELECT * FROM dossier WHERE id_candidat = :id');
                        $candidat->execute([
                                    'id' => $compte['id_candidat']
                                ]);
                        $dossier = $candidat->fetch();
                        $ligne = $candidat->rowCount();
                        $candidat->closeCursor();
                    ?>
                    <div class="col-lg-4 col-md-5 col-sm-10 mt-3">
                        <div class="row contact ml-3">
                            <div class="col-8"><h3>Contacts</h3></div>
                            <div class="col-8"><h6><span>Email: </span> <?= $compte['email'] ?></h6></div>
                            <div class="col-8">
                                <h6><span>Telephone: </span>
                                <?= ($ligne!=1) ? "Indéfini" : $dossier['telephone'] ?>
                                </h6>
                            </div>
                            <div class="col-8">
                                <h6><span>Adresse: </span><?= ($ligne!=1) ? "Indéfini" : $dossier['adresse'] ?></h6>
                            </div>
                            <?php
                                $inscription = $db->prepare('SELECT * FROM inscription WHERE id_candidat = :id');
                                $inscription->execute([
                                            'id' => $compte['id_candidat']
                                        ]);
                                $inscris = $inscription->fetch();
                                $inscription->closeCursor();
                            ?>
                            <div class="col-8"><h6><span>Région: </span><?= $inscris['lieu'] ?></h6></div>
                        </div>
                    </div>
                </div>
                <?php
                    $candidat = $db->prepare('SELECT * FROM dossier WHERE id_candidat = :id');
                    $candidat->execute([
                        'id' => $_GET['id']
                    ]);
                    $dossier = $candidat->fetch();
                    $ligne_dossier = $candidat->rowCount();
                    $candidat->closeCursor();
                ?>
                <div class="container">
                    
                    <div class="row papiers">
                        <div class="col-lg-4 col-md-8 coordon">
                            <h3 class="ml-5">Coordonnées</h3>
                            
                                <div class="col-10 ml-5">
                                    <h6><span>Email: </span>
                                        <?= ($ligne_dossier!=1) ? "Indéfini" : $dossier['email'] ?>
                                    </h6>
                                </div>
                                <div class="col-10 ml-5">
                                    <h6><span>Telephone: </span>
                                    <?= ($ligne_dossier!=1) ? "Indéfini" : $dossier['telephone'] ?>
                                    </h6>
                                </div>
                                <div class="col-10 ml-5">
                                    <h6><span>Adresse: </span><?= ($ligne_dossier!=1) ? "Indéfini" : $dossier['adresse'] ?></h6>
                                </div>
                                <div class="col-10 ml-5">
                                    <h6><span>Centre d'examen: </span>
                                        <?= ($ligne_dossier!=1) ? "Indéfini" : $dossier['centre_examen'] ?>
                                    </h6>
                                </div>
                        </div>
                        <div class="col-lg-8 col-md-8 iden">
                            <div class="extrait mt-2 mb-2">
                                <?php if($ligne_dossier<1) {
                                ?>
                                <div class="image">
                                    <h5>Information non renseignée</h5>
                                </div>
                                <?php
                                }else{
                                    if($dossier['extrait_naissance'] != NULL){
                                ?>
                                <div class="image">
                                    <img class="img-fluid" src="../../../../images/extraits/<?= $dossier['extrait_naissance'] ?>" alt="">
                                </div>
                                <?php
                                    }else{
                                ?>
                                <div class="image">
                                    <h5>Extrait de naissance non renseigné</h5>
                                </div>
                                <?php
                                        }
                                    }
                                ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <h3 class="ml-5">Cursus</h3>
                    <div class="row cursus"  id="cursus">
                        <div class="col-lg-10">
                            <?php
                                $etude = $db->prepare('SELECT * FROM cursus WHERE id_candidat = :id');
                                $etude->execute([
                                    'id' => $_GET['id']
                                ]);
                                $cursus = $etude->fetchAll();
                                $ligne_cursus = $etude->rowCount();
                                $etude->closeCursor();
                                if ($ligne_cursus > 0) {
                                    foreach ($cursus as $classe => $value) {
                                        ?>
                                    <div class="row classe" id="classe<?= $value['id_cursus'] ?>">
                                        <div class="my-5">
                                                <div class="clagau">
                                                    <h6><span>Classe: </span>
                                                        <?= ($value['classe'] === NULL) ? "Indéfini" : $value['classe'] ?>
                                                    </h6>
                                                </div>
                                                <div class="clagau">
                                                    <h6><span>Serie: </span>
                                                        <?= ($value['serie'] === NULL) ? "Indéfini" : $value['serie'] ?>
                                                    </h6>
                                                </div>
                                                <div class="clagau">
                                                    <h6><span>Etablissement: </span>
                                                        <?= ($value['etablissement'] === NULL) ? "Indéfini" : $value['etablissement'] ?>
                                                    </h6>
                                                </div>
                                                <div class="clagau">
                                                    <h6><span>Année scolaire: </span>
                                                        <?= ($value['annee'] === NULL) ? "Indéfini" : $value['annee'] ?>
                                                    </h6>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                </div>
                                        </div>
                                        <?php
                                            $etude = $db->prepare('SELECT * FROM bulletin WHERE id_cursus = :id ORDER BY semestre');
                                            $etude->execute([
                                                'id' => $value['id_cursus']
                                            ]);
                                            $bulletins = $etude->fetchAll();
                                            $ligneb = $etude->rowCount();
                                            $etude->closeCursor();
                                            if ($ligneb > 1) {
                                                foreach ($bulletins as $bulletins => $bulletin) {
                                        ?>
                                        <div class="d-flex align-items-center justify-content-center col-lg-4 col-md-8 col-sm-10" id="bulletin_<?= $value['id_cursus'] ?>">
                                            <?php
                                                    if ($bulletin['bulletin'] !== NULL) {
                                                    ?>
                                                        <div class="col-lg-12 my-4">
                                                            <a href="#pushUp_<?= $value['classe'].'_'?>"><img class="img-fluid" src="../../../../images/bulletins/<?= $bulletin['bulletin'] ?>" alt="Image du bulletin de <?= $value['classe'] ?>"></a>
                                                        </div>
                                                        <div class="pushUp" id="pushUp_<?= $value['classe'].'_'?>">
                                                            <div class="pushUp-inner">
                                                                <a aria-label="image" class="pushUp-close" href="#travail"><img src="../../../../images/close.svg" alt=""></a>
                                                                <div class="pushUp-content"><img class="pushUp-image" id="pushUp-image" src="../../images/bulletins/<?= $bulletin['bulletin'] ?>" alt=""></div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                            ?>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                        <div class="trait"></div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                        
                                } 
                                
                            ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- ---------------------- -->
        </div>
    </div>

    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/Chart.roundedBarCharts.js"></script>
</body>
</html>