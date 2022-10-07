<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="../../assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <title>Connexion Etudiant</title>
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
    //------------------------------------------
    if(isset($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pass = htmlspecialchars($_POST['password']);

        if(strpos($pseudo, '_Admin')===false){
            $connexion = $db->prepare('SELECT * FROM candidat WHERE pseudo = :pseudo');
            $connexion->execute([
                        'pseudo' => $pseudo
                    ]);
            $compte = $connexion->fetch();
            $ligne = $connexion->rowCount();
            ?>
            <div class="row align-items-center justify-content-center">
            <?php
            if($ligne == 1)
            {
                $hash = $compte['password'];
                if(password_verify($pass, $hash))
                {
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['id'] = $compte['id_candidat'];
                    header('Location: ../');
                    $connexion->closeCursor();
                }else{
                ?>
                    <div class="erreur_code col-lg-4 col-md-6 col-sm-8">
                        <p>Veuillez vérifier votre mot de passe.</p>
                    </div>
                <?php   
                }
            }else{
                ?>
                    <div class="erreur_code col-lg-4 col-md-6 col-sm-8">
                        <p>Veuillez vérifier votre pseudo.</p>
                    </div>
                <?php
            }
        }else{
            $connexion = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
            $connexion->execute([
                        'pseudo' => $pseudo
                    ]);
            $compte = $connexion->fetch();
            $ligne = $connexion->rowCount();
            ?>
            <div class="row align-items-center justify-content-center">
            <?php
            if($ligne == 1)
            {
                $hash = $compte['password'];
                if(password_verify($pass, $hash))
                {
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['id'] = $compte['id_candidat'];
                    setcookie('Compte candidature',"Candidature", time() + 60 * 60 * 24);
                    header('Location: ../compte/');
                    $connexion->closeCursor();
                }else{
                ?>
                    <div class="erreur_code col-lg-4 col-md-6 col-sm-8">
                        <p>Veuillez vérifier votre mot de passe.</p>
                    </div>
                <?php   
                }
            }else{
                ?>
                    <div class="erreur_code col-lg-4 col-md-6 col-sm-8">
                        <p>Veuillez vérifier votre pseudo.</p>
                    </div>
                <?php
            }
        }
    }elseif(isset($_POST['pseudo']) && isset($_POST['password']) && empty($_POST['pseudo']) && empty($_POST['password']))
    {
?>
                <div class="erreur  col-lg-4 col-md-6 col-sm-8">
                    <p>Veuillez vérifier votre pseudo ou votre mot de passe si vous vous êtes inscris. <br>
                    Sinon veilllez vous inscrire. Nous serions contents de vous compter parmi vous.</p>
                </div>
<?php
    }
?>
</div>
<div class="row align-items-center justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
        <form action="" method="post" class="form align-items-center justify-content-center">
            <div class="form-group">
                <input type="text" name="pseudo" placeholder='Pseudo' id="pseudo" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mot de Passe" id="pass" class="form-control" required>
            </div>
            <div class="form-group connex">
                <input type="submit" class="submit" id="submit" class="form-control" value="Je me connecte">
            </div>
            <div class="box">
                <a class="act" href="inscription.php">M'inscrire</a>
            </div>
        </form>
    </div>
</div>
    <script src="connexion.js"></script>
    <script src="../../assets/jquery.js"></script>
    <script src="../../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>