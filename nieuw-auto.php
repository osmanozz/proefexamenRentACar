<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'database.php';
    $db = new database();

    $sql = "INSERT INTO auto VALUES (:kenteken, :merk, :zitplaatsen, :prijs_per_dag)";
        $placeholders = [
        'kenteken'=>  $_POST['kenteken'],
        'merk'=> $_POST['merk'],
        'zitplaatsen'=> $_POST['zitplaatsen'],
        'prijs_per_dag'=> $_POST['prijs_per_dag']
        ];
             $db->insert($sql, $placeholders);
            header("Location:index-medewerker.php");
}



?>

<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Nieuw AUTO toevoegen</title>
</head>

<body>

<div class="card text-center">
  <div class="card-header">
    <div class="card-body">
        <h2 class="text-muted">AUTO TOEVOEGEN</h2>
</div>

    <form method="POST">
        <input type="text" name="kenteken" placeholder="Kenteken" required> <br><br>
        <input type="text" name="merk" placeholder="merk" required> <br><br>
        <input type="int" name="zitplaatsen" placeholder="zitplaatsen" required> <br><br>
        <input type="int" name="prijs_per_dag" placeholder="prijs per dag" required> <br><br>
        <input class="btn btn-primary" type="submit" value="Toevogen">
    </form>

</div>
    </div>
        </div>

    <br>
      <br>
        <br>
</body>
</html>