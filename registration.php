<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>registration</title>
</head>
    <body>
        <?php
        echo "merci pour votre inscription  !<br/>";
        echo '<a  href="index.html">cliquez ici pour revenir au menu </a><br/>'; 
    $login=$_POST['login'];
    $nom=$_POST['nom'];
    $password=$_POST['password'];
    $cleSecrete = "MaCle";
        function encrypt($pure_string, $encryption_key) {

    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);

    return $encrypted_string;

}
        $messageChiffre = encrypt($password, $cleSecrete);
     $link=mysqli_connect("localhost","root","MySQL","Breizhlink");
        
          $query="INSERT INTO `login` (`id`, `login`, `password`, `nom`) VALUES (NULL, '".$login."','".$messageChiffre."','".$nom."');";
      
         $result=mysqli_query($link,$query);
        mysqli_close($link);
        ?>
    </body>
    
    
</html>