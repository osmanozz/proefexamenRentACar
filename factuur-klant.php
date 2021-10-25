<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<?php
include 'database.php';
    session_start();
                                
    $db = new Database();

        $klant_id = $_SESSION['klant_id'];
        $datumVandaag = date("Y-m-d");

                $table = $db->select("SELECT MAX(factuur.factuur_no) as factuur_no,
                factuur.klant_id, factuur.kenteken, factuur.bedrag as bedrag_per_dag, 
                reservering.begin_datum, reservering.eind_datum, 
                TIMESTAMPDIFF(DAY, reservering.begin_datum, reservering.eind_datum) as aantal_dagen,
                TIMESTAMPDIFF(DAY, reservering.begin_datum, reservering.eind_datum) * factuur.bedrag * reservering.aantal_auto as totaal_bedrag, reservering.aantal_auto,
                factuur.created_at
                FROM factuur 
                INNER JOIN reservering ON factuur.kenteken = reservering.kenteken 
                WHERE factuur.klant_id='$klant_id' AND factuur.created_at='$datumVandaag'");

        include 'table-generator-factuur.php';
        create_table($table, 'factuur');


?>
   <a class="btn btn-danger" href="index.php">Log uit</a> <br><br>