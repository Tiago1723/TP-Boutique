<?php

class Produit extends Model {

    protected $table = "produits";

    /*
     * Récupère toutes les produits
     * 
     * @param void
     * @return array
     */
    public function getAll(){
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table);
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}