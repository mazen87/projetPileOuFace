<?php
    session_start();
    require_once 'connexionbdd.php';
    $id = 0;
    $id = $_SESSION['idClient'];
    echo $id;
    $erreurs = [];
    
    //récupérer les données pour l'utilisateur connecté 
    //préparer la requête 
    $requeteDonneesUtilisateur = "select * from user where id = '$id'";
    $resultat = mysqli_query($link,$requeteDonneesUtilisateur);
        if($resultat){
            if(mysqli_num_rows($resultat)){
                $ligne_resultat = mysqli_fetch_assoc($resultat);
            }else{
                $erreurs = "erreur de connexion...!";
            }
        }else {
            $erreurs[] = "erreur de connexion...!";
        }

        //la modification 
         // déclarer les variable 
     $loginInsc = "";
     $passInsc = "";
     $passConf ="";
     $email ="";
     $erreurs = [];
     $idClient =0;
     $param =0;

      //assainir les variable 
      if(isset($_POST['loginInsc'])){
        $loginInsc = htmlspecialchars(trim(stripslashes(strip_tags($_POST['loginInsc']))));
    }
    
    if(isset($_POST['passwordInsc'])){
        $passInsc = password_hash($_POST['passwordInsc'],PASSWORD_DEFAULT);
    }
    if(isset($_POST['confpasse'])){
        $passConf = $_POST['confpasse'];
    }


        //se déconnecter 
        if(isset($_POST['deconn'])){
            session_destroy();
            header("Location: http://localhost/forumdiscussion/index.php");
            exit();
    
        }
?>
<html>
    <head>

    </head>
    <body>
        <div>
        <h2>Modivier votre profil</h2>
            <form method="POST">
                <label>Email : </label><input type="mail" name="email" value="<?=$ligne_resultat['email']?>"/> <br><br>
                <lable>pseudo :</lable><input type="text" name="loginInsc" placeholder="toto..." value="<?=$ligne_resultat['pseudo']?>" /><br><br>
                  
                <label>Mot de passe :</label><input  type="password" name="passwordInsc"  ><br><br>
                <label>confirmation Mot de passe :</label><input  type="password" name="confpasse"><br><br>
                <input type="submit" value="Modifier" name="modifier"/>


            </form>
        </div>
        <div>
        </form>
<form method="POST">
<button type="submit" name="deconn">se déconnecter</button>
</form>
</div>
    </body>
</html>