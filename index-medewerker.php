<?php

require_once 'database.php';
$db = new database();

$act = $db->select("SELECT * FROM auto");

include 'table_generator.php';

create_table($act, 'kenteken');

?>
    <a class="btn btn-danger" href="login-medewerker.php">Log uit</a> <br><br>
    <a class="btn btn-secondary" href="reserveringen-vandaag.php">Reserveringen Vandaag</a> <br><br>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


