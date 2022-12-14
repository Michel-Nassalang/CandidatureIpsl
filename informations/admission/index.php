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
    <link rel="stylesheet" href="../../css/admission.css">
    <title>Admissions</title>
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
            <div class="entete my-5">
                <h1>Admissions</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 col-12 common px-5 pt-4">
                    <h2>Types d'admission</h2>
                    <p>Nous avons trois types d'admission ?? l'institut polytechnique de Saint-Louis.</p>
                    <ul>
                        <li><span>Admission par concours post BAC</span></li>
                        <p>Cette admission se fait seulement pour les ??l??ves qui font la terminale et qui obtiennent leur baccalaur??at. 
                            Le concours se fait avant les ??preuves du BAC. Apr??s les r??sultats du BAC, les ??ventuels ??l??ves ing??nieurs  pourraont savoir s'ils 
                            sont s??lectionn??s ?? l'issu du concours et de leur r??sultat.
                        </p>
                        <li><span>Admission sur dossier</span></li>
                        <p>
                            L'admission par dossier se fait pour les ??tudiants ayant fait au minimum deux ans d'etudes universitaires. 
                            Les volontaires doivent d??poser les papiers n??cessaires pour ??valuer leur cursus.
                        </p>
                        <li><span>Admission pour formation payante</span></li>
                        <p>
                            L'admission pour la formation payante se fait sur dossier et par des moyens financi??res. 
                            La personne voulant int??grer l'IPSL doit fournir les papiers justifiant qu'elle a le niveau 
                            pour int??grer l'institut et la formation sera payante pour l'inscription et les mensualit??s.
                        </p>
                    </ul>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4 col-12 papier px-5 pt-4">
                    <h2>Papiers n??cessaires</h2>
                    <p><span>N.B:</span> Tous les papiers pr??sents dans la liste suivante est n??cessaires
                        pour avoir une admission ?? l'IPSL.
                    </p>
                    <ul>
                        <li>Pi??ce d'identit?? CNI</li>
                        <li>Extrait de naissance</li>
                        <li>Certificat de R??sidence</li>
                        <li>Bulletins des deux ann??es pr??cedentes</li>
                        <li>Attestation de baccalaur??at</li>
                    </ul>
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
            <a href=""> Tous droits reserv??s</a> 
            <a href="">IPSL</a>
        </div>
    </footer>
    <?php 
    ?>
    <script src="../../assets/jquery.js"></script>
    <script src="../../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>