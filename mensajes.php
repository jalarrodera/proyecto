<?php

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];
$leido = 'no';
$servername = "localhost";
$username = "phpmyadmin";
$password = "root";
$dbname = "proyecto";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO mensaje (nombre,telefono, email, mensaje, leido) "
        . "VALUES ('$nombre','$telefono','$email','$mensaje', '$leido')";


if ($conn->multi_query($sql) === TRUE) {
    echo "Su mensaje ha sido enviado";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
