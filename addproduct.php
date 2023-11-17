<?php

include '../controller/produitC.php';
include '../model/produit.php';

$error = "";

// create product
$produit = null;

// create an instance of the controller
$produitC = new produitC();

if (
    isset($_POST["nom_prod"]) &&
    isset($_POST["image_prod"]) &&
    isset($_POST["quantite"]) &&
    isset($_POST["categorie"])
) {
    if (
        !empty($_POST["nom_prod"]) &&
        !empty($_POST["image_prod"]) &&
        !empty($_POST["quantite"]) &&
        !empty($_POST["categorie"])
    ) {
        $produit = new Produit(
            null,
          
            $_POST['nom_prod'],
            $_POST['image_prod'],
            $_POST['quantite'],
            $_POST['categorie']
        );
        $produitC->addproduct($produit);
        header('Location:listproducts.php');
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>

<body>
    <a href="listProduits.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            
            <tr>
                <td><label for="nom_prod">Nom du produit :</label></td>
                <td>
                    <input type="text" id="nom_prod" name="nom_prod" />
                    <span id="erreurNomProd" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="image_prod">Image du produit :</label></td>
                <td>
                    <input type="text" id="image_prod" name="image_prod" />
                    <span id="erreurImageProd" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="quantite">Quantité :</label></td>
                <td>
                    <input type="text" id="quantite" name="quantite" />
                    <span id="erreurQuantite" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="categorie">Catégorie :</label></td>
                <td>
                    <input type="text" id="categorie" name="categorie" />
                    <span id="erreurCategorie" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>