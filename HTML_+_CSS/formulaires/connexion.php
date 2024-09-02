<?php
 session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> WeReadBook</title>
  <link href="formStyles.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
</head>

<body>
  <!--on récupère le header-->
  <?php require_once(__DIR__ . "/headerForm.php"); ?>
  <main>
    <div>
      <h1 class="titre"> connexion </h1>
      <div class="formConnexion">
        <h3>Entrez vos informations</h3>
        <form action="../../backend/submit_connexion.php" method="post">
          <label> adresse mail</label>
          <input type="mail" name="email" placeholder="exemple@exemple.fr">
          <label>mot de passe</label>
          <input type="password" name="motDePasse">
          <button>connexion</button>
          <a href="inscription.php">inscription</a>
        </form>
      </div>
    </div>
  </main>
</body>