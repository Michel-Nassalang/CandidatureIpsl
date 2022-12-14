<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
    session_start();
    if(!isset($_SESSION['pseudo'])){
       header('Location: ../connexion/');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/dossier.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/pop_up.css">
    <title>Mon dossier</title>
    <link rel="shortcut icon" href="../../images/ipsl.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../../">
                <img src="../../images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <li class="nav-item active">
                        <a class="nav-link" href="../../">Acceuil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../../candidat/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Candidat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../candidat/">Mon compte</a>
                        <a class="dropdown-item" href="../../candidat/connexion/">Connexion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../candidat/dossier/">Mes dossiers</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../../informations/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informations
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../informations/">Acceuil</a>
                        <a class="dropdown-item" href="../../informations/formation/">Formations</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../informations/admission/">Admission</a>
                        </div>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../contact/">Contact</a>
                </li>
            </div>
        </nav>
    </header>
    <?php
        $connexion = $db->prepare('SELECT * FROM candidat WHERE id_candidat = :id');
        $connexion->execute([
                    'id' => $_SESSION['id']
                ]);
        $compte = $connexion->fetch();
        $connexion->closeCursor();
    ?>
    <div class="container-fluid pl-5 tete">    
        <div class="row align-items-center justify-content-center fact">
            <div class="col-lg-8 col-md-8 col-sm-6 tout">
                <div class="intro">
                    <a href="../../">Acceuil</a>
                    <span>???</span>
                    <a href="">Dossiers de <?= $compte['prenom'] ?> <?=$compte['nom'] ?></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-2 deconnex">
                <a href="../"><i class="ti-user"></i> <span>Compte</span></a>
                <a href="../connexion/deconnexion.php"><i class="ti-power-off"></i> <span>Deconnexion</span></a>
            </div>
        </div>
    </div>
    <?php
        $candidat = $db->prepare('SELECT * FROM dossier WHERE id_candidat = :id');
        $candidat->execute([
            'id' => $_SESSION['id']
        ]);
        $dossier = $candidat->fetch();
        $ligne_dossier = $candidat->rowCount();
        $candidat->closeCursor();
    ?>
    <div class="container">
        <h1 class="title mt-3">Mes dossiers</h1>
        <div class="row papiers">
            <div class="col-lg-4 col-md-8 coordon">
                <h3 class="ml-5">Mes coordonn??es</h3>
                <?php if(isset($_GET["coordonnees"]) && $_GET["coordonnees"]==$_SESSION['pseudo'])
                {
                ?> 
                    <form action="" method="post">
                        <div class="col-10 ml-5 form-group">
                            <input type="text" name="email" class="form-control" placeholder="<?= ($ligne_dossier!=1) ? "Email" : $dossier['email'] ?>" value="<?= ($ligne_dossier!=1) ? "Email" : $dossier['email'] ?>" required>
                        </div>
                        <div class="col-10 ml-5 form-group">
                            <input type="text" name="telephone" class="form-control" placeholder="<?= ($ligne_dossier!=1) ? "Telephone" : $dossier['telephone'] ?>" value="<?= ($ligne_dossier!=1) ? "Telephone" : $dossier['telephone'] ?>" required>
                        </div>
                        <div class="col-10 ml-5 form-group">
                            <input type="text" name="adresse" class="form-control" placeholder="<?= ($ligne_dossier!=1) ? "Adresse" : $dossier['adresse'] ?>" value="<?= ($ligne_dossier!=1) ? "Adresse" : $dossier['adresse'] ?>" required>
                        </div>
                            <div class=" col-10 ml-5 form-group">
                                <input type="text" name="centre" class="form-control" placeholder="<?= ($ligne_dossier!=1) ? "Centre Examen" : $dossier['centre_examen'] ?>" value="<?= ($ligne_dossier!=1) ? "Centre Examen" : $dossier['centre_examen'] ?>">
                            </div>
                        <div class="col-10 ml-5 form-group">
                            <input type="submit" name="subcoor" class="btn btn-primary"class="form-control">
                        </div>
                    </form>
                <?php
                if($ligne_dossier < 1){
                    if(isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse']) && isset($_POST['centre']) &&
                        !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['adresse']) && !empty($_POST['centre'])){
                        $email = htmlspecialchars($_POST['email']);
                        $telephone = htmlspecialchars($_POST['telephone']);
                        $adresse = htmlspecialchars($_POST['adresse']);
                        $centre = htmlspecialchars($_POST['centre']);

                        $insertion_c = $db->prepare('INSERT INTO dossier(email, telephone, adresse, centre_examen, id_candidat) VALUES (:email, :telephone, :adresse, :centre, :id)');
                        $insertion_c->execute([
                            "email" => $email,
                            "telephone" => $telephone,
                            "adresse" => $adresse,
                            "centre" => $centre,
                            "id" => $_SESSION['id']
                        ]);
                        $insertion_c->closeCursor();
                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                    }
                }else{
                    if(isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse']) && isset($_POST['centre']) &&
                        !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['adresse']) && !empty($_POST['centre'])){
                        $email = htmlspecialchars($_POST['email']);
                        $telephone = htmlspecialchars($_POST['telephone']);
                        $adresse = htmlspecialchars($_POST['adresse']);
                        $centre = htmlspecialchars($_POST['centre']);

                        $insertion_c = $db->prepare('UPDATE dossier SET email = :email, telephone = :telephone, adresse = :adresse, centre_examen = :centre WHERE id_candidat = :id');
                        $insertion_c->execute([
                            "email" => $email,
                            "telephone" => $telephone,
                            "adresse" => $adresse,
                            "centre" => $centre,
                            "id" => $_SESSION['id']
                        ]);
                        $insertion_c->closeCursor();
                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                    }
                }
                }else {
                ?>
                    <div class="col-10 ml-5">
                        <h6><span>Email: </span>
                            <?= ($ligne_dossier!=1) ? "Ind??fini" : $dossier['email'] ?>
                        </h6>
                    </div>
                    <div class="col-10 ml-5">
                        <h6><span>Telephone: </span>
                        <?= ($ligne_dossier!=1) ? "Ind??fini" : $dossier['telephone'] ?>
                        </h6>
                    </div>
                    <div class="col-10 ml-5">
                        <h6><span>Adresse: </span><?= ($ligne_dossier!=1) ? "Ind??fini" : $dossier['adresse'] ?></h6>
                    </div>
                    <div class="col-10 ml-5">
                        <h6><span>Centre d'examen: </span>
                            <?= ($ligne_dossier!=1) ? "Ind??fini" : $dossier['centre_examen'] ?>
                        </h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="?coordonnees=<?= $_SESSION['pseudo'] ?>"><h5><i class="ti-pencil-alt"></i></h5></a>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-lg-8 col-md-8 iden">
                <h3 class="ml-5">Identification</h3>
                <?php if(isset($_GET["extrait"]) && $_GET["extrait"]==$_SESSION['pseudo'])
                    {
                    ?>
                        <form action="" method="post" enctype="multipart/form-data" class="mt-2 mb-2 mx-5">
                            <div class="form-group">
                                <label for="image"><input type="file" name="extrait" class="upload_box form-control" class="form-control">
                            </div>
                            <input type="submit" name="subextr" class="btn btn-primary"class="form-control">
                        </form>
                    <?php 
                        if($ligne_dossier < 1){
                            if (isset($_FILES['extrait']) && $_FILES['extrait']['error'] == 0) {
                                    if ($_FILES['extrait']['size'] <= 5000000) {
                                        $info_fichier = pathinfo($_FILES['extrait']['name']);
                                        $extension_fichier = $info_fichier['extension'];
                                        $auto_extension = array('jpg', 'png', 'jpeg');
                                        if (in_array($extension_fichier, $auto_extension)) {
                                            $img = $_FILES['extrait']['tmp_name'];
                                            if ($extension_fichier === 'png') {
                                                move_uploaded_file($img, '../../images/extraits/'.basename('extrait_'. $_SESSION['pseudo'] . '.png'));
                                                $insertion_extrait = $db->prepare('INSERT INTO dossier(extrait_naissance, id_candidat) VALUES (:extrait, :id)');
                                                $insertion_extrait->execute([
                                                    'extrait' => 'extrait_'. $_SESSION['pseudo'] . '.png',
                                                    'id' => $_SESSION['id']
                                                ]);
                                                $insertion_extrait->closeCursor();
                                                echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                            } else {
                                                move_uploaded_file($img, '../../images/extraits/'.basename('extrait_'. $_SESSION['pseudo'] . '.jpg'));
                                                $insertion_extrait = $db->prepare('INSERT INTO dossier(extrait_naissance, id_candidat) VALUES (:extrait, :id)');
                                                $insertion_extrait->execute([
                                                    'extrait' => 'extrait_'. $_SESSION['pseudo'] . '.jpg',
                                                    'id' => $_SESSION['id']
                                                ]);
                                                $insertion_extrait->closeCursor();
                                                echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                            }
                                        }
                                        else {
                                            echo '<p>Veuillez ins??rer une image de format png, jpg ou jpeg.</p>';
                                        }
                                    }
                                    else {
                                        echo '<p>Veuillez ins??rer une image de plus petite taille.</p>';
                                    }
                            }
                        }else{
                            if (isset($_FILES['extrait']) && $_FILES['extrait']['error'] == 0) {
                                    if ($_FILES['extrait']['size'] <= 5000000) {
                                        $info_fichier = pathinfo($_FILES['extrait']['name']);
                                        $extension_fichier = $info_fichier['extension'];
                                        $auto_extension = array('jpg', 'png', 'jpeg');
                                        if (in_array($extension_fichier, $auto_extension)) {
                                            $img = $_FILES['extrait']['tmp_name'];
                                            if ($extension_fichier === 'png') {
                                                move_uploaded_file($img, '../../images/extraits/'.basename('extrait_'. $_SESSION['pseudo'] . '.png'));
                                                $insertion_extrait = $db->prepare('UPDATE dossier SET extrait_naissance = :extrait WHERE id_candidat = :id');
                                                $insertion_extrait->execute([
                                                    'extrait' => 'extrait_'.$_SESSION['pseudo'] . '.png',
                                                    'id' => $_SESSION['id']
                                                ]);
                                                $insertion_extrait->closeCursor();
                                                echo '<p>Extrait ajout??.</p>';
                                                echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                            } else {
                                                move_uploaded_file($img, '../../images/extraits/'.basename('extrait_'. $_SESSION['pseudo'] . '.jpg'));
                                                $insertion_extrait = $db->prepare('UPDATE dossier SET extrait_naissance = :extrait WHERE id_candidat = :id');
                                                $insertion_extrait->execute([
                                                    'extrait' => 'extrait_'.$_SESSION['pseudo'] . '.jpg',
                                                    'id' => $_SESSION['id']
                                                ]);
                                                $insertion_extrait->closeCursor();
                                                echo '<p>Extrait mis ?? jour.</p>';
                                                echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                            }
                                        }
                                        else {
                                            echo '<p>Veuillez ins??rer une image de format png, jpg ou jpeg.</p>';
                                        }
                                    }
                                    else {
                                        echo '<p>Veuillez ins??rer une image de plus petite taille.</p>';
                                    }
                            }
                        }
                    }else{
                    ?>
                    <div class="extrait mt-2 mb-2">
                        <?php if($ligne_dossier<1) {
                        ?>
                        <a href="?extrait=<?= $_SESSION['pseudo'] ?>" class="btn btn-secondary">Charger mon extrait </a>
                        <?php
                        }else{
                            if($dossier['extrait_naissance'] != NULL){
                        ?>
                        <div class="image">
                            <img class="img-fluid" src="../../images/extraits/<?= $dossier['extrait_naissance'] ?>" alt="">
                        </div>
                        <?php
                            }else{
                        ?>
                        <a href="?extrait=<?= $_SESSION['pseudo'] ?>" class="btn btn-secondary">Charger mon extrait </a>
                        <?php
                                }
                            }
                        ?>
                        </h6>
                    </div>
                    <?php
                    }
                    ?>
            </div>
        </div>
        <h1 class="title mt-3">Mon cursus</h1>
        <div class="row cursus"  id="cursus">
            <div class="col-lg-10">
                <?php
                    $etude = $db->prepare('SELECT * FROM cursus WHERE id_candidat = :id');
                    $etude->execute([
                        'id' => $_SESSION['id']
                    ]);
                    $cursus = $etude->fetchAll();
                    $ligne_cursus = $etude->rowCount();
                    $etude->closeCursor();
                    if ($ligne_cursus > 0) {
                        foreach ($cursus as $classe => $value) {
                            ?>
                        <div class="row classe" id="classe<?= $value['id_cursus'] ?>">
                            <div class="my-5">
                                <?php
                                if (isset($_GET["cursus"]) && $_GET["cursus"]==$_SESSION['pseudo'].'_'.$value['id_cursus']) {
                                    ?>
                                    <form action="" method="post">
                                        <div class="col-10 ml-5 form-group">
                                            <input type="text" name="classe" class="form-control" value="<?= ($value['classe'] === NULL) ? "Classe" : $value['classe'] ?>" required>
                                        </div>
                                        <div class="col-10 ml-5 form-group">
                                            <input type="text" name="serie" class="form-control" value="<?= ($value['serie'] === NULL) ? "S??rie" : $value['serie'] ?>" required>
                                        </div>
                                        <div class="col-10 ml-5 form-group">
                                            <input type="text" name="etablissement" class="form-control" value="<?= ($value['etablissement'] === NULL) ? "Etablissement" : $value['etablissement'] ?>" required>
                                        </div>
                                        <div class="col-10 ml-5 form-group">
                                            <input type="text" name="annee" class="form-control" value="<?= ($value['annee'] === NULL) ? "Ann??e" : $value['annee'] ?>" required>
                                        </div>
                                        <div class="col-10 ml-5 form-group">
                                            <input type="submit" name="subcur" class="btn btn-primary"class="form-control">
                                        </div>
                                    </form>
                                    <?php
                                    if(isset($_POST['classe']) && isset($_POST['serie']) && isset($_POST['etablissement']) && isset($_POST['annee'])
                                        && !empty($_POST['classe']) && !empty($_POST['serie']) && !empty($_POST['etablissement']) && !empty($_POST['annee'])){
                                        $classe = htmlspecialchars($_POST['classe']);
                                        $serie = htmlspecialchars($_POST['serie']);
                                        $etablissement = htmlspecialchars($_POST['etablissement']);
                                        $annee = htmlspecialchars($_POST['annee']);
                                        $insertion_cursus = $db->prepare('UPDATE cursus SET classe = :classe, serie = :serie, etablissement = :etablissement, annee = :annee WHERE id_candidat = :id AND id_cursus = :id_cursus');
                                        $insertion_cursus->execute([
                                            'classe' => $classe,
                                            'serie' => $serie,
                                            'etablissement' => $etablissement,
                                            'annee' => $annee,
                                            'id_cursus' => $value['id_cursus'],
                                            'id' => $compte['id_candidat']
                                        ]);
                                        $insertion_cursus->closeCursor();
                                        echo '<p>Cursus mis ?? jour</p>';
                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    
                                    }
                                } else {
                                    ?>
                                    <div class="clagau">
                                        <h6><span>Classe: </span>
                                            <?= ($value['classe'] === NULL) ? "Ind??fini" : $value['classe'] ?>
                                        </h6>
                                    </div>
                                    <div class="clagau">
                                        <h6><span>Serie: </span>
                                            <?= ($value['serie'] === NULL) ? "Ind??fini" : $value['serie'] ?>
                                        </h6>
                                    </div>
                                    <div class="clagau">
                                        <h6><span>Etablissement: </span>
                                            <?= ($value['etablissement'] === NULL) ? "Ind??fini" : $value['etablissement'] ?>
                                        </h6>
                                    </div>
                                    <div class="clagau">
                                        <h6><span>Ann??e scolaire: </span>
                                            <?= ($value['annee'] === NULL) ? "Ind??fini" : $value['annee'] ?>
                                        </h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="?cursus=<?= $_SESSION['pseudo']. '_'. $value['id_cursus'] ?>#classe<?= $value['id_cursus'] ?>"><h5><i class="ti-pencil-alt"></i></h5></a>
                                    </div>
                                    <?php
                                }
                                ?>
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
                                    if (isset($_GET["bulletin"]) && $_GET["bulletin"]==$_SESSION['pseudo']. '_'. $value['id_cursus']) {
                                        ?>
                                            <form action="" method="post" enctype="multipart/form-data" class="mb-5 mx-5">
                                                <div class="form-group">
                                                    <input type="text" name="semestre" class="form-control" placeholder="<?= ($bulletin['semestre'] === NULL) ? "Semestre" : $bulletin['semestre'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image"><input type="file" name="bulletin" class="upload_box form-control" class="form-control">
                                                </div>
                                                <input type="submit" name="subbull" class="btn btn-primary"class="form-control">
                                            </form>
                                        <?php
                                        if (isset($_FILES['bulletin']) && $_FILES['bulletin']['error'] == 0) {
                                            if ($_FILES['bulletin']['size'] <= 5000000) {
                                                $info_fichier = pathinfo($_FILES['bulletin']['name']);
                                                $extension_fichier = $info_fichier['extension'];
                                                $auto_extension = array('jpg', 'png', 'jpeg');
                                                if (in_array($extension_fichier, $auto_extension)) {
                                                    $img = $_FILES['bulletin']['tmp_name'];
                                                    if ($extension_fichier === 'png') {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'.$value['classe']. $semestre.'_'. $_SESSION['pseudo'] . '.png'));
                                                        $insertion_bulletin = $db->prepare('UPDATE bulletin SET bulletin = :bulletin WHERE id_cursus = :id');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'.$value['classe']. $semestre.'_'. $_SESSION['pseudo'] . '.png',
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    
                                                    } else {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'.$value['classe']. $semestre.'_'. $_SESSION['pseudo'] . '.jpg'));
                                                        $insertion_bulletin = $db->prepare('UPDATE bulletin SET bulletin = :bulletin WHERE id_candidat = :id');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'.$value['classe']. $semestre.'_'. $_SESSION['pseudo'] . '.jpg',
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    
                                                    }
                                                }
                                                else {
                                                    echo '<p>Veuillez ins??rer une image de format png, jpg ou jpeg.</p>';
                                                }
                                            }
                                            else {
                                                echo '<p>Veuillez ins??rer une image de plus petite taille.</p>';
                                            }
                                        }
                                    }else{
                                        if ($bulletin['bulletin'] !== NULL) {
                                        ?>
                                            <div class="col-lg-12 my-4">
                                                <a href="#pushUp_<?= $value['classe'].'_'?>"><img class="img-fluid" src="../../images/bulletins/<?= $bulletin['bulletin'] ?>" alt="Image du bulletin de <?= $value['classe'] ?>"></a>
                                            </div>
                                            <div class="pushUp" id="pushUp_<?= $value['classe'].'_'?>">
                                                <div class="pushUp-inner">
                                                    <a aria-label="image" class="pushUp-close" href="#travail"><img src="../../images/close.svg" alt=""></a>
                                                    <div class="pushUp-content"><img class="pushUp-image" id="pushUp-image" src="../../images/bulletins/<?= $bulletin['bulletin'] ?>" alt=""></div>
                                                </div>
                                            </div>
                                        <?php
                                        }else{
                                        ?>
                                            <div class="renseign">
                                                <a href="?bulletin=<?= $_SESSION['pseudo'].'_'. $value['id_cursus']?>#bulletin_<?= $value['id_cursus'] ?>" class="btn btn-primary mt-4 mb-4">fournir un bulletin</a>
                                            </div>
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                            <?php
                                }
                            }elseif ($ligneb == 1) {
                                foreach ($bulletins as $bulletins => $bulletin) {
                                ?>
                                <div class="d-flex align-items-center justify-content-center col-lg-4 col-md-8 col-sm-10" id="bulletin_<?= $value['id_cursus'] ?>">
                                <?php
                                    ?>
                                            <div class="col-lg-12 my-4">
                                                <a href="#pushUp_<?= $value['classe'].'_'?>"><img class="img-fluid" src="../../images/bulletins/<?= $bulletin['bulletin'] ?>" alt="Image du bulletin de <?= $value['classe'] ?>"></a>
                                            </div>
                                            <div class="pushUp" id="pushUp_<?= $value['classe'].'_'?>">
                                                <div class="pushUp-inner">
                                                    <a aria-label="image" class="pushUp-close" href="#travail"><img src="../../images/close.svg" alt=""></a>
                                                    <div class="pushUp-content"><img class="pushUp-image" id="pushUp-image" src="../../images/bulletins/<?= $bulletin['bulletin'] ?>" alt=""></div>
                                                </div>
                                            </div>
                                </div>
                                    <?php
                                    
                                }
                                if (isset($_GET["bulletin"]) && $_GET["bulletin"]==$_SESSION['pseudo']. '_'. $value['id_cursus']) {
                                        ?>
                                            <form action="" method="post" enctype="multipart/form-data" class="mb-5 mx-5">
                                                <div class="form-group">
                                                    <input type="text" name="semestre" class="form-control" placeholder="<?= ($bulletin['semestre'] == 1) ? 2 : 1 ?>" value="<?= ($bulletin['semestre'] == 1) ? 2 : 1 ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image"><input type="file" name="bulletin" class="upload_box form-control" class="form-control">
                                                </div>
                                                <input type="submit" name="subbull" class="btn btn-primary"class="form-control">
                                            </form>
                                        <?php
                                        if (isset($_FILES['bulletin']) && $_FILES['bulletin']['error'] == 0 && isset($_POST['semestre']) && !empty($_POST['semestre'])) {
                                            $semestre = htmlspecialchars($_POST['semestre']);
                                            if ($_FILES['bulletin']['size'] <= 5000000) {
                                                $info_fichier = pathinfo($_FILES['bulletin']['name']);
                                                $extension_fichier = $info_fichier['extension'];
                                                $auto_extension = array('jpg', 'png', 'jpeg');
                                                if (in_array($extension_fichier, $auto_extension)) {
                                                    $img = $_FILES['bulletin']['tmp_name'];
                                                    if ($extension_fichier === 'png') {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'. $value['classe']. $semestre.'_'.  $_SESSION['pseudo'] . '.png'));
                                                        $insertion_bulletin = $db->prepare('INSERT INTO bulletin(bulletin, semestre, id_cursus) VALUES (:bulletin, :semestre, :id)');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo'] . '.png',
                                                            'semestre' => $semestre,
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    } else {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'. $value['classe']. $semestre.'_'. $_SESSION['pseudo'] . '.jpg'));
                                                        $insertion_bulletin = $db->prepare('INSERT INTO bulletin(bulletin, semestre, id_cursus) VALUES (:bulletin, :semestre, :id)');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo'] . '.jpg',
                                                            'semestre' => $semestre,
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    }
                                                }
                                                else {
                                                    echo '<p>Veuillez ins??rer une image de format png, jpg ou jpeg.</p>';
                                                }
                                            }
                                            else {
                                                echo '<p>Veuillez ins??rer une image de plus petite taille.</p>';
                                            }
                                        }
                                    }else{
                                    ?>
                                        <div class="renseign">
                                            <a href="?bulletin=<?= $_SESSION['pseudo'].'_'. $value['id_cursus']?>#bulletin_<?= $value['id_cursus'] ?>" class="btn btn-primary mt-4 mb-4">fournir un bulletin</a>
                                        </div>
                                    <?php
                                    }
                            }
                            else{
                                    if(isset($_GET["bulletins"]) && $_GET["bulletins"]==$_SESSION['pseudo']. '_'. $value['id_cursus']){
                                    ?>
                                        <form action="" method="post" enctype="multipart/form-data" class="my-5 mx-5" id="<?= "bulletins_". $value['id_cursus']?>">
                                                <div class="form-group">
                                                    <input type="text" name="1semestre" class="form-control" placeholder="Semestre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image"><input type="file" name="1bulletin" class="upload_box form-control" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="2semestre" class="form-control" placeholder="Semestre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image"><input type="file" name="2bulletin" class="upload_box form-control" class="form-control">
                                                </div>
                                                <input type="submit" name="subbulls" class="btn btn-primary"class="form-control">
                                        </form>
                                    <?php
                                    if (isset($_FILES['1bulletin']) && $_FILES['1bulletin']['error'] == 0 && isset($_POST['1semestre']) && !empty($_POST['1semestre'])) {
                                            $semestre = htmlspecialchars($_POST['1semestre']);
                                            if ($_FILES['1bulletin']['size'] <= 5000000) {
                                                $info_fichier = pathinfo($_FILES['1bulletin']['name']);
                                                $extension_fichier = $info_fichier['extension'];
                                                $auto_extension = array('jpg', 'png', 'jpeg');
                                                if (in_array($extension_fichier, $auto_extension)) {
                                                    $img = $_FILES['1bulletin']['tmp_name'];
                                                    if ($extension_fichier === 'png') {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo']. '.png'));
                                                        $insertion_bulletin = $db->prepare('INSERT INTO bulletin(bulletin, semestre, id_cursus) VALUES (:bulletin, :semestre, :id)');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo']. '.png',
                                                            'semestre' => $semestre,
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo '<p>Ajout de bulletin en png.</p>';
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    } else {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo']. '.jpg'));
                                                        $insertion_bulletin = $db->prepare('INSERT INTO bulletin(bulletin, semestre, id_cursus) VALUES (:bulletin, :semestre, :id)');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo'] . '.jpg',
                                                            'semestre' => $semestre,
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo '<p>Ajout de bulletin en jpg.</p>';
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    }
                                                }
                                                else {
                                                    echo '<p>Veuillez ins??rer une image de format png, jpg ou jpeg pour votre premi??re bulletin.</p>';
                                                }
                                            }
                                            else {
                                                echo '<p>Veuillez ins??rer une image de plus petite taille pour votre premi??re bulletin.</p>';
                                            }
                                        }
                                        if (isset($_FILES['2bulletin']) && $_FILES['2bulletin']['error'] == 0 && isset($_POST['2semestre']) && !empty($_POST['2semestre'])) {
                                            $semestre = htmlspecialchars($_POST['2semestre']);
                                            if ($_FILES['2bulletin']['size'] <= 5000000) {
                                                $info_fichier = pathinfo($_FILES['2bulletin']['name']);
                                                $extension_fichier = $info_fichier['extension'];
                                                $auto_extension = array('jpg', 'png', 'jpeg');
                                                if (in_array($extension_fichier, $auto_extension)) {
                                                    $img = $_FILES['2bulletin']['tmp_name'];
                                                    if ($extension_fichier === 'png') {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo'] . '.png'));
                                                        $insertion_bulletin = $db->prepare('INSERT INTO bulletin(bulletin, semestre, id_cursus) VALUES (:bulletin, :semestre, :id)');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo'] . '.png',
                                                            'semestre' => $semestre,
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo '<p>Ajout de bulletin en png.</p>';
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    } else {
                                                        move_uploaded_file($img, '../../images/bulletins/'.basename('bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo'] . '.jpg'));
                                                        $insertion_bulletin = $db->prepare('INSERT INTO bulletin(bulletin, semestre, id_cursus) VALUES (:bulletin, :semestre, :id)');
                                                        $insertion_bulletin->execute([
                                                            'bulletin' => 'bulletin_'. $value['classe']. $semestre. '_'. $_SESSION['pseudo'] . '.jpg',
                                                            'semestre' => $semestre,
                                                            'id' => $value['id_cursus']
                                                        ]);
                                                        $insertion_bulletin->closeCursor();
                                                        echo '<p>Ajout de bulletin en jpg.</p>';
                                                        echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                                    }
                                                }
                                                else {
                                                    echo '<p>Veuillez ins??rer une image de format png, jpg ou jpeg pour votre deuxi??me bulletin.</p>';
                                                }
                                            }
                                            else {
                                                echo '<p>Veuillez ins??rer une image de plus petite taille pour votre deuxi??me bulletin.</p>';
                                            }
                                        }
                                    }else {
                                    ?>
                                        <div class="renseign">
                                            <a href="?bulletins=<?= $_SESSION['pseudo']. '_'. $value['id_cursus']?>#<?= "bulletins_". $value['id_cursus']?>" class="btn btn-primary mt-4 mb-4">fournir mes bulletins</a>
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
                            if (isset($_GET["curajout"]) && $_GET["curajout"]==$_SESSION['pseudo']) {
                                ?>
                                <form action="" method="post" id="cursusajout">
                                    <div class="mx-5 mt-3 form-group">
                                        <input type="text" name="classe" class="form-control" placeholder="Classe">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="text" name="serie" class="form-control" placeholder="S??rie">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="text" name="etablissement" class="form-control" placeholder="Etablissement">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="text" name="annee" class="form-control" placeholder="Ann??e">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="submit" name="subcura" class="btn btn-primary"class="form-control">
                                    </div>
                                </form>
                                <?php
                                if(isset($_POST['classe']) && isset($_POST['serie']) && isset($_POST['etablissement']) && isset($_POST['annee'])
                                    && !empty($_POST['classe']) && !empty($_POST['serie']) && !empty($_POST['etablissement']) && !empty($_POST['annee'])){
                                    $classe = htmlspecialchars($_POST['classe']);
                                    $serie = htmlspecialchars($_POST['serie']);
                                    $etablissement = htmlspecialchars($_POST['etablissement']);
                                    $annee = htmlspecialchars($_POST['annee']);
                                    $insertion_cursus = $db->prepare('INSERT INTO cursus(classe, serie, etablissement, annee, id_candidat) VALUES (:classe, :serie, :etablissement, :annee, :id)');
                                    $insertion_cursus->execute([
                                        'classe' => $classe,
                                        'serie' => $serie,
                                        'etablissement' => $etablissement,
                                        'annee' => $annee,
                                        'id' => $compte['id_candidat']
                                    ]);
                                    $insertion_cursus->closeCursor();
                                    echo '<p>Cursus ajout??</p>';
                                    echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                }
                            } else {
                            ?>
                            <div class="renseign col-12">
                                <a href="?curajout=<?= $_SESSION['pseudo'] ?>#cursusajout" class="btn btn-primary mt-4 mb-4">Renseigner une autre ann??e d'??tude</a>
                            </div>
                        <?php
                            }
                    } else {
                        ?>
                        <?php
                            if (isset($_GET["curajout"]) && ($_GET["curajout"] == $_SESSION['pseudo'])) {
                                ?>
                                <form action="" method="post" id="cursusajout">
                                    <div class="mx-5 mt-3 form-group">
                                        <input type="text" name="classe" class="form-control" placeholder="Classe">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="text" name="serie" class="form-control" placeholder="S??rie">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="text" name="etablissement" class="form-control" placeholder="Etablissement">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="text" name="annee" class="form-control" placeholder="Ann??e">
                                    </div>
                                    <div class="mx-5 form-group">
                                        <input type="submit" name="subcura" class="btn btn-primary"class="form-control">
                                    </div>
                                </form>
                                <?php

                                if(isset($_POST['classe']) && isset($_POST['serie']) && isset($_POST['etablissement']) && isset($_POST['annee'])
                                    && !empty($_POST['classe']) && !empty($_POST['serie']) && !empty($_POST['etablissement']) && !empty($_POST['annee'])){
                                    $classe = htmlspecialchars($_POST['classe']);
                                    $serie = htmlspecialchars($_POST['serie']);
                                    $etablissement = htmlspecialchars($_POST['etablissement']);
                                    $annee = htmlspecialchars($_POST['annee']);
                                    $insertion_cursus = $db->prepare('INSERT INTO cursus(classe, serie, etablissement, annee, id_candidat) VALUES (:classe, :serie, :etablissement, :annee, :id)');
                                    $insertion_cursus->execute([
                                        'classe' => $classe,
                                        'serie' => $serie,
                                        'etablissement' => $etablissement,
                                        'annee' => $annee,
                                        'id' => $compte['id_candidat']
                                    ]);
                                    $insertion_cursus->closeCursor();
                                    echo '<p>Cursus ajout??</p>';
                                    echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                                }

                            } else {
                            ?>
                            <div class="renseign col-12">
                                <a href="?curajout=<?= $_SESSION['pseudo'] ?>#cursusajout" class="btn btn-primary mt-4 mb-4">Renseigner une ann??e d'??tude</a>
                            </div>
                        <?php
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="row congrid align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="presta ml-2">
                    <img src="../../images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
                    <p>L???institut Polytechnique de Saint-Louis (IPSL), une ??cole d???ing??nieurs de l???Universit?? Gaston Berger cr????e en 2012, a pour ambition de faire ??merger dans la r??gion nord un p??le d???ing??nierie d???excellence de classe internationale.</p>
                    <div>
                        <i class="fab fa-phone" href=''>Telephone:+221 778261896 / +221 781252827</i></br>
                        <i class="fab fa-mail-bulk" href=''>Email: ipsl@ugb.edu.sn</i>
                    </div>
                    <div class="liant">
                        <i class="fab fa-github-square" href='#'></i>
                        <i class="fab fa-instagram" href='#'></i>
                        <i class="fab fa-linkedin" href='#'></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-10 vision">
                <h2>Institut</h2>
                <ul>
                    <li><a href="">Acceuil</a></li>
                    <li><a href="">Mentions l??gales</a></li>
                    <li><a href="">Services num??riques</a></li>
                    <li><a href=""># Soutenez nous</a></li>
                    <li><a href="">Le guide du Candidat</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-10 contact">
                <h2>Contactez nous</h2>
                <form action="">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Adresse mail" class="form-control" class="mail">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" name="message" class="form-control" placeholder="Votre message"></textarea>
                    </div>
                    <input type="submit" value="Envoyez" class="btn btn-primary"class="submit_footer">
                </form>
                <?php 
                        
                    if(isset($_POST['email']) && isset($_POST['message']) && !empty($_POST['email']) && !empty($_POST['message']))
                        {   
                            $email = htmlspecialchars($_POST['email']);
                            $message = htmlspecialchars($_POST['message']);
                            $insertion = $db->prepare('INSERT INTO contact(email,message) 
                            VALUES (:email ,:message)');
                                $insertion->execute([
                                    "email" => $email,
                                    "message" => $message
                                ]);
                            echo "message envoye";
                            echo "<script type='text/javascript'>document.location.replace('../dossier/');</script>";
                        }
                    ?>
            </div>
        </div>
        <div class="bottomfooter">
            <a href=""> Copyright 2020</a>  
            <a href=""> Tous droits reserv??s</a> 
            <a href="">IPSL</a>
        </div>
    </footer>
    <script src="../../assets/jquery.js"></script>
    <script src="../../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>