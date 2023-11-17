<?php

require '../config.php';

class produitC
{

    public function listProduits()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduct($id_prod)
    {
        $sql = "DELETE FROM produit WHERE id_prod = :id_prod";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_prod', $id_prod);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addproduct($produit)
    {
        $sql = "INSERT INTO produit  
        VALUES (NULL, :nom_prod,:image_prod, :quantite,:categorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_prod' => $produit->getNom(),
                'image_prod' => $produit->getimageprod(),
                'quantite' => $produit->getquantite(),
                'categorie' => $produit->getcategorie(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showproduit($id_prod)
    {
        $sql = "SELECT * FROM produit WHERE id_prod = $id_prod";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();
            
            if (!$produit) {
                // No record found
                echo 'No product found with the given ID.';
                return null;
            }
    
            return $produit;
        } catch (Exception $e) {
            // Log the error to a file or output it for debugging
            error_log('Error: ' . $e->getMessage());
            // Output a message to the browser for debugging
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
    

    function updateproduct($produit, $id_produit)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE produit SET 
                nom_prod = :nom_prod, 
                image_prod = :image_prod, 
                quantite = :quantite, 
                categorie = :categorie
            WHERE id_prod = :id_prod'
        );
        
        $query->execute([
            'id_prod' => $id_produit,
            'nom_prod' => $produit->getNom(),
            'image_prod' => $produit->getimageprod(),
            'quantite' => $produit->getquantite(),
            'categorie' => $produit->getcategorie(),
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Output the error message
    }
}

}
