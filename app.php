<?php

define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'mitwork');


try {
  	$db = new PDO('mysql:host='. HOST .';dbname='. DB_NAME .';', USER, PASSWORD);
 } catch(\PDOException $e){
   	echo "<h3>Ошибка соединения с mysql:</h3> ". $e->getMessage();
 }






