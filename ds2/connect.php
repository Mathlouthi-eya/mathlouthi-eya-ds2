<?php
$bdd = new PDO('mysql:host=localhost;dbname=bd_blog','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
?>