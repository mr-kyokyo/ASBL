<?php
    if(!empty($_POST)) {
        
        session_start();

        unset($_SESSION['flash']);
        
        if(!empty($_POST['email'])) {
            
            if(!empty($_POST['password'])) {

                $email = htmlspecialchars($_POST["email"]);
                $passworduser = htmlspecialchars($_POST['password']);
                
                require_once '../db/db.php';
                
                $req=$pdo->prepare("SELECT * FROM users WHERE email = ?");
                $req->execute([$email]);
                $user=$req->fetch();

                if($user) {
                    if(password_verify($passworduser, $user->password)) {
                        
                        $_SESSION['auth'] = $user;
                        header("location: ../management/pages/admin.php");
                        exit();

                    } elseif($user->password === $passworduser) {
                        $_SESSION['auth'] = $user;
                        header("location: ../management/pages/admin.php");
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