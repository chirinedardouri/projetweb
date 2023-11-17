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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $produit = new produit(
            null,
            $_POST['nom_prod'],
            $_POST['image_prod'],
            $_POST['quantite'],
            $_POST['categorie']
        );
        var_dump($produit);
        
        $produitC->updateproduct($produit, $_POST['id_prod']);

        header('Location:listproducts.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listproducts.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_prod'])) {
        $produit = $produitC->showproduit($_POST['id_prod']);
        
    ?>

        <form action="updateproduct.php" method="POST">

            <table>
            <tr>
                    <td><label for="nom_prod">Id produit :</label></td>
                    <td>
                        <input type="text" id="id_prod" name="id_prod" value="<?php echo $_POST['id_prod'] ?>" readonly />
                        <span id="erreurnom_prod" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom_prod">Nom Produit  :</label></td>
                    <td>
                        <input type="text" id="nom_prod" name="nom_prod" value="<?php echo $produit['nom_prod'] ?>" />
                        <span id="erreurnom_prod" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="image_prod">Image :</label></td>
                    <td>
                        <input type="text" id="image_prod" name="image_prod" value="<?php echo $produit['image_prod'] ?>" />
                        <span id="erreurimage_prod" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="quantite">quantite :</label></td>
                    <td>
                        <input type="text" id="quantite" name="quantite" value="<?php echo $produit['quantite'] ?>" />
                        <span id="erreurquantite" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="categorie">Catégorie :</label></td>
                    <td>
                        <input type="text" id="categorie" name="categorie" value="<?php echo $produit['categorie'] ?>" />
                        <span id="erreurcategorie" style="color: red"></span>
                    </td>
                </tr>


                <td>
                    
                    <input type="submit" value="Save" onclick="console.log('Save button clicked');">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>