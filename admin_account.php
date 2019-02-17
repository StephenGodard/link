
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
  <?php session_start(); ?>
  <div class="container">
    <div class="logo">Logo</div>
    <div class="pub">Publicité</div>
  </div>
  <div class="connexion">
   <span class="BttonBlue">Accueil</span>
   <span class="BttonBlue">Présentation</span>
   
   <span class="BttonBlue">Raccourcir</span>
   <span class="BttonBlue">Mon compte</span>
   <span class="BttonBlue"><a href="logout.php">Déconnexion</a></span>
   <span class="BttonBlue"><a href=""></a></span>
  
 </div>
 <div class="compte">

  <h1> Liste des comptes </h1>
  <table class="userTable">
    <thread>
      <tr>
        <th> id </th>
        <th> login </th>
        <th> password </th>
        <th> nom </th> 
      </tr>
    </thread>

    <?php

// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)

// On récupère nos variables de session
    if (isset($_SESSION['login']) && isset($_SESSION['nom'])) {
      try{
        $bdd = new PDO('mysql:host=localhost;dbname=Breizhlink','root', 'MySQL');


      }
      catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();

      }

      $reponse = $bdd->query("SELECT * FROM login;");

      while ($donnees = $reponse->fetch())

      {
       echo '<tr>';
       echo '';
       echo '<td>' .$donnees['id'] . '</td>' ;
       echo '<td>' .$donnees['login']. '</td>' ;
       echo '<td>' .$donnees['password'] . '</td>' ;
       echo '<td>' .$donnees['nom'] . '</td>' ;
       echo '<td><form method="post" action="delete_ligne.php"><label> Supprimer </label><input type="submit" name="delete"class="BttonBlue" value="' .$donnees['id'] .'"/></form></td>';
       echo'<td><form method="post" action="edit_ligne.php"><label> Modifier </label><input type="submit" name="edit" class="BttonBlue" value="' .$donnees['id'] .'"/></form></td>'; 
       echo '</tr>' ;

     }

   }        
   ?>
   </table>
 </div>
 <ul>
  <li><a href="">Devenir partenaires</a></li>
  <li><a href="">CGV</a></li>
  <li><a href="">Mentions légales</a></li>
</ul>
</body>
</html>