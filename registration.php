<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>registration</title>
</head>
<body>
    <?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=Breizhlink','root', 'MySQL');
        

    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();

    }
    $login=$_POST['login'];
    $nom=$_POST['nom'];
    $password=$_POST['password'];
    $reponse = $bdd->prepare("INSERT INTO `login` (`id`, `login`, `password`, `nom`) VALUES (NULL, ?, ? , ?);");
    $reponse->bindParam(1, $login);
    $reponse->bindParam(2, $password);
    $reponse->bindParam(3, $nom);
    $reponse->execute();
    echo "merci pour votre inscription  !<br/>";
    echo '<a  href="index.html">cliquez ici si votre navigateur ne vous redirige pas automatiquement </a><br/>'; 






   
    header ('refresh:5;index.html');

    



    
    ?>
</body>


</html>