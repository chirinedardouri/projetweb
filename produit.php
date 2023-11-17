<?php
class produit
{
    private ?int $id_prod = null;
    private ?string $nom_prod = null;
    private ?string $image_prod = null;
    private ?int $quantite = null;
    private ?string $categorie = null;

    public function __construct($id = null, $n, $i, $q, $c)
    {
        $this->id_prod = $id;
        $this->nom_prod = $n;
        $this->image_prod = $i;
        $this->quantite = $q;
        $this->categorie = $c;
    }


    public function getIdProduit()
    {
        return $this->id_prod;
    }


    public function getNom()
    {
        return $this->nom_prod;
    }


    public function setNom($nom_prod)
    {
        $this->nom_prod = $nom_prod;

        return $this;
    }


    public function getimageprod()
    {
        return $this->image_prod;
    }


    public function setimageprod($image_prod)
    {
        $this->image_prod = $image_prod;

        return $this;
    }


    public function getquantite()
    {
        return $this->quantite;
    }


    public function setquantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }


    public function getcategorie()
    {
        return $this->categorie;
    }


    public function setcategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
}
