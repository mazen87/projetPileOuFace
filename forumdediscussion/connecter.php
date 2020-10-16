<?php
    session_start();
    require_once 'connexionbdd.php';

     // traitement de formulaire connexion 
    //déclarer les variable 
    $loginConn = "";
    $passwordCon= "";
    $erreursCon =[]; 
    
    //assainir les variables 
    if(isset($_POST['loginConn'])){
        $loginConn = htmlspecialchars(trim(stripslashes(strip_tags($_POST['loginConn']))));
    }
    if(isset($_POST['passwordConn'])){
        $passwordCon = $_POST['passwordConn'];
    }
    // traiter le post 
    if(isset($_POST['connexion'])){
        //gérer les erreurs 
        if(empty($_POST['loginConn'])){
                $erreursCon[] = "login est vide...!";
        }
        if(empty($_POST['passwordConn'])){
            $erreursCon[] = "mot de passe est vide...!";
        }
        if(empty($erreursCon)){
            //préparer la requête 
            $requeteConnexion = " select * from user where email = '$loginConn'";
            $resultatConn = mysqli_query($link,$requeteConnexion);
            if($resultatConn){
                if(mysqli_num_rows($resultatConn)){
                $ligneResultatConn = mysqli_fetch_assoc($resultatConn);
                //tester le mot de passe 
                if(password_verify($passwordCon,$ligneResultatConn['motdepasse'])){
                    $_SESSION['idClient'] = $ligneResultatConn['id'];
                    $param =  $_SESSION['idClient'];
                    header("Location: http://forumdiscussion/chating.php?param=$param");
                    exit();
                }else{
                    $erreursCon[] = "login ou mot de passe incorrect ou inexistant...!";    
                }

            }else{
                $erreursCon[] = "login ou mot de passe incorrect ou inexistant...!";
            }
            }else{
                $erreursCon[]= "erreur requête....!";
        }
        }

    }

?>

<html>
    <head>

    </head>
    <body>
    </form>

</div>

<?php
    if(count($erreursCon)){
        echo "<ul>";
        for($i = 0;$i<count($erreursCon);$i++){
            echo "<li>".$erreursCon[$i]."</li>";
        
        }
        echo "</ul>";
    }
    
    ?>
<div >
    <h2>Connexion</h2>
    <form method="POST">
    <label>login : </label> <input type="text" placeholder="toto@exemple.com" name="loginConn"/><br><br>
    <label>Mot de passe : </label><input type="password" name="passwordConn"/><br>
    <input type="submit" value="se connecter" name="connexion"/>


    </form>

    <button><a href="/index.php">retour</a></button>
    </body>
</html>