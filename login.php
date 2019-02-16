<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
</head>
<body>
  <?php
  session_start();  


  $login=$_POST['login'];
  $password=$_POST['password'];



  $pwdChiffre=md5($password);

  $link = mysqli_connect("localhost","root","MySQL","Breizhlink");
    //Requète sql


  $command="SELECT nom FROM login WHERE login= '" .$login. "' AND password='".$pwdChiffre."';";
 

//récupère le résultat envoyer par la base de données
  $result = mysqli_query($link, $command);
 
 if(!mysqli_fetch_row($result)){//Ici on trouve aucun résultat
  echo "pas bon login";
  mysqli_close($link);

  echo '<a style="text-align:center;" href="index.html">Cliquez ici si votre navigateur ne vous redirige pas automatiquement </a><br/>'; 
}
else{
        //Ici l'authetification est OK
   $row=mysqli_fetch_row($result);
  echo "authetification ok <br/>";
header ('location:session.php');
  $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
  $_SESSION['nom']=$row[0];
  $_SESSION['login']=$login;
  


  }//Fin de condition d'authentification

  mysqli_close($link);
  ?>
</body>
</html>
