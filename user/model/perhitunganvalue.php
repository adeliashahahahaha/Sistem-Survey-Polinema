<?php

class PerhitunganValue
{
    private $koneksi;

    public function __construct($db)
    {
        $this->koneksi = $db;
    }

    private function getCategoryScore($responseTable, $surveyType, $kategori_id)
    {
        $query = "
            SELECT
                SUM(j.skor) as total_skor
            FROM
                $responseTable j
            JOIN
                m_survey_soal s ON j.soal_id = s.soal_id
            WHERE
                s.survey_jenis = ? AND
                j.kategori_id = ?;
        ";

        $stmt = $this->koneksi->prepare($query);
        $stmt->bind_param("si", $surveyType, $kategori_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die('Query Error: ' . $this->koneksi->error);
        }

        $row = $result->fetch_assoc();
        return $row['total_skor'];
    }

    public function getScoreAllRoles() {
        $roles = ['mahasiswa', 'dosen', 'tendik', 'alumni', 'industri', 'ortu'];
        $surveyTypes = ['Tangible', 'Reability', 'Responsiveness', 'Assurance', 'Empathy'];
        
        $kategoriIds = [];
        
        // Ambil kategori_id yang ada pada setiap tabel jawaban berdasarkan roles
        foreach ($roles as $role) {
            switch ($role) {
                case 'mahasiswa':
                    $responseTable = 't_jawaban_mahasiswa';
                    break;
                case 'dosen':
                    $responseTable = 't_jawaban_dosen';
                    break;
                case 'tendik':
                    $responseTable = 't_jawaban_tendik';
                    break;
                case 'alumni':
                    $responseTable = 't_jawaban_alumni';
                    break;
                case 'industri':
                    $responseTable = 't_jawaban_industri';
                    break;
                case 'ortu':
                    $responseTable = 't_jawaban_ortu';
                    break;
                default:
                    continue 2;
            }
    
            $query = "SELECT DISTINCT kategori_id FROM $responseTable";
            $stmt = $this->koneksi->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $kategoriIds[] = $row['kategori_id'];
            }
        }
        
        // Menghilangkan duplikat kategori_id
        $kategoriIds = array_unique($kategoriIds);
    
        foreach ($surveyTypes as $surveyType) {
            foreach ($kategoriIds as $kategoriId) {
                $totalScore = 0;
    
                foreach ($roles as $role) {
                    switch ($role) {
                        case 'mahasiswa':
                            $responseTable = 't_jawaban_mahasiswa';
                            break;
                        case 'dosen':
                            $responseTable = 't_jawaban_dosen';
                            break;
                        case 'tendik':
                            $responseTable = 't_jawaban_tendik';
                            break;
                        case 'alumni':
                            $responseTable = 't_jawaban_alumni';
                            break;
                        case 'industri':
                            $responseTable = 't_jawaban_industri';
                            break;
                        case 'ortu':
                            $responseTable = 't_jawaban_ortu';
                            break;
                        default:
                            continue 2;
                    }
    
                    $score = $this->getCategoryScore($responseTable, $surveyType, $kategoriId);
                    if ($score !== null) {
                        $totalScore += $score;
                    }
                }
    
                // Pastikan total score dibagi dengan 18
                $value = $totalScore / 18;
                $this->saveEvaluationScore($kategoriId, $value, $surveyType);
            }
        }
    }
    
    // public function saveEvaluationScore($kategoriId, $value, $surveyType) {
    //     $idCriteria = $this->generateIdCriteria($surveyType);
    
    //     $queryCheck = "SELECT * FROM eda_evaluations WHERE id_criteria = ? AND id_alternative = ?";
    //     $stmtCheck = $this->koneksi->prepare($queryCheck);
    //     $stmtCheck->bind_param("ii", $idCriteria, $kategoriId);
    //     $stmtCheck->execute();
    //     $resultCheck = $stmtCheck->get_result();
    
    //     if ($resultCheck->num_rows > 0) {
    //         $queryUpdate = "UPDATE eda_evaluations SET value = ? WHERE id_criteria = ? AND id_alternative = ?";
    //         $stmtUpdate = $this->koneksi->prepare($queryUpdate);
    //         $stmtUpdate->bind_param("dii", $value, $idCriteria, $kategoriId);
    //         $stmtUpdate->execute();
    //     } else {
    //         $queryInsert = "INSERT INTO eda_evaluations (id_criteria, value, id_alternative) VALUES (?, ?, ?)";
    //         $stmtInsert = $this->koneksi->prepare($queryInsert);
    //         $stmtInsert->bind_param("idi", $idCriteria, $value, $kategoriId);
    //         $stmtInsert->execute();
    //     }
    // }

    //ada update waktunya
    public function saveEvaluationScore($kategoriId, $value, $surveyType) {
        $idCriteria = $this->generateIdCriteria($surveyType);
        $currentTimestamp = date('Y-m-d H:i:s');
        
        $queryCheck = "SELECT * FROM eda_evaluations WHERE id_criteria = ? AND id_alternative = ?";
        $stmtCheck = $this->koneksi->prepare($queryCheck);
        $stmtCheck->bind_param("ii", $idCriteria, $kategoriId);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();
        
        if ($resultCheck->num_rows > 0) {
            $queryUpdate = "UPDATE eda_evaluations SET value = ?, updated_at = ? WHERE id_criteria = ? AND id_alternative = ?";
            $stmtUpdate = $this->koneksi->prepare($queryUpdate);
            $stmtUpdate->bind_param("dsii", $value, $currentTimestamp, $idCriteria, $kategoriId);
            $stmtUpdate->execute();
        } else {
            $queryInsert = "INSERT INTO eda_evaluations (id_criteria, value, id_alternative, updated_at) VALUES (?, ?, ?, ?)";
            $stmtInsert = $this->koneksi->prepare($queryInsert);
            $stmtInsert->bind_param("idis", $idCriteria, $value, $kategoriId, $currentTimestamp);
            $stmtInsert->execute();
        }
    }
    
    
    private function generateIdCriteria($surveyType) {
        $surveyTypeIdMap = [
            'Tangible' => 1,
            'Reability' => 2,
            'Responsiveness' => 3,
            'Assurance' => 4,
            'Empathy' => 5
        ];
        return $surveyTypeIdMap[$surveyType];
    }
}
