<?php
include_once 'Soal.php';
class SoalPendidikan extends Soal {
    private $kategori_id = 1;

    public function __construct($db, $responseTable, $responseColumn) {
        parent::__construct($db, $responseTable, $responseColumn);
    }

    public function postJawaban($data) {
        parent::postJawaban($data);
    }

    public function getSoalByKategori($kategori_id) {
        return parent::getSoalByKategori($this->kategori_id);
    }

    public function calculateScores() {
        $this->getScoreAllRoles();
    }
}

?>
