<?php

class Tendik extends User {
    public function __construct($db) {
        $profileTable = 't_responden_tendik';
        $responseTable = 't_jawaban_tendik';
        $responseColumn = 'responden_tendik_id';
        parent::__construct($db, $profileTable, $responseTable, $responseColumn);
    }

    public function getJawaban($respondenId) {
        return parent::getJawaban($respondenId);
    }

    public function getTendikProfile($username) {
        return $this->getProfile($username);
    }

    public function updateTendikProfile($username, $nama, $password) {
        $this->updateProfile($username, $nama, $password);
    }

    public function deleteJawaban($respondenId) {
        parent::deleteJawaban($respondenId);
    }
}
?>
