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
    <link rel="stylesheet" href="../assets/parts/footer.css">
    <link rel="stylesheet" href="../css/candidat.css">
    <title>Candidat</title>
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
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-10">
                <form action="../candidat/" method="post" enctype="multipart/form-data">
                    <div class="row profil">
                        <div class="ml-3">
                            <img src="../images/profils/<?= $compte['pseudo'] ?>.png" alt="" class="img-thumbnail">
                            <div class="form-group">
                                <label for="image"><input type="file" name="image" class="upload_box form-control" class="form-control">
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="form-group">
                                <input type="text" name="prenom" placeholder="Prénom" class="form-control" value="<?= $compte['prenom'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?= $compte['nom'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="column mt-4">
                        <div class="form-group col-6">
                            <select name="statut" id="statut" class="form-control">
                                <option value="" selected><?= $compte['statut'] ?></option>
                                <option value="Etudiant">Etudiant</option>
                                <option value="Elève de terminale">Elève de terminale</option>
                                <option value="Professionnel">Professionnel</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name="age" placeholder="Age" class="form-control" value="<?= $compte['age'] ?>">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name="cni" placeholder="CNI" class="form-control" value="<?= $compte['cni'] ?>">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" name="save" class="btn btn-primary" value="mise à jour">
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-10">
                <div class="row contact ml-3">
                    <h3>Mes contacts</h3>

                </div>
            </div>
        </div>
        <?php
        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
            if ($_FILES['img']['size'] <= 5000000) {
                $info_fichier = pathinfo($_FILES['img']['name']);
                $extension_fichier = $info_fichier['extension'];
                $auto_extension = array('jpg', 'png', 'jpeg');
                if (in_array($extension_fichier, $auto_extension)) {
                    $img = $_FILES['img']['name'];
                    if ($extension_fichier === 'png') {
                        move_uploaded_file($_FILES['img']['tmp_name'], 'profils/'.basename("user" . $_SESSION['id'] . ".png"));
                        echo '<p>Merci d\'avoir ajouter votre photo de profil.</p>';
                    }else {
                        move_uploaded_file($_FILES['img']['tmp_name'], 'profils/'.basename("user" . $_SESSION['id'] . ".jpg"));
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
        ?>
        <?php 
        }else{
        ?> 
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-10">
                <div class="row profil">
                    <div class="ml-3">
                        <img src="../images/profils/<?= $compte['pseudo'] ?>.png" alt="" class="img-thumbnail">
                    </div>
                    <div class="ml-3">
                        <h4><?= $compte['prenom'] ?>  <?= $compte['nom'] ?></h4>
                        <h5><?= $compte['pseudo'] ?></h5>
                        <a href="?edition=<?= $compte['pseudo'] ?>"><h5><i class="ti-pencil-alt"></i></h5></a>
                    </div>
                </div>
                <div class="column mt-4">
                    <h6><span>Statut: </span><?= $compte['statut'] ?></h6>
                    <h6><span>Age: </span> <?= $compte['age'] ?> ans</h6>
                    <h6><span>CNI: </span> 
                    <?php 
                    if ($compte['cni']==""){ 
                        echo "Indéfini";
                     }else{
                        echo $compte['cni'];
                    } ?></h6>
                </div>
            </div>
            <?php
                $candidat = $db->prepare('SELECT * FROM dossier WHERE id_candidat = :id');
                $candidat->execute([
                            'id' => $compte['id_candidat']
                        ]);
                $dossier = $candidat->fetch();
                $ligne = $candidat->rowCount();
            ?>
            <div class="col-lg-4 col-md-5 col-sm-10">
                <div class="row contact ml-3">
                    <div class="col-8"><h3>Mes contacts</h3></div>
                    <div class="col-8"><h6><span>Email: </span> <?= $compte['email'] ?></h6></div>
                    <div class="col-8">
                        <h6><span>Telephone: </span>
                        <?php 
                        if ($ligne!=1){ 
                            echo "Indéfini";
                        }else{
                            echo $dossier['telephone'];
                        } ?>
                        </h6>
                    </div>
                    <div class="col-8">
                        <h6><span>Adresse: </span>
                        <?php 
                        if ($ligne!=1){ 
                            echo "Indéfini";
                        }else{
                            echo $dossier['adresse'];
                        } ?>
                        </h6>
                    </div>
                    <?php
                        $inscription = $db->prepare('SELECT * FROM inscription WHERE id_candidat = :id');
                        $inscription->execute([
                                    'id' => $compte['id_candidat']
                                ]);
                        $inscris = $inscription->fetch();
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