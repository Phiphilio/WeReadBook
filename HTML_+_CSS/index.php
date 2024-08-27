<?php
require_once(__DIR__ . "/../backend/connexionDb.php");
//var_dump($listeLivre);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> 2i tech Academy</title>
  <link href="styles.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <script type="module" src="../JS/index.js" defer></script>
</head>

<body>
  <!-- on récupre de le header-->
  <?php require_once(__DIR__ . "/header.php") ?>
  <main>
    <section class=" middleTop container">
      <div class="searchBox">
        <div> quel livre cherchez vous ?</div>
        <form class="searchForm">
          <input type="text" id="searchInput" placeholder="Search">
          <button class="arrowButton">
            <img
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAKBJREFUSEvtlNEJgDAMRK+b6Ca6iZvoJrqJq7iJelBBVExy6p+F0p/yXnMJTfh4pY/5+AVmwkpEHYABwGTSgXAPCG8zvPZIohUUAMa1Ap6swJREBUwlJFEEIYkqcEvuBLNnSnZ3LnvytqA8PuppRD2AKk/UCU6ZKuAkmXBV4IYrghBcETQ5Gk7MZeZvNJn/EbdrqU12wZWI3ODt4l+BGdkCKy4hGU/4RpYAAAAASUVORK5CYII=" />
          </button>
        </form>
      </div>
    </section>
    <section class=" middle-container">
      <div id="sortButtons">
        <button id="sortAsc">Trier par date de sortie (Ascendant)</button>
        <button id="sortDesc">Trier par date de sortie (Descendant)</button>
      </div>
      <div class="block-liste-item">
        <?php foreach ($listeLivre as $livre) : ?>
          <div class="book" data-title=<?php echo  $livre["titre"]; ?> data-author=<?php echo  $livre["auteur"]; ?> data-release-date=<?php echo  $livre["date_sortie"]; ?>>
            <form action="../backend/reservations.php">
              <div class="categorie-liste-item">
                <div class="categorie-liste-item-contenu">
                  <h2> <?php echo $livre["titre"] ?></h2>
                  <p> <?php echo "Par " . $livre["titre"] . "<br>Date de sortie: " . $livre["date_sortie"]  ?></p>
                  <input type="hidden" name="id" value="<?php echo $livre["id"] ?>">
                  <button>réserver</button>
            </form>
          </div>
      </div>
      </div>
    <?php endforeach ?>
    </div>
    </div>
    </section>
  </main>
  <!--on récupère le footer-->
  <?php require_once(__DIR__ . "/footer.php") ?>
</body>

</html>