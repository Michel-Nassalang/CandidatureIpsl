<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="dossier.css">
    <link rel="stylesheet" href="../../assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <title>Mon dossier</title>
    <link rel="shortcut icon" href="../../images/ipsl.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../../ ">
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
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <form action="" class="form align-items-center justify-content-center" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="prenom" placeholder="Prénom" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <input type="text" name="nom" placeholder="Nom" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <input type="text" name="ide" placeholder="Id Etudiant" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <input type="text" name ="pseudo" placeholder="Pseudo" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <input type="text" name="ufr" placeholder="Ufr" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image"><input type="file" name="image" class="upload_box form-control" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <select name="genre" id="genre" class="form-control">
                        <option value="Homme" selected>Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
                <div class="box">
                    <input type="submit" class="submit" value="Soumettre">
                </div>
            </form>
        </div>
    </div>
    <script src="../../assets/jquery.js"></script>
    <script src="../../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>