<?php

$nombre =  $_POST['seleccion'];


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
$sql = "DELETE FROM producto WHERE nombre='$nombre'";

if ($conn->query($sql) === TRUE) {
    echo "Se ha eliminado el producto";
} else {
    echo "Error deleting record: " . $conn->error;
}
