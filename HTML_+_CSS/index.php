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
  <header class="container">
    <div class="navigation">
      <div class="navTitle">
        <a href="#">
          <img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAWBJREFUSEvFld9xgzAMxiUyROEhJmwSNiGTNJ0kdJKSSSDOA3QIo54dfHHxX3qXq19tfb9PsiwjvHjhi/UhChj7/gBZ1mSIJQEcF0MDEV1hntuiqoaQySBg5LxBgEtIgABOBWOt74wXMHH+BYZjBOhmgKsLiADtG2MnF8QJGG+3MyK+ywAzWJYLd7veJUREH0VZntd7FsAU0UHj/X5EIplRcJEQ1fpObMDT/ZAzVqWKr7PVTiyArr12P3FOMefGfpczVpvnXQAlKLsDhOh8NfdBc8Z+aboA8hIPG1ybR1VZYxmY7bmVEwd8c34hgGarsiqro1XtLkp4vT54EkAGT5z/5R6s8iyta/sxX3JqqZJfshbcmIXTvTcDubGMDNlRsZb1igcBiZCBhKhDf0L0w1Ggx7CT01V9OHLCzoifxX7fxe4oCWBko0Y1IdYp4tESme5WH5A11HyZJGcQK8W/AX4A0uGsGZifKx4AAAAASUVORK5CYII=" />
          2i Academy</a>
        <a href="#" id="HelpLink">gestion de la Bibliothèque</a>
      </div>
      <div class="navButton">
        <section>
          <button class="submitButton"> submit a request</button>
          <button class="signButton"> sign in</button>
        </section>
      </div>
    </div>
  </header>
  <main>
    <section class=" middleTop container">
      <div class="searchBox">
        <div> quel livre cherchez vous ?</div>
        <form class="searchForm">
          <input type="text" id ="searchInput"placeholder="Search">
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
        </div>
      </div>
    </section>
  </main>
  <footer class="footer-container">
    <div class="inner-footer-container">
      <div class="footer-column">
        <h3>abstract</h3>
        <a href="#">Start trial</a>
        <a href="#">Pricing</a>
        <a href="#">Download</a>
      </div>
      <div class="footer-column">
        <h3>abstract</h3>
        <a href="#">Start trial</a>
        <a href="#">Pricing</a>
        <a href="#">Download</a>
      </div>
      <div class="footer-column">
        <h3>abstract</h3>
        <a href="#">Start trial</a>
        <a href="#">Pricing</a>
        <a href="#">Download</a>
      </div>
      <div class="footer-column">
        <h3>abstract</h3>
        <a href="#">Start trial</a>
        <a href="#">Pricing</a>
        <a href="#">Download</a>
      </div>
      <div class="copyright-footer-column">
        <p>copyright 2024</br />
          GrapperCosmo Studio, Inc<br />
          All rights reserved</p>
        <!--si je mets les <br/> entre des éléments en <p></p> il y aura un plus grand retour à la-->
      </div>
    </div>
  </footer>
</body>

</html>