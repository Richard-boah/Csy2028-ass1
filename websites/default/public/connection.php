<?php

$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment2';

$pdo = new PDO('mysql:dbname='.$schema.';host='.$server,$username,$password);

?>