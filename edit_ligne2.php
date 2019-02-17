
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
 
    try{
      $bdd = new PDO('mysql:host=localhost;dbname=Breizhlink','root', 'MySQL');


    }
    catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();

    }
    $login=$_POST['login'];
    $pwd=$_POST['pwd'];
    $name=$_POST['name'];
    $id=$_POST['id'];
    $reponse = $bdd->prepare("SELECT * FROM login WHERE id= ?;");
    $reponse->bindParam(1, $_SESSION['edit']);
    $reponse->execute();
    echo 'Vous :';
    while($donnees=$reponse->fetch()){
      $login1=$donnees['login'];
      $pwd1=$donnees['password'];
      $name1=$donnees['nom'];

    }
    if($login != $login1){

     
      $edit = $bdd->prepare("UPDATE `login` SET `login` = ? WHERE `login`.`id` = ?;");
      $edit->bindParam(1, $login);
      $edit->bindParam(2,$id);
      $edit->execute();
      echo 'vous avez modifier le login <br/>';
    }
    if($pwd != $pwd1 ){

      

      $edit = $bdd->prepare("UPDATE `login` SET `password` = ? WHERE `login`.`id` = ?;");
      $edit->bindParam(1, $pwd);
      $edit->bindParam(2,$id);
      $edit->execute();
      echo 'vous avez modifier le mot de passe<br/>';
    }
    if($name != $name1){

      

      $edit = $bdd->prepare("UPDATE `login` SET `nom` = ? WHERE `login`.`id` = ?;");
      $edit->bindParam(1, $name);
      $edit->bindParam(2,$id);
      $edit->execute();
      echo 'vous avez modifier le nom ';
    }
    header('location:admin_account.php');




  ?>
</body>
</html>
