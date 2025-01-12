<?php

class Ortu extends User {
    public function __construct($db) {
        $profileTable = 't_responden_ortu';
        $responseTable = 't_jawaban_ortu';
        $responseColumn = 'responden_ortu_id';
        parent::__construct($db, $profileTable, $responseTable, $responseColumn);
    }
    
    public function getJawaban($respondenId) {
        return parent::getJawaban($respondenId);
    }

    public function getOrtuProfile($username) {
        return $this->getProfile($username);
    }

    public function updateOrtuProfile($username, $nama, $password) {
        $this->updateProfile($username, $nama, $password);
    }

    public function deleteJawaban($respondenId) {
        parent::deleteJawaban($respondenId);
    }
}
?>
