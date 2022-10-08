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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Contact</title>
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
    <section>
        <div class="container contact-page mt-5">
            <div class="row">
                <div class="col-lg-4 col-12 info px-5 pt-4">
                    <div class="locaux-info">
                        <h2>Nos locaux</h2>
                        <p>
                            Vous pourrez nous trouver à l'université Gaston Berger où se trouve nos locaux et notre administration. <br>
                            <ul>
                                <li>Institut  Polytechnique de Saint-Louis (IPSL)</li>
                                <li>Université Gaston Berger (UGB)</li>
                                <li>B.P. : 234, Saint-Louis (Sénégal)</li>
                            </ul>
                        </p>
                    </div>
                    <div class="time-info">
                        <h2>Heures de travail</h2>
                        <ul>
                            <li>Heures: 9h 30 à 16h</li>
                            <li>Fonctionnement: Du Lundi au Samedi</li>
                        </ul>
                    </div>
                    <div class="contact-us">
                        <h2>Contacts</h2>
                        <ul>
                            <li>Mail: info.ipsl@ugb.edu.sn</li>
                            <li>Tel: +221 77 111 22 36</li>
                        </ul>
                    </div>
                    <div class="reseaux">
                        <h2>Nos réseaux sociaux</h2>
                        <ul>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>LinkedIn</li>
                            <li>Instagram</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-7 col-12 common px-5 pt-4">
                    <div class="contact-titre">
                        <h2>Votre message</h2>
                        <p>Nous pouvons avoir des moments de partage avec vous grâce ce formulaire. <br>
                           Veuillez nous transmettre votre message.</p>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Votre Nom" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <input name="subject" type="text" placeholder="Votre Sujet" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="Votre Email" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <input name="phone" type="text" placeholder="Votre numéro de Télephone" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group message">
                                    <textarea name="message" rows="7" placeholder="Votre Message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="submit" class="btn btn-primary" class="form-control">Soumettre</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="map container">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="538" id="gmap_canvas" src="https://maps.google.com/maps?q=Institut%20polytechnique%20de%20Saint%20Louis&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://fmovies-online.net"></a><br>
                    <style>.mapouter{position:relative;text-align:right;height:538px;width:100%;}</style>
                    <a href="https://www.embedgooglemap.net">using google map on website</a>
                    <style>.gmap_canvas {overflow:hidden;background:none!important;height:538px;width:100%;}</style>
                </div>
            </div>
        </div>
    </section>
    <!-- ----------------------- -->
    <footer>
        <div class="row congrid align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-10">
                <div class="presta ml-2">
                    <img src="../images/ipsl.png" alt="" width="200" height="40" class="d-inline-block align-top"/>
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
    <script src="../assets/jquery.js"></script>
    <script src="../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>