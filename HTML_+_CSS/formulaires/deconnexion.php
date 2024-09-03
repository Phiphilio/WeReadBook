<?php 
session_start();
require_once(__DIR__ . "/../../backend/fonctions.php");

session_unset();
session_destroy();

redirectTo("http://wereadbookbackend.local/HTML_+_CSS/");
?>