<?php
include 'database.php';

$db = new database();
$datumVandaag = date("Y/m/d");

            $act = $db->select("SELECT reservering.reserverings_code, reservering.kenteken, reservering.begin_datum, reservering.eind_datum,
            reservering.klant_id, klant.klant_naam, reservering.aantal_auto,reservering.created_at,TIMESTAMPDIFF(DAY, reservering.begin_datum, reservering.eind_datum) as aantal_dagen,
             reservering.aantal_auto * auto.prijs_per_dag as totaal_bedrag
            FROM reservering 
            INNER JOIN auto ON reservering.kenteken = auto.kenteken
            INNER JOIN klant ON reservering.klant_id = klant.klant_id
            WHERE begin_datum='$datumVandaag'");

                    if(!isset($act)) {
                        echo "Er is geen reservering voor vandaag";
                    }

        include 'table_generator_vandaag.php';

create_table($act, 'reserverings');

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
