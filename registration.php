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
    
        $messageChiffre = md5($password);
     $link=mysqli_connect("localhost","root","MySQL","Breizhlink");
        
          $query="INSERT INTO `login` (`id`, `login`, `password`, `nom`) VALUES (NULL, '".$login."','".$messageChiffre."','".$nom."');";
      
         $result=mysqli_query($link,$query);
        mysqli_close($link);
        ?>
    </body>
    
    
</html>