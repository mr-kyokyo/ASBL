<?php
    if(!empty($_POST)) {
        
        session_start();

        unset($_SESSION['flash']);
        
        if(!empty($_POST['nom'])) {
            
            if(!empty($_POST['password'])) {

                $nom = htmlspecialchars($_POST["nom"]);
                $passworduser = htmlspecialchars($_POST['password']);
                
                require_once 'db.php';
                
                $req=$pdo->prepare("SELECT * FROM agent WHERE nomag = ? || postnomag = ? || prenomag = ?");
                $req->execute([$nom,$nom,$nom]);
                $user=$req->fetch();
                if($user) {
                    if(password_verify($passworduser, $user->motdepasse)) {
                        
                        $_SESSION['auth'] = $user;
                        header("location: ../management/admin.php?2sts");
                        exit();

                    } elseif($user->motdepasse === $passworduser) {
                        $_SESSION['auth'] = $user;
                        header("location: ../management/admin.php?2sts");
                        exit();
                    } else {
                        $_SESSION['flash'] = "Identifiants ou mot de passe incorect";
                        header("location: ../index.php");
                        exit();
                    }

                } else {
                    $_SESSION['flash'] = "Utilisateur introuvable";
                    header("location: ../index.php");
                    exit();
                }


            } else {
                $_SESSION['flash'] = "Mot de passe invalide";
                header("location: ../index.php");
                exit();
            }

        } else {
            $_SESSION['flash'] = "Identifiants ou mot de passe incorect";
            header("location: ../index.php");
            exit();
        }
      } else {
        $_SESSION['flash'] = "Identifiants ou mot de passe incorect";
        header("location: ../index.php");
        exit();
      }
?>