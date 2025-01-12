<?php

class Industri extends User {
    public function __construct($db) {
        $profileTable = 't_responden_industri';
        $responseTable = 't_jawaban_industri';
        $responseColumn = 'responden_industri_id';
        parent::__construct($db, $profileTable, $responseTable, $responseColumn);
    }

    public function getIndustriProfile($username) {
        return $this->getProfile($username);
    }
    
    public function getJawaban($respondenId) {
        return parent::getJawaban($respondenId);
    }

    public function updateIndustriProfile($username, $nama, $password) {
        $this->updateProfile($username, $nama, $password);
    }

    public function deleteJawaban($respondenId) {
        parent::deleteJawaban($respondenId);
    }
}
?>
