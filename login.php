<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <?php
    
	
    $login=$_POST['login'];
    $password=$_POST['password'];
    $cleSecrete="MaCle";
    
 
 $pwdChiffre=md5($password);
    echo"pwdChiffre";
    $link = mysqli_connect("localhost","root","MySQL","Breizhlink");
    //Requète sql
 
 
     $command="SELECT nom FROM login WHERE login= '" .$login. "' AND password='".$pwdChiffre."';";
    echo ($command);

//récupère le résultat envoyer par la base de données
$result = mysqli_query($link, $command);
$row=mysqli_fetch_row($result);
 if(mysqli_fetch_row($result)){//Ici on trouve aucun résultat
        echo "pas bon login pass";
            
			mysqli_close($bdd);
           
            echo '<a  style="text-align:center;" href="index.html">Cliquez ici si votre navigateur ne vous redirige pas automatiquement </a><br/>'; 
  }
 else{
        //Ici l'authetification est OK
        
        echo "authetification ok <br/>";
     session_start();  
     
     $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
     $_SESSION['nom']=$row[0];
     $_SESSION['login']=$login;
     header ('location:session.php');
    
  }//Fin de condition d'authentification

mysqli_close($link);
    ?>
</body>
</html>