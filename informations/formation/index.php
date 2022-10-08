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
    <link rel="stylesheet" href="../../assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/formation.css">
    <title>Formations</title>
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
    <section>
        <div class="container">
            <div class="entete mt-5">
                <h2>Nos formations</h2>
            </div>
            <div class="row mt-5 align-items-center justify-content-center">
                <div class="col-lg-5 col-8">
                    <img src="../../images/eleve.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5 col-8">
                    <h3>Les classes préparatoires</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eveniet recusandae asperiores inventore exercitationem sequi. Saepe eveniet dolores natus. Consectetur beatae provident quo est nihil animi quae quas, laboriosam unde.
                    </p>
                </div>
            </div>
            <div class="row mt-5 align-items-center justify-content-center">
                <div class="col-lg-5 col-8">
                    <h3>Cycle ingénieur: Option électromécanique</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eveniet recusandae asperiores inventore exercitationem sequi. Saepe eveniet dolores natus. Consectetur beatae provident quo est nihil animi quae quas, laboriosam unde.
                    </p>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5 col-8">
                    <img src="../../images/eleve.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row mt-5 align-items-center justify-content-center">
                <div class="col-lg-5 col-8">
                    <img src="../../images/eleve.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5 col-8">
                    <h3>Cycle ingénieur: Option informatique</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eveniet recusandae asperiores inventore exercitationem sequi. Saepe eveniet dolores natus. Consectetur beatae provident quo est nihil animi quae quas, laboriosam unde.
                    </p>
                </div>
            </div>
            <div class="row mt-5 align-items-center justify-content-center">
                <div class="col-lg-5 col-8">
                    <h3>Cycle ingénieur: Option génie civil</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eveniet recusandae asperiores inventore exercitationem sequi. Saepe eveniet dolores natus. Consectetur beatae provident quo est nihil animi quae quas, laboriosam unde.
                    </p>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5 col-8">
                    <img src="../../images/eleve.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- ----------------------- -->
    <footer>
        <div class="row congrid align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="presta ml-2">
                    <img src="../../images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
                    <p>L’institut Polytechnique de Saint-Louis (IPSL), une école d’ingénieurs de l’Université Gaston Berger créée en 2012, a pour ambition de faire émerger dans la région nord un pôle d’ingénierie d’excellence de classe internationale.</p>
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
    <script src="../../assets/jquery.js"></script>
    <script src="../../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>