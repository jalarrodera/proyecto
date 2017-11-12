<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$descuento = $_POST['descuento'];
$categoria = $_POST['categoria'];
$marca = $_POST['marca'];




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

$sql = "INSERT INTO producto (codigo,nombre,precio, stock, descuento, categoria, marca) "
                . "VALUES ('$codigo','$nombre','$precio','$stock','$descuento','$categoria','$marca')";


if ($conn->multi_query($sql) === TRUE) {
    echo "Los datos han sido insertados";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
