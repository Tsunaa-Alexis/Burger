<?php

$db = new PDO('mysql:host=localhost;dbname=Burger', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>