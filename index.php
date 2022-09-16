<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/parts/footer.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <title>Depot de Candidature IPSL</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="">
                    <img src="images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <li class="nav-item active">
                        <a class="nav-link" href="">Acceuil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="candidat/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Candidat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="candidat/">Mon compte</a>
                        <a class="dropdown-item" href="candidat/connexion/">Connexion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="candidat/dossier/">Mes dossiers</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="informations/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Informations
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="informations/">Acceuil</a>
                        <a class="dropdown-item" href="informations/formation/">Formations</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="informations/admission/">Admission</a>
                        </div>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact/">Contact</a>
                </li>
            </div>
        </nav>
    </header>
    <section>
        <div class="container-fluid conteneur">
            <div class="row">
                <div class="title col-lg-4 col-md-6 col-sm-5">
                    <h1>Candidature IPSL</h2>
                    <p>Venez chercher votre avenir avec l'institut Polytechnique de Saint Louis.
                        La qualité des vos études est le fondement de notre institut.
                    </p>
                </div>
            </div>
            <div class="row back">
                <div class="button col-lg-2 col-md-2 col-sm-2">
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                        <a href="candidat/">Mon compte</a>
                    <?php
                    }else {
                    ?>
                        <a href="candidat/connexion/">Postuler</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- --------------------------- -->
    <div class="desc">
        <div class="epel">
            <h2>Institut Polytechnique de Saint-Louis</h2>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-10 mt-5">
                <div class="image">
                    <img src="images/eleve.png" alt="" srcset="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-10 mt-5">
                <div class="iption">
                    <h4>Généralités</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque, quasi alias? Porro, 
                        dolores quod veritatis ea laborum alias omnis quia tenetur dignissimos voluptatum 
                        repudiandae odit animi dolorum quaerat deserunt consequatur. Laudantium, minima possimus!
                        Accusamus magnam, fugiat dolore nemo unde eaque pariatur quae doloribus quidem dolores 
                        rem impedit error laborum voluptatibus exercitationem molestiae consequuntur ab perferendis
                        debitis accusantium ipsam a? Pariatur dolorum, laudantium optio unde a sed debitis eaque 
                        blanditiis eligendi laboriosam animi mollitia magnam minus, quaerat labore dolore nihil. 
                        Blanditiis totam, nihil earum animi eaque provident unde et quibusdam rerum expedita sed 
                        cupiditate aliquam sapiente omnis deserunt? A, architecto earum?
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------- -->
    <footer>
        <div class="row congrid align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="presta ml-2">
                    <img src="images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
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
            <a href=""> Tous droits reservés 
                <i class="fa-solid fa-earth-africa"></i>
            </a> 
            <a href="">IPSL</a>
        </div>
    </footer>
    <script src="assets/jquery.js"></script>
    <script src="assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>