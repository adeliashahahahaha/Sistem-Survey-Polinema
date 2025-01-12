<?php 
class Soal{
    public $db;
    protected $table = 'm_survey_soal';

    public function __construct(){
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data) {
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (soal_id, survey_id, kategori_id, no_urut, soal_jenis, survey_jenis, soal_pertanyaan) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        // binding parameter ke query, "iiiisss" means the first four are integers and the last three are strings
        $query->bind_param('iiiisss', $data['soal_id'], $data['survey_id'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis'], $data['survey_jenis'], $data['soal_pertanyaan']);
        
        // eksekusi query untuk menyimpan ke database
        if (!$query->execute()) {
            throw new mysqli_sql_exception("Error executing query: " . $query->error);
        }
    }
        

    // public function getData(){
    //     // query untuk mengambil data dari tabel bank_soal
    //     return $this->db->query("select * from {$this->table} ");
    // }

    public function getData() {
        $query = "SELECT s.soal_id, s.soal_jenis, m.survey_nama, s.soal_pertanyaan, s.survey_jenis
                  FROM m_survey_soal s
                  JOIN m_survey m ON s.survey_id = m.survey_id";
        return $this->db->query($query);
    }
    

    public function getDataById($id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where soal_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data){
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set soal_id = ?, survey_id = ?, kategori_id = ?, no_urut = ?, soal_jenis = ?, survey_jenis = ?, soal_pertanyaan = ? where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('iiissssi', $data['soal_id'], $data['survey_id'], $data['kategori_id'], $data['no_urut'], $data['soal_jenis'], $data['survey_jenis'], $data['soal_pertanyaan'], $id);
        // eksekusi query
        $query->execute();
    }

    //ini function delet data biasa
    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where soal_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }

    //function detele data auto se jawaban yang sudah kecantol sekalian bisa ilang jg
    // public function deleteData($id){
    //     try {
    //         // Begin transaction
    //         $this->db->begin_transaction();
    
    //         // Delete dependent records in t_jawaban_mahasiswa
    //         $deleteJawabanQuery = $this->db->prepare("DELETE FROM t_jawaban_mahasiswa WHERE soal_id = ?");
    //         $deleteJawabanQuery->bind_param('i', $id);
    //         $deleteJawabanQuery->execute();
    
    //         // Delete record in m_survey_soal
    //         $deleteSoalQuery = $this->db->prepare("DELETE FROM {$this->table} WHERE soal_id = ?");
    //         $deleteSoalQuery->bind_param('i', $id);
    //         $deleteSoalQuery->execute();
    
    //         // Commit transaction
    //         $this->db->commit();
    //     } catch (mysqli_sql_exception $e) {
    //         // Rollback transaction on error
    //         $this->db->rollback();
    //         throw $e; // Re-throw the exception after rollback
    //     }
    // }
    
    public function getEnumValues() {
        $result = $this->db->query("SHOW COLUMNS FROM {$this->table} LIKE 'soal_jenis'");
        $row = $result->fetch_assoc();
        preg_match("/^enum\(\'(.*)\'\)$/", $row['Type'], $matches);
        return explode("','", $matches[1]);
    }

    public function getEnumSurveyJenis() {
        $result = $this->db->query("SHOW COLUMNS FROM {$this->table} LIKE 'survey_jenis'");
        $row = $result->fetch_assoc();
        preg_match("/^enum\(\'(.*)\'\)$/", $row['Type'], $matches);
        return explode("','", $matches[1]);
    }

}