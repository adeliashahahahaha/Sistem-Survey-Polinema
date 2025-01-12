<?php 
class Survey{
    public $db;
    protected $table = 'm_survey';

    public function __construct(){
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (survey_id, user_id, survey_kode, survey_nama, survey_deskripsi, survey_tanggal) values(?,?,?,?,?,?)");

        // ambil data tanggal dari form
        $tanggal = date('Y-m-d H:i:s', strtotime($data['survey_tanggal']));

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('iissss', $data['survey_id'], $data['user_id'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $tanggal);

        // eksekusi query untuk menyimpan ke database
        if (!$query->execute()) {
            throw new mysqli_sql_exception("Error executing query: " . $query->error);
        }
    }

    public function getData() {
        // query untuk mengambil data dari tabel survey dengan format tanggal dd-mm-yyyy
        return $this->db->query("SELECT survey_id, survey_kode, survey_nama, survey_deskripsi,
                                DATE_FORMAT(survey_tanggal, '%d-%m-%Y %H:%i:%s') AS survey_tanggal
                                FROM {$this->table}");
    }
    
    public function getDataById($id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where survey_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data){
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} SET user_id = ?, survey_kode = ?, survey_nama = ?, survey_deskripsi = ?, survey_tanggal = ? WHERE survey_id = ?");

        // ambil data tanggal dari form
        $tanggal = date('Y-m-d H:i:s', strtotime($data['survey_tanggal']));

        // binding parameter ke query
        $query->bind_param('issssi', $data['user_id'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $tanggal, $id);

        // eksekusi query
        if (!$query->execute()) {
            throw new mysqli_sql_exception("Error executing query: " . $query->error);
        }
    }

    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where survey_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }
}
