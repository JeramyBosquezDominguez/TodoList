<?php 

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "") ;
    } catch(PDOException $exp) {
        die("Se ha producido un error: ".$exp->getMessage()) ;
    }

    $rest = $pdo->query("SELECT * FROM prueba ;") ;

    foreach($rest as $item):
        echo $item["texto"] ;
    endforeach ;

