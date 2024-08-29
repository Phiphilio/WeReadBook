<?php 
function redirectTo( string $url):void {
    header("Location: $url"); //redirection vers le fichier index
    //faire attention à ne pas mettre d'espace entre les location et les 2 points 
    exit();
}
?>