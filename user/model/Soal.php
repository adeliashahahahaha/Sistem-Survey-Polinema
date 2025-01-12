<?php
include_once 'PerhitunganValue.php';
class Soal {
    protected $db;
    protected $responseTable;
    protected $responseColumn;
    protected $perhitunganValue;

    public function __construct($db, $responseTable = '', $responseColumn = '') {
        $this->db = $db;
        $this->responseTable = $responseTable;
        $this->responseColumn = $responseColumn;
        $this->perhitunganValue = new PerhitunganValue($db);
    }

    public function postJawaban($data) {
        foreach ($data as $entry) {
            // Insert jawaban ke dalam tabel responseTable
            $stmtInsert = $this->db->prepare("INSERT INTO $this->responseTable (soal_id, jawaban, $this->responseColumn, kategori_id) VALUES (?, ?, ?, ?)");
            $stmtInsert->bind_param("issi", $entry['soal_id'], $entry['jawaban'], $entry[$this->responseColumn], $entry['kategori_id']);
            $stmtInsert->execute();

            // Ambil nilai jawaban
            $jawabanValue = $entry['jawaban'];

            // Konversi jawaban ke skor
            $skor = $this->convertJawabanToScale($jawabanValue);

            // Perbarui skor di tabel responseTable
            $stmtUpdate = $this->db->prepare("UPDATE $this->responseTable SET skor = ?, responden_tanggal = ? WHERE soal_id = ? AND $this->responseColumn = ?");
            $currentTime = date('Y-m-d H:i:s');
            $stmtUpdate->bind_param("isis", $skor, $currentTime, $entry['soal_id'], $entry[$this->responseColumn]);
            $stmtUpdate->execute();
        }
    }

    private function convertJawabanToScale($jawaban) {
        switch ($jawaban) {
            case 'Sangat Puas':
                return 5;
            case 'Puas':
                return 4;
            case 'Cukup':
                return 3;
            case 'Tidak Puas':
                return 2;
            case 'Sangat Tidak Puas':
                return 1;
            default:
                return 0;
        }
    }

    public function getSoalByKategori($kategori_id) {
        $query = "SELECT * FROM m_survey_soal WHERE kategori_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $kategori_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $soal = array();
        while ($row = $result->fetch_assoc()) {
            $soal[] = $row;
        }
        return $soal;
    }

    public function getScoreAllRoles() {
        return $this->perhitunganValue->getScoreAllRoles();
    }
}

?>


