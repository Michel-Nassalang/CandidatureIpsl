<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
    session_start();
    if(!isset($_SESSION['pseudo'])){
       header('Location: connexion/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/candidat.css">
    <title>Candidat</title>
    <link rel="shortcut icon" href="../images/ipsl.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../">
                    <img src="../images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <li class="nav-item active">
                        <a class="nav-link" href="../">Acceuil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../candidat/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Candidat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../candidat/">Mon compte</a>
                        <a class="dropdown-item" href="../candidat/connexion/">Connexion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../candidat/dossier/">Mes dossiers</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../informations/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informations
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../informations/">Acceuil</a>
                        <a class="dropdown-item" href="../informations/formation/">Formations</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../informations/admission/">Admission</a>
                        </div>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact/">Contact</a>
                </li>
            </div>
        </nav>
    </header>
    <?php
        $connexion = $db->prepare('SELECT * FROM candidat WHERE pseudo = :pseudo');
        $connexion->execute([
                    'pseudo' => $_SESSION['pseudo']
                ]);
        $compte = $connexion->fetch();
        $connexion->closeCursor();
    ?>
    <div class="container-fluid pl-5 tete">    
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-6 tout">
                <div class="intro">
                    <a href="../">Acceuil</a>
                    <span>→</span>
                    <a href=""><?= $compte['prenom'] ?>  <?=$compte['nom'] ?></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-2 deconnex">
                <a href=""><i class="ti-user"></i> <span>Compte</span></a>
                <a href="connexion/deconnexion.php"><i class="ti-power-off"></i> <span>Deconnexion</span></a>
            </div>
        </div>
    </div>
    <div class="container-fluid teneur mt-5"> 
        <!-- ----------------------------- -->
    <?php if(isset($_GET["edition"]) && $_GET["edition"]==$compte['pseudo']){
    ?> 
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-10">
                    <div class="row profil">
                        <div class="ml-3 col-lg-8 col-md-10 col-sm-10">
                            <?php 
                                $path1 = "../images/profils/user_". $compte['pseudo'] . ".png";
                                $path2 = "../images/profils/user_". $compte['pseudo'] . ".jpg";
                                $path3 = "../images/profils/user_". $compte['pseudo'] . ".jpeg";
                                if (file_exists($path1)) {
                                    ?>
                                    <img src="<?= $path1 ?>" alt="" class="img-thumbnail">
                                    <?php 
                                }elseif (file_exists($path2)) {
                                    ?>
                                    <img src="../images/profils/<?= $path2 ?>" alt="" class="img-thumbnail">
                                    <?php 
                                }elseif (file_exists($path3)) {
                                    ?>
                                    <img src="../images/profils/<?= $path3 ?>" alt="" class="img-thumbnail">
                                    <?php 
                                }else{
                                    ?>
                                    <img src="../images/profils/profil.png" alt="" class="img-thumbnail">
                                    <?php 
                                }
                            ?>
                            <div class="form-group mt-3">
                                <label for="image"><input type="file" name="image" class="upload_box form-control" class="form-control">
                            </div>
                        </div>
                        <div class="ml-3 col-lg-4 col-sm-10">
                            <div class="form-group">
                                <input type="text" name="prenom" class="form-control" placeholder="<?= $compte['prenom'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" placeholder="<?= $compte['nom'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="column mt-4">
                        <div class="form-group col-lg-6">
                            <select name="statut" id="statut" class="form-control">
                                <option value="" selected><?= $compte['statut'] ?></option>
                                <option value="Etudiant">Etudiant</option>
                                <option value="Elève de terminale">Elève de terminale</option>
                                <option value="Professionnel">Professionnel</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="age" class="form-control" placeholder="<?= ($compte['age']=="")? 'Indifini' : $compte['age'] ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="cni" class="form-control" placeholder="<?= ($compte['cni']=="")? 'Indifini' : $compte['cni'] ?>">
                        </div>
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
                <div class="col-lg-4 col-md-5 col-sm-10">
                    <div class="row contact ml-3">
                        <div class="col-10"><h3>Mes contacts</h3></div>
                        <div class="col-10">
                            <div class="form-group mt-2">
                                <input type="text" name="email" class="form-control" placeholder="<?= $compte['email'] ?>">
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group mt-2">
                                <input type="text" name="telephone" class="form-control" placeholder="<?= ($ligne !== 0)? $dossier['telephone'] : 'Télephone' ?>">
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group mt-2">
                                <input type="text" name="adresse" class="form-control" placeholder="<?= ($ligne !== 0)? $dossier['adresse']: 'Adresse' ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group align-items-center justify-content-center ">
                <input type="submit" name="save" class="btn btn-primary" value="mise à jour">
            </div>
        </form>
        <?php
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            if ($_FILES['image']['size'] <= 5000000) {
                $info_fichier = pathinfo($_FILES['image']['name']);
                $extension_fichier = $info_fichier['extension'];
                $auto_extension = array('jpg', 'png', 'jpeg');
                if (in_array($extension_fichier, $auto_extension)) {
                    $img = $_FILES['image']['tmp_name'];
                    if ($extension_fichier === 'png') {
                        move_uploaded_file($img, '../images/profils/'.basename("user_" . $_SESSION['pseudo'] . ".png"));
                        echo '<p>Merci d\'avoir ajouter votre photo de profil.</p>';
                    } else {
                        move_uploaded_file($img, '../images/profils/'.basename("user_" . $_SESSION['pseudo'] . ".jpg"));
                        echo '<p>Merci d\'avoir ajouter votre photo de profil.</p>';
                    }
                }
                else {
                    echo '<p>Veuillez insérer une image de format png, jpg ou jpeg.</p>';
                }
            }
            else {
                echo '<p>Veuillez insérer une image de plus petite taille.</p>';
            }
        }
        if(isset($_POST['nom']) && !empty($_POST['nom'])){
            $nom = htmlspecialchars($_POST['nom']);
            $updateNom = $db->prepare('UPDATE candidat SET nom = :nom WHERE id_candidat = :id');
            $updateNom->execute([
                "id" => $_SESSION['id'],
                "nom" => $nom
            ]);
            $updateNom->closeCursor();
        }
        if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
            $prenom = htmlspecialchars($_POST['prenom']);
            $updatePrenom = $db->prepare('UPDATE candidat SET prenom = :prenom WHERE id_candidat = :id');
            $updatePrenom->execute([
                "id" => $_SESSION['id'],
                "prenom" => $prenom
            ]);
            $updatePrenom->closeCursor();
        }
        if(isset($_POST['statut']) && !empty($_POST['statut'])){
            $statut = htmlspecialchars($_POST['statut']);
            $updateStatut = $db->prepare('UPDATE candidat SET statut = :statut WHERE id_candidat = :id');
            $updateStatut->execute([
                "id" => $_SESSION['id'],
                "statut" => $statut
            ]);
            $updateStatut->closeCursor();
        }
        if(isset($_POST['age']) && !empty($_POST['age'])){
            $age = htmlspecialchars($_POST['age']);
            $updateAge = $db->prepare('UPDATE candidat SET age = :age WHERE id_candidat = :id');
            $updateAge->execute([
                "id" => $_SESSION['id'],
                "age" => $age
            ]);
            $updateAge->closeCursor();
        }
        if(isset($_POST['cni']) && !empty($_POST['cni'])){
            $cni = htmlspecialchars($_POST['cni']);
            $updateCni = $db->prepare('UPDATE candidat SET cni = :cni WHERE id_candidat = :id');
            $updateCni->execute([
                "id" => $_SESSION['id'],
                "cni" => $cni
            ]);
            $updateCni->closeCursor();
        }
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = htmlspecialchars($_POST['email']);
            $updateEmail = $db->prepare('UPDATE candidat SET email = :email WHERE id_candidat = :id');
            $updateEmail->execute([
                "id" => $_SESSION['id'],
                "email" => $email
            ]);
            $updateEmail->closeCursor();
        }
        if(isset($_POST['telephone']) && !empty($_POST['telephone'])){
            $telephone = htmlspecialchars($_POST['telephone']);
            $select_dossier = $db->prepare('SELECT * FROM dossier WHERE id_candidat = :id');
            $select_dossier->execute([
                        'id' => $_SESSION['id']
                    ]);
            $dossier = $select_dossier->fetch();
            $ligne_dossier = $select_dossier->rowCount();
            $select_dossier->closeCursor();
            if($ligne_dossier > 0){
                $updateTelephone = $db->prepare('UPDATE dossier SET telephone = :telephone WHERE id_candidat = :id');
                $updateTelephone->execute([
                    "id" => $_SESSION['id'],
                    "telephone" => $telephone
                ]);
                $updateTelephone->closeCursor();
            }else{
                $insertTelephone = $db->prepare('INSERT INTO dossier(telephone, id_candidat) VALUES (:telephone, :id)');
                $insertTelephone->execute([
                    "telephone" => $telephone,
                    "id" => $_SESSION['id']
                ]);
                $insertTelephone->closeCursor();
            }
        }
        if(isset($_POST['adresse']) && !empty($_POST['adresse'])){
            $adresse = htmlspecialchars($_POST['adresse']);
            $select_dossier = $db->prepare('SELECT * FROM dossier WHERE id_candidat = :id');
            $select_dossier->execute([
                        'id' => $_SESSION['id']
                    ]);
            $dossier = $select_dossier->fetch();
            $ligne_dossier = $select_dossier->rowCount();
            $select_dossier->closeCursor();
            if($ligne_dossier > 0){
                $updateAdresse = $db->prepare('UPDATE dossier SET adresse = :adresse WHERE id_candidat = :id');
                $updateAdresse->execute([
                    "id" => $_SESSION['id'],
                    "adresse" => $adresse
                ]);
                $updateAdresse->closeCursor();
            }else{
                $insertAdresse = $db->prepare('INSERT INTO dossier(adresse, id_candidat) VALUES (:adresse, :id)');
                $insertAdresse->execute([
                    "adresse" => $adresse,
                    "id" => $_SESSION['id']
                ]);
                $insertAdresse->closeCursor();
            }
        }
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = htmlspecialchars($_POST['email']);
            $select_dossier = $db->prepare('SELECT * FROM dossier WHERE id_candidat = :id');
            $select_dossier->execute([
                        'id' => $_SESSION['id']
                    ]);
            $dossier = $select_dossier->fetch();
            $ligne_dossier = $select_dossier->rowCount();
            $select_dossier->closeCursor();
            if($ligne_dossier > 0){
                $updateEmail = $db->prepare('UPDATE dossier SET email = :email WHERE id_candidat = :id');
                $updateEmail->execute([
                    "id" => $_SESSION['id'],
                    "email" => $email
                ]);
                $updateEmail->closeCursor();
            }else{
                $insertEmail = $db->prepare('INSERT INTO dossier(email, id_candidat) VALUES (:email, :id)');
                $insertEmail->execute([
                    "email" => $email,
                    "id" => $_SESSION['id']
                ]);
                $insertEmail->closeCursor();
            }
        }
        }else{
        ?> 
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-10">
                <div class="row profil">
                    <div class="ml-3">
                        <?php 
                                $path1 = "../images/profils/user_". $compte['pseudo'] . ".png";
                                $path2 = "../images/profils/user_". $compte['pseudo'] . ".jpg";
                                $path3 = "../images/profils/user_". $compte['pseudo'] . ".jpeg";
                                if (file_exists($path1)) {
                                    ?>
                                    <img src="<?= $path1 ?>" alt="" class="img-thumbnail">
                                    <?php 
                                }elseif (file_exists($path2)) {
                                    ?>
                                    <img src="../images/profils/<?= $path2 ?>" alt="" class="img-thumbnail">
                                    <?php 
                                }elseif (file_exists($path3)) {
                                    ?>
                                    <img src="../images/profils/<?= $path3 ?>" alt="" class="img-thumbnail">
                                    <?php 
                                }else{
                                    ?>
                                    <img src="../images/profils/profil.png" alt="" class="img-thumbnail">
                                    <?php 
                                }
                        ?>
                    </div>
                    <div class="ml-3">
                        <h4><?= $compte['prenom'] ?> <?= $compte['nom'] ?></h4>
                        <h5><?= $compte['pseudo'] ?></h5>
                        <a href="?edition=<?= $compte['pseudo'] ?>"><h5><i class="ti-pencil-alt"></i></h5></a>
                    </div>
                </div>
                <div class="column mt-4">
                    <h6><span>Statut: </span><?= $compte['statut'] ?></h6>
                    <h6><span>Age: </span> <?= $compte['age'] ?> ans</h6>
                    <h6><span>CNI: </span> <?=($compte['cni']=="") ? "Indéfini" : $compte['cni']; ?></h6>
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
            <div class="col-lg-4 col-md-5 col-sm-10">
                <div class="row contact ml-3">
                    <div class="col-8"><h3>Mes contacts</h3></div>
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
        }
        ?>
    </div>
    <!-- ----------------------- -->
    <footer>
        <div class="row congrid align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="presta ml-2">
                    <img src="../images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
                    <p>L’institut Polytechnique de Saint-Louis (IPSL), une école d’ingénieurs de l’Université Gaston Berger créée en 2012, a pour ambition de faire émerger dans la région nord un pôle d’ingénierie d’excellence de classe internationale.</p>
                    <div>
                        <i class="ti-mobile" href='tel:(221) 77-111-22-36'>Telephone:+221 778261896 / +221 781252827</i></br>
                        <i class="ti-email" href='mailto:ipsl@ugb.edu.sn'>Email: ipsl@ugb.edu.sn</i>
                    </div>
                    <div class="liant">
                        <i class="ti-facebook"></i>
                        <i class="ti-twitter"></i>
                        <i class="ti-instagram"></i>
                        <i class="ti-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-10 vision">
                <h2>Institut</h2>
                <ul>
                    <li><a href="">Acceuil</a></li>
                    <li><a href="">Mentions légales</a></li>
                    <li><a href="">Services numériques</a></li>
                    <li><a href=""># Soutenez nous</a></li>
                    <li><a href="">Le guide du Candidat</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-10 contact">
                <h2>Contactez nous</h2>
                <form action="">
                    <div class="form-group">
                        <input type="email" placeholder="Adresse mail" class="form-control" class="mail">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control" placeholder="Votre message"></textarea>
                    </div>
                    <input type="submit" value="Envoyez" class="btn btn-primary"class="submit_footer">
                </form>
            </div>
        </div>
        <div class="bottomfooter">
            <a href=""> Copyright 2020</a>  
            <a href=""> Tous droits reservés</a> 
            <a href="">IPSL</a>
        </div>
    </footer>
    <?php 
    ?>
    <script src="../assets/jquery.js"></script>
    <script src="../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>