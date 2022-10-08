<?php 
    try {
        $db = new PDO('mysql:host=localhost;dbname=candidature', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    } 
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
    <title>Création de compte Etudiant</title>
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
    //------------------------------------------------
    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['pseudo']) &&
     isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmation']) && 
     !empty($_POST['nom']) && !empty($_POST['prenom']) &&
     !empty($_POST['password']) && !empty($_POST['confirmation']) && !empty($_POST['pseudo']) && !empty($_POST['email']))
    {   
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $statut = htmlspecialchars($_POST['statut']);
        $password = htmlspecialchars($_POST['password']);
        $confirmation = htmlspecialchars($_POST['confirmation']);
        $age = htmlspecialchars($_POST['age']);
        $region = htmlspecialchars($_POST['region']);
        $genre = htmlspecialchars($_POST['genre']);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        
        $selection_mail = $db->prepare('SELECT * FROM candidat WHERE email = :email');
        $selection_mail->execute([
                    'email' => $email
                ]);
        $e_mail = $selection_mail->fetch();
        $selection_pseudo = $db->prepare('SELECT * FROM candidat WHERE pseudo = :pseudo');
        $selection_pseudo->execute([
                    'pseudo' => $pseudo
        ]);
    ?>
        <div class="row align-items-center justify-content-center">
    <?php
        $p_seudo = $selection_pseudo->fetch();
        if($password != $confirmation)
        {
        ?>
        
            <div class="erreur_code col-lg-4 col-md-6 col-sm-8">
                <p>Les mots de passe donnés ne correspondent pas. <br>
                    Veuillez vérifier si le mot de passe donné correspond à celui donné dans la confirmation
                </p>
            </div>
            
        <?php
        }
        elseif (!empty($e_mail)) {
        ?>
            <div class="erreur_code col-lg-4 col-md-6 col-sm-8">
                <p>L'email que que vous avait donné existe déjà pour un compte. <br>
                    Merci de réessayer avec une autre adresse email
                </p>
            </div>
        <?php }
        elseif (!empty($p_seudo)) {
        ?>
            <div class="erreur_code col-lg-4 col-md-6 col-sm-8">
                <p>Veuillez réessayer avec un autre pseudo car ce dernier est déjà utilisé.</p>
            </div>
        <?php
        }else{
            $insertion = $db->prepare('INSERT INTO candidat(prenom, nom, pseudo, email, statut, password, age, genre) VALUES (:prenom, :nom, :pseudo, :email, :statut, :pass, :age, :genre)');
            $insertion->execute([
                "prenom" => $prenom,
                "nom" => $nom,
                "pseudo" => $pseudo,
                "email" => $email,
                "statut" => $statut,
                "pass" => $pass,
                "age" => $age,
                "genre" => $genre
            ]);
            $selection_mail->closeCursor();
            $selection_pseudo->closeCursor();
            $insertion->closeCursor();

            $connexion = $db->prepare('SELECT * FROM candidat WHERE pseudo = :pseudo AND email = :email');
            $connexion->execute([
                        'pseudo' => $pseudo,
                        'email' => $email
                    ]);
            $compte = $connexion->fetch();
            $id_candidat = $compte['id_candidat'];
            $inscription = $db->prepare('INSERT INTO inscription(date,lieu,id_candidat) VALUES (CURDATE(), :lieu, :id_candidat)');
            $inscription->execute([
                'lieu' => $region,
                'id_candidat' => $id_candidat
                ]
            );
            $inscription->closeCursor();
            ?>
            <div class="success_code col-lg-4 col-md-6 col-sm-8">
                    <p>Nous vous remercions pour l'inscription. 
                        <br> Bienvenue chèr candidat!!! 
                        <br>Veuillez vous connecter à votre compte
                    </p>
            </div>
            <?php
        }
    }elseif (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) &&
            !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])){
    ?>
        <div class="erreur col-lg-4 col-md-6 col-sm-8">
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
                    <input type="text" name="prenom" placeholder="Prénom" id="prenom" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="nom" placeholder="Nom" id="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name ="pseudo" placeholder="Pseudo" class="form-control" id="pseudo" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <select name="statut" id="statut" class="form-control">
                        <option value="" selected disabled>Statut</option>
                        <option value="Etudiant">Etudiant</option>
                        <option value="Elève de terminale">Elève de terminale</option>
                        <option value="Professionnel">Professionnel</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="region" id="region" class="form-control">
                        <option value="" selected disabled>Région</option>
                        <option value="Saint Louis">Saint Louis</option>
                        <option value="Kébemer">Kébemer</option>
                        <option value="Louga">Louga</option>
                        <option value="Matam">Matam</option>
                        <option value="Thiès">Thiès</option>
                        <option value="Dakar">Dakar</option>
                        <option value="Fatick">Fatick</option>
                        <option value="Kaolack">Kaolack</option>
                        <option value="Tambacounda">Tambacounda</option>
                        <option value="Kolda">Kolda</option>
                        <option value="Sédhiou">Sédhiou</option>
                        <option value="Ziguinchor">Ziguinchor</option>
                        <option value="Kédougou">Kédougou</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Mot de Passe" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirmation" id="pass" placeholder="Confirmation" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="age" placeholder="Age" class="form-control">
                </div>
                <div class="form-group">
                    <select name="genre" id="genre" class="form-control" required>
                        <option value="" selected disabled>Genre</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
                <div class="form-group  connex">
                    <input type="submit" class="submit" value="Je m'inscris" id="submit">
                </div>
                <div class="box">
                    <a class="act" href="../connexion/">Me connecter</a>
                </div>
        </form>
        </div>
    </div>
    <script src="connexion.js"></script>
    <script src="../../assets/jquery.js"></script>
    <script src="../../assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
</body>
</html>