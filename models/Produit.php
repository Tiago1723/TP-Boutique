<?php

class Produit extends Model {

    protected $table = "produits";

    /*
     * Récupère toutes les produits
     * 
     * @param void
     * @return array
     */
    public function getAllAndCategorieName(){
        $stmt = $this->db->prepare("
            SELECT produits.*, categories.nom AS categorie_nom FROM " . $this->table . "
            JOIN categories ON produits.id_categorie = categories.id;
        ");
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}