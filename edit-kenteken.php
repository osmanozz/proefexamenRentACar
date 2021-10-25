<?php
    include_once "database.php";
    $db = new database();
  
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $kenteken = trim($_POST['kenteken']);
            $merk = trim($_POST['merk']);
            $zitplaatsen = trim($_POST['zitplaatsen']);
            $prijs = trim($_POST['prijs_per_dag']);
            
                $sql = "UPDATE auto SET merk=:merk, zitplaatsen=:zitplaatsen, prijs_per_dag=:prijs_per_dag
                WHERE kenteken=:kenteken";

                    $placeholders = [
                        'kenteken' => $kenteken,
                        'merk' => $merk,
                        'zitplaatsen'=> $zitplaatsen,
                        'prijs_per_dag' => $prijs,
                    ];
                        $db->edit($sql,$placeholders, "index-medewerker.php");
        }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<div class="card text-center">
  <div class="card-header">
    <div class="card-body">

<form method="POST">
        Kenteken : <input type="text" name="kenteken" value="<?php echo trim($_GET['kenteken']) ?>"> <br><br>
        Merk : <input type="text" name="merk"  value="<?php echo trim($_GET['merk']) ?>" required> <br><br>
        Zitplaatsen : <input type="text" name="zitplaatsen" value="<?php echo trim($_GET['zitplaatsen']) ?>" required><br><br>
        Prijs per dag : <input type="text" name="prijs_per_dag" value="<?php echo trim($_GET['prijs_per_dag']) ?>" required><br><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Wijzig">
</form>
    </div>
    </div>
    </div>