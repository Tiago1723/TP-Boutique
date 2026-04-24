<?php

class Categorie extends Model {

    protected $table = "categories";

    /*
     * Récupère toutes les catégories
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