<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'database.php';
    $db = new database();
    session_start();

    $sql = "INSERT INTO reservering VALUES (:reserverings_code, :kenteken, :begin_datum, :eind_datum, :aantal_auto, :klant_id, :created_at)";

    $kenteken_res = $_POST['kenteken'];
   
    $placeholders = [
        'reserverings_code' => NULL,
        'kenteken'=> $kenteken_res,
        'begin_datum'=> $_POST['begin_datum'],
        'eind_datum'=> $_POST['eind_datum'],
        'aantal_auto'=> $_POST['aantal_auto'],
        'klant_id'=> $_POST['klant_id'],
        'created_at'=>date('Y-m-d')
        ];
            $db->insert($sql, $placeholders);
        

                if($db) {
                   
                    $db = new database();

                        $klant_id = $_SESSION['klant_id'];
                        $kenteken = $_POST['kenteken'];
                        $datumVandaag = date("Y-m-d");
                      
                        $factuur_no = $db->select("SELECT  MAX(factuur_no) as factuur_no FROM factuur WHERE klant_id='$klant_id'");
                       
                        $bedrag = $db->select("SELECT reservering.aantal_auto * auto.prijs_per_dag as bedrag  FROM reservering 
                        INNER JOIN auto ON reservering.kenteken = auto.kenteken
                        WHERE klant_id='$klant_id'");
                        

                        foreach($bedrag as $bed) {
                            foreach ($bed as $be) {
                                echo $be; 
                            }
                        }
                        
                        
                       
                        $sql = "INSERT INTO factuur VALUES (:factuur_no, :kenteken, :klant_id, :bedrag, :created_at)";
                        $placeholders = [
                            'factuur_no' => null,
                            'kenteken' => $kenteken,
                            'klant_id' => $klant_id,
                            'bedrag' => $be,
                            'created_at'=>$datumVandaag
                            ];
                    $db->insert($sql, $placeholders);
                    header("Location:factuur-klant.php");
                            
                }
            }



?>

<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>AUTO reserveren</title>
</head>

<body>

<div class="card text-center">
  <div class="card-header">
    <div class="card-body">
        <h2 class="text-muted">AUTO reserveren</h2>
</div>

    <form method="POST">
        <input type="hidden" name="kenteken" value="<?php echo $_GET['kenteken'] ?>">
        <input type="date" name="begin_datum" placeholder="begin_datum" required> <br><br>
        <input type="date" name="eind_datum" placeholder="eind_datum" required> <br><br>
        <input type="hidden" name="klant_id" value="<?php session_start(); echo $_SESSION['klant_id'] ?>">
        <input type="int" name="aantal_auto" placeholder="aantal_auto" required> <br><br>
        <input class="btn btn-primary" type="submit" value="Reserveer">
    </form>

</div>
    </div>
        </div>

    <br>
      <br>
        <br>
        <a class="btn btn-danger" href="login-klant.php">Log uit</a> <br><br>
</body>
</html>

