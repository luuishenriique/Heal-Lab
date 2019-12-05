<?php 
require 'config.php';
session_start();

$id = $_GET['id'];

$PDO = dbConnect();

$sql = "DELETE FROM Administradores WHERE id_adm = :id";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

redirect('cad_administradores.php');
?>