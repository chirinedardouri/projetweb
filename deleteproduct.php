<?php
include '../Controller/produitC.php';
$clientC = new produitC();
$clientC->deleteproduct($_GET["id_prod"]);
header('Location:listproducts.php');
?>