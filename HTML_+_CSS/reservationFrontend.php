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
  <script type="module" src="../JS/index.js" defer></script>
</head>

<body>

<!--header-->
<?php require_once __DIR__ . "/header.php";?>

<!--main-->
<main>
    <div class="livre-container">
        <div class="top-livre-container">
            <div>
               <form action="../backend/reservations.php" method="post">
               <div>
               <div>
                  <img src="">
                </div>
                <div>
                  <h1><?php echo $postData["titre"] ?><h1>
                  <h2><?php echo "Par" . $postData["auteur"] ?></h2>
                  <p> <?php echo "<br>Date de sortie: " . $postData["date_sortie"] ?></p>
                  <input type="hidden" name="id" value="<?php echo $postData["id"] ?>">
                </div>
               </div>
               <div>
                <p>lorem ipsum lorem ipsum lorem ipsum <p>
               </div>
                <?php if ($postData["disponible"] == 1): ?>
                <button>reserver</button>
                <?php else: ?>
                  <button> non disponible</button>
                  <?php endif?>
               </form>
            </div>
        </div>
        <div class="middle-livre-container">
          <a href= "index.php">retourner à accueil</a>
        </div>
    </div>
</main>
<!--footer-->
<?php require_once __DIR__ . "/footer.php";?>
</body>