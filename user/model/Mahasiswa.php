<?php

class Mahasiswa extends User {
    public function __construct($db) {
        $profileTable = 't_responden_mahasiswa';
        $responseTable = 't_jawaban_mahasiswa';
        $responseColumn = 'responden_mahasiswa_id';
        parent::__construct($db, $profileTable, $responseTable, $responseColumn);
    }
    
    public function getMhsProfile($username) {
        return $this->getProfile($username);
    }
    
    public function getJawaban($respondenId) {
        return parent::getJawaban($respondenId);
    }

    public function deleteJawaban($respondenId) {
        parent::deleteJawaban($respondenId);
    }
}
?>
