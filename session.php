
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
  <?php  
  if (isset($_SESSION['nom'])) {
    if($_SESSION['nom']=='Admin') {

        echo '<span class="BttonBlue"><a href="admin_account.php">Gérer les utilisateurs</a></span>';
    }
   
}        

   ?>


   
    </div>
    <div class="compte">
    <?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
   
// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['nom'])) {
    
    echo'<p>Bonjour ' .$_SESSION['nom'].' <br/> </p>';
}        
    ?>
    <p> vous pouvez désormais accéder à toutes nos options de création d'URL raccourcies <br/><br/>
        <a  href="">Avec mot de passe</a> <br/><br/><a href="">Avec mot de passe différents </a><br/><br/><a href=""> A durée limitée</a><br/> <br/>
        <a href=""> A durée périodique</a> <br/><br/> <a href="">Création par lots</a><br/> <br/><a href=""> Visualisation des statistiques</a></p>
    </div>
      <ul>
            <li><a href="">Devenir partenaires</a></li>
            <li><a href="">CGV</a></li>
            <li><a href="">Mentions légales</a></li>
        </ul>
</body>
</html>