  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Overzicht voorraad</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
     
        function create_table($dataset, $from){
       
        if(is_array($dataset) && !empty($dataset)){ 
            // NAAM VAN DE KOLOM DIE JE WILT OPHALEN NAAR DE URL
            $key = $from."";
          
            ?>

            <table class="table table-striped">
            <caption style="caption-side:top"><h2>Auto Lijst</h2></caption>
            
            <?php 
            // DE KOLOMNAMEN WORDEN OPGEHAALD
            $columns = array_keys($dataset[0]);
            ?>
            
            <tr>
                <?php foreach($columns as $column){ ?>
                    <th>
                        <strong>
                            <?php echo $column?>
                        </strong>
                    </th>
                <?php } ?>
                <th colspan="2">action</th>
            </tr>
                <?php foreach($dataset as $rows=>$row){ 
                    $row_id = $row[$key]; ?>
                    <tr>
                    <?php foreach($row as $rowdata){ ?>
                        
                        <td><?php echo $rowdata; ?></td>
                    <?php } ?>
                    
                    <td>
                    
                        <a href="reserveren-auto.php?kenteken=<?php echo trim($row_id); ?>
                        &klant_id=<?php echo $_SESSION['klant_id']; ?>" class="btn btn-primary" >
                        Reserveer</a>
                    </td>
                    </tr>
                    
            <?php }
         }
    }?>
    </table>

    <br>
    
    </body>
    
</html>