<?php

class Alumni extends User {
    public function __construct($db) {
        $profileTable = 't_responden_alumni';
        $responseTable = 't_jawaban_alumni';
        $responseColumn = 'responden_alumni_id';
        parent::__construct($db, $profileTable, $responseTable, $responseColumn);
    }
    
    public function getJawaban($respondenId) {
        return parent::getJawaban($respondenId);
    }

    public function getAlumniProfile($username) {
        return $this->getProfile($username);
    }

    public function updateAlumniProfile($username, $nama, $password) {
        $this->updateProfile($username, $nama, $password);
    }

    public function deleteJawaban($respondenId) {
        parent::deleteJawaban($respondenId);
    }
}


?>
