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
 function encrypt($pure_string, $encryption_key) {

    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);

    return $encrypted_string;

}
 
 $pwdChiffre=encrypte($password,$cleSecrete);
    $link = mysqli_connect("localhost","root","MySQL","Breizhlink");
    //Requète sql
 
 
     $command="SELECT nom FROM login WHERE login= '" .$login. "' AND password='".$pwdChiffre."';";
  

//récupère le résultat envoyer par la base de données
$result = mysqli_query($link, $command);

 if(!mysqli_fetch_row($result)){//Ici on trouve aucun résultat
        echo "pas bon login pass";
            
			mysqli_close($bdd);
           
            echo '<a  style="text-align:center;" href="index.html">Cliquez ici si votre navigateur ne vous redirige pas automatiquement </a><br/>'; 
  }
 else{
        //Ici l'authetification est OK
        
        echo "authetification ok <br/>";
     session_start();
    
     $_SESSION['login'] =$login;
     $_SESSION['pwd'] = $password;
     header ('location:session.php');
    
  }//Fin de condition d'authentification

mysqli_close($link);
    ?>
</body>
</html>