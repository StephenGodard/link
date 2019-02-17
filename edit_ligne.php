
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="sessionstyle.css">
  <script src="session.js"></script>
  <script src="jquery.js"></script>

</head>
<body>
  <?php session_start();
  $id=$_POST['edit'];
  
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=Breizhlink','root', 'MySQL');


  }
  catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();

  }


  $reponse = $bdd->prepare("SELECT * FROM login WHERE id= ?;");
  $reponse->bindParam(1, $id);
  $reponse->execute();
  echo 'Modifier vos paramètres:';
  while($donnees=$reponse->fetch()){
    $login1=$donnees['login'];
    $pwd1=$donnees['password'];
    $name1=$donnees['nom'];

  }
echo '<form action="edit_ligne2.php" method="post"><label>Login </label><input name="login" type="text" value="'.$login1.'" /> <label>password</label> <input name="pwd" type="password" value="'.$pwd1. '" /> <label> Nom </label><input name="name" type="text" value="' .$name1.'"/> <input type="text"  name="id" value="' .$id. '"/>  <input type="submit" name="connexion" value="modifier" class="BttonBlue" />  </form>';



  

   


 
 ?>
</body>
</html>
