<?php
try {
    $usuario='phpmyadmin';
    $contraseña='root';
    $mbd = new PDO('mysql:host=localhost;dbname=proyecto', $usuario, $contraseña);
    foreach($mbd->query('SELECT * from producto') as $fila) {
        print_r($fila);
    }
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>