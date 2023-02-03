<?php
include("connection.php");
session_start();

$pdo_statement=$con->prepare("DELETE FROM customer WHERE ID=" . $_GET['ID']);
$pdo_statement->execute();
header('location:View_customer.php?sucd');

?>

