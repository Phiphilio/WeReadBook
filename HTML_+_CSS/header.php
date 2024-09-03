<header class="container">
    <div class="navigation">
        <div class="navTitle">
            <a href="index.php">
                <img
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAWBJREFUSEvFld9xgzAMxiUyROEhJmwSNiGTNJ0kdJKSSSDOA3QIo54dfHHxX3qXq19tfb9PsiwjvHjhi/UhChj7/gBZ1mSIJQEcF0MDEV1hntuiqoaQySBg5LxBgEtIgABOBWOt74wXMHH+BYZjBOhmgKsLiADtG2MnF8QJGG+3MyK+ywAzWJYLd7veJUREH0VZntd7FsAU0UHj/X5EIplRcJEQ1fpObMDT/ZAzVqWKr7PVTiyArr12P3FOMefGfpczVpvnXQAlKLsDhOh8NfdBc8Z+aboA8hIPG1ybR1VZYxmY7bmVEwd8c34hgGarsiqro1XtLkp4vT54EkAGT5z/5R6s8iyta/sxX3JqqZJfshbcmIXTvTcDubGMDNlRsZb1igcBiZCBhKhDf0L0w1Ggx7CT01V9OHLCzoifxX7fxe4oCWBko0Y1IdYp4tESme5WH5A11HyZJGcQK8W/AX4A0uGsGZifKx4AAAAASUVORK5CYII=" />
                    WeReadBook</a>
            <a href="reservationFrontend.php" id="HelpLink">2i Academy</a>
        </div>
        <?php if(isset($_SESSION["nom"]) && isset($_SESSION["user_id"])):?>
            <div class="navButton">
            <section>
            <a href="formulaires/deconnexion.php?"><button class="loginButton"> deconnexion</button></a>
            </section>
        </div>
        <?php else : ?>
        <div class="navButton">
            <section>
            <a href="formulaires/connexion.php?"><button class="loginButton"> connexion</button></a>
            <a href="formulaires/inscription.php?"> <button class="signButton"> s'inscrire</button></a>
            </section>
        </div>
        <?php endif?>
    </div>
</header>