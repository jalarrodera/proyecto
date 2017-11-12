<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nombre =  $_POST['seleccion'];
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

$sql = "UPDATE producto SET precio='$precio', stock='$stock', descuento='$descuento', categoria='$categoria', marca='$marca' WHERE nombre='$nombre'";

if ($conn->query($sql) === TRUE) {
    echo "Se ha actualizado el producto";
} else {
    echo "Error updating record: " . $conn->error;
}