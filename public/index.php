<?php 
session_start();
    include './../app/configuracao.php';
    include './../app/autoload.php';

   // $d = new Conexao; // ?
    // date_default_timezone_set('America/Sao_Paulo');



?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JMV</title>
</head>
<body>
    <?php
    include '../app/Views/topo.php';
        $rota1 = new Rota();
            
    include '../app/Views/rodape.php';    
    ?>
</body> 
</html>