
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

  $id=$_POST['delete'];
 try{
        $bdd = new PDO('mysql:host=localhost;dbname=Breizhlink','root', 'MySQL');


      }
      catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();

      }
      $reponse = $bdd->prepare("DELETE FROM `login` WHERE `login`.`id` = ?");
      $reponse->bindParam(1, $id);
      $reponse->execute();
      header ('location:admin_account.php');
      
  ?>
  </body>
  </html>
