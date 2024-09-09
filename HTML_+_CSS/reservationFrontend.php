<?php
//debut de la session
session_start();

$postData = $_POST;

//on teste les informations envoyées
if (
  !isset($postData["titre"]) ||
  !isset($postData["auteur"]) ||
  !isset($postData["date_sortie"]) ||
  !isset($postData["id"]) ||
  !isset($postData["disponible"])
) {
  echo "pas là";
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> WeReadBook</title>
  <link href="styles.css" rel="stylesheet">
  <link href="stylesLivres.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>

  <!--header-->
  <?php require_once __DIR__ . "/header.php"; ?>

  <!--main-->
  <main>
    <div class="livre-container">
      <div class="top-livre-container">
        <div>
          <form action="../backend/reservations.php" method="post">
            <div>
              <div>
                <div class="div-image-Livre">
                  <img src="<?php echo $postData["url_livre"] ?>">
                </div>
                <div id="div-info-livre">
                  <h1><?php echo $postData["titre"] ?></h1>
                  <p><?php echo "<strong>Par</strong>" . $postData["auteur"] ?></p>
                  <p><?php echo "<strong>genre</strong> : " . $postData["genre"] ?></pS>
                  <p> <?php echo "<br> <strong>Date de sortie: </strong>" . $postData["date_sortie"] ?></p>
                  <p> <br><strong>note :
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                    </strong></p>
                  <input type="hidden" name="id" value="<?php echo $postData["id"] ?>">
                </div>
              </div>
              <div>
                <div id="div-bouton">
                  <?php if ($postData["disponible"] == 1): ?>
                    <button class="reserver">reserver</button>
                  <?php else: ?>
                    <button class="non-disponible"> non disponible</button>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <div class="div-description-livre">
              <p><?php echo $postData["livre_description"] ?></p>
            </div>
          </form>
        </div>
      </div>
      <div class="middle-livre-container">
        <h1>Recommandations</h1>
        <div class="conteneur-recommandations">
          ki lo fe
        </div>
      </div>
      <div><a href="index.php">retourner à accueil</a></div>
    </div>
  </main>
  <!--footer-->
  <?php require_once __DIR__ . "/footer.php"; ?>
</body>