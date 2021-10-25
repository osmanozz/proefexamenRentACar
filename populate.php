<?php


include "database.php";

// ER WORDT AUTOMATISCH EEN USER AANGEMAAKT IN DE DATABASE.
$sql = "INSERT INTO klant VALUES (:klant_id, :username, :password, :klant_naam, :telefoonnummer, :email)";
    $placeholder = [
        'klant_id'=> NULL,
        'username'=> 'klant',
        'password'=> password_hash('klant', PASSWORD_DEFAULT),
        'klant_naam'=> 'osman',
        'telefoonnummer'=> '9321',
        'email' => 'test@example.com'
    ]; 

            $db = new database();
                $db->insert($sql, $placeholder);

                $sql = "INSERT INTO medewerker VALUES (:medewerker_id, :username, :password)";
    $placeholder = [
        'medewerker_id'=> NULL,
        'username'=> 'medewerker',
        'password'=> password_hash('klant', PASSWORD_DEFAULT),
    ]; 

            $db = new database();
                $db->insert($sql, $placeholder);

?> 