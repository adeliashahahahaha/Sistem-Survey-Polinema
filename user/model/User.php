<?php

class User {
    protected $db;
    protected $profileTable;
    protected $responseTable;
    protected $responseColumn;

    public function __construct($db, $profileTable, $responseTable, $responseColumn) {
        $this->db = $db;
        $this->profileTable = $profileTable;
        $this->responseTable = $responseTable;
        $this->responseColumn = $responseColumn;
    }

    public function getProfile($username) {
        $stmt = $this->db->prepare("SELECT * FROM $this->profileTable WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function updateProfile($username, $nama, $nim, $prodi, $email, $hp, $tahun_masuk) {
        $stmt = $this->db->prepare("UPDATE $this->profileTable SET responden_nama = ?, responden_nim = ?, responden_prodi = ?, responden_email = ?, responden_hp = ?, tahun_masuk = ? WHERE username = ?");
        $stmt->bind_param("ssssiss", $nama, $nim, $prodi, $email, $hp, $tahun_masuk, $username);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getJawaban($respondenId) {
        $stmt = $this->db->prepare("SELECT * FROM $this->responseTable WHERE $this->responseColumn = ?");
        $stmt->bind_param("i", $respondenId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $jawaban = array();
        while ($row = $result->fetch_assoc()) {
            $jawaban[] = $row;
        }
        return $jawaban;
    }
    
    public function deleteJawaban($respondenId) {
        $stmt = $this->db->prepare("DELETE FROM $this->responseTable WHERE $this->responseColumn = ?");
        $stmt->bind_param("i", $respondenId);
        $stmt->execute();
    }
        
}
?>
