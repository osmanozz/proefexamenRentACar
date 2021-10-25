<?php
include "database.php";
    $db = new database();

if (isset($_GET['kenteken'])) {

    $kenteken = $_GET['kenteken'];
        $sql = "DELETE FROM auto WHERE kenteken=:kenteken";
            $placeholder = [
                'kenteken'=> $kenteken
            ];
                $db->delete($sql, $placeholder, "index-medewerker.php");
}
?>
