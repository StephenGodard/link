 <?php session_start(); ?>

 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <title>Connexion</title>
</head>
<body>
  <?php
  $login=$_POST['login'];
  $password=$_POST['password'];

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=Breizhlink','root', 'MySQL');
    echo "connecter à la bdd" ;
    
  }
  catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();

  }
  $reponse = $bdd->prepare("SELECT nom FROM login WHERE login= ? AND password= ?;");
  $reponse->bindParam(1, $login);
  $reponse->bindParam(2, $password);
  $reponse->execute();

// On affiche chaque entrée une à une

  if($donnees= $reponse->fetch())

  {
    
     echo "authetification ok <br/>";
header ('location:session.php');
  
  $_SESSION['nom']=$donnees['nom'];
  $_SESSION['login']=$login;



  }
  else{
    echo '<a style="text-align:center;" href="index.html">Cliquez ici si votre navigateur ne vous redirige pas automatiquement </a><br/>'; 
    session_destroy() ;
  }

$reponse->closeCursor(); // Termine le traitement de la requête
?>
</body>
</html>