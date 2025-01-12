<?php

class Dosen extends User {
    public function __construct($db) {
        $profileTable = 't_responden_dosen';
        $responseTable = 't_jawaban_dosen';
        $responseColumn = 'responden_dosen_id';
        parent::__construct($db, $profileTable, $responseTable, $responseColumn);
    }
    
    public function getJawaban($respondenId) {
        return parent::getJawaban($respondenId);
    }

    public function getDosenProfile($username) {
        return $this->getProfile($username);
    }

    public function updateDosenProfile($username, $nama, $password) {
        $this->updateProfile($username, $nama, $password);
    }

    public function deleteJawaban($respondenId) {
        parent::deleteJawaban($respondenId);
    }
}
?>