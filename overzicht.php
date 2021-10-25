<?php

include 'database.php';

require_once 'database.php';
$db = new database();

$act = $db->select("SELECT * FROM auto");
session_start();

include 'table_generator_reservering.php';

create_table($act, 'kenteken');

?>

