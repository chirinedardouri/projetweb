<?php
include "../controller/produitC.php";

$c = new produitC();
$tab = $c->listProduits();

?>

<center>
    <h1>List of products</h1>
    <h2>
        <a href="addproduct.php">Add product</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id produit</th>
        <th>Nom produit</th>
        <th>image</th>
        <th>quantite</th>
        <th>categorie</th>
    </tr>


    <?php
    foreach ($tab as $produit) {
    ?>

        <tr>
            <td><?= $produit['id_prod']; ?></td>
            <td><?= $produit['nom_prod']; ?></td>
            <td><img src="<?php echo $produit['image_prod']; ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
       
            <td><?= $produit['quantite']; ?></td>
            <td><?= $produit['categorie']; ?></td>
            <td align="center">
            <form method="POST" action="updateproduct.php">
    <input type="submit" name="update" value="Update">
    <input type="hidden" value="<?php echo $produit['id_prod']; ?>" name="id_prod">
</form>

            </td>
            <td>
                <a href="deleteproduct.php?id_prod=<?php echo $produit['id_prod']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>