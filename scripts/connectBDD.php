<?php

$db = new PDO('mysql:host=127.0.0.1:3306;dbname=burger','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>