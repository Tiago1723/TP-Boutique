<?php

class LList extends Model {

    protected $table = "list";

    /**
     * 
     */
    public function GetFromVille($ville){

        $stmt = $this->db->prepare("SELECT * FROM `list` WHERE `Commune principale de déroulement` = ?");
        $stmt->execute([$ville]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 
     */
    public function GetFromStyleMusic($style) {

        $stmt = $this->db->prepare("SELECT * FROM `list` WHERE `Sous-catégorie musique` LIKE '%?%' AND `Discipline dominante` = 'musique'");
        $stmt->execute([$style]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }




    ///////
    //      GET ALL 
    ///////



    /**
     * 
     */
    public function GetAllTypesMusique(){

        $stmt = $this->db->prepare("SELECT DISTINCT `Sous-catégorie musique` as r FROM `list` WHERE `Discipline dominante` = 'musique'");
        $stmt->execute([]);
        $list_type_brut = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $list_types = [];

        foreach($list_type_brut as $l){
            $values = explode(",", $l['r']);
            $list_types = array_merge($list_types, $values); 
        }

        $list_types = array_unique($list_types);

        return $list_types;
    }

    /**
     * 
     */
    public function GetAllVille(){

        $stmt = $this->db->prepare("SELECT `Commune principale de déroulement` as r FROM `list`");
        $stmt->execute([]);
        $list_type_brut = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $list_ville = [];

        foreach($list_type_brut as $l){
            $values = $l['r'];
            $list_ville = array_merge($list_ville, $values); 
        }

        $list_ville = array_unique($list_ville);

        return $list_ville;
    }
}