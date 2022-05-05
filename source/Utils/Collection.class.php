<?php

class Collection {

    private $colObjet;

    public function Collection() {
        $this->colObjet = array();
    }

    public function add($unobj) {
        $this->colObjet[] = $unobj;
    }

    public function getAll() {
        return $this->colObjet;
    }

}

?>
