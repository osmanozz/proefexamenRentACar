<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
  

<div class="card text-center">
  <div class="card-header">
    <div class="card-body">
    <h2 class="text-muted">MEDEWERKER</h2>
</div>
            <div class="card-body">
              <form method="POST">
                <label for="username">Gebruikersnaam:</label>
                <input class="rounded" type="text" name="username" required>
              <br> <br>
                    <label for="password">Wachtwoord:</label>
                    <input class="rounded" type="password" name="password" required>
              <br> <br>
                      <input class="btn btn-primary" type="submit" name="submit" value="LOGIN">
        </form>

      </div>
    </div>
  </div>

 </body>
<?php

include "database.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $username = $_POST['username'];
    $password = $_POST['password'];

      // USERNAME AND PASSWORD WORDT GEHASHED
      $username = stripcslashes($username);  
        $password = stripcslashes($password);  

            $db = new database();
              $db->login($username, $password);    
              header("Location:index-medewerker.php");
              session_start();  
  }


?>