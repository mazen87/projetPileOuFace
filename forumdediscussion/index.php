<?php
    session_start();
    require_once 'connexionbdd.php';

    //redirection vers s'inscrire
    if(isset($_POST['inscrire'])){
        header("location: http://forumdiscussion/inscrire.php");
        exit();
    }

    //redirection vers se connecter 
    if(isset($_POST['connecter'])){
         header("location: http://forumdiscussion/connecter.php");
        exit();
    }
?>
<html>
    <head>

    </head>
    <body>
        <h1> bienvenu sur le site Forum de Discussion</h1>
  
<div>
    <form method="POST">
        <input type="submit" value="s'inscrire" name="inscrire"/><br><br>
    </form>
</div>
<div>
    <form method="POST">
    <input type="submit" value="se connecter" name="connecter"/><br><br>
    </form>
</div>

      
</body>
</html>