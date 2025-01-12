<?php 
class User {
    public $db;

    public function __construct() {
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    // public function insertData($data) {
    //     if (!isset($data['role'])) {
    //         throw new Exception('Role is not set');
    //     }
    //     $table = $this->getTableByRole($data['role']);
    //     $query = $this->db->prepare("INSERT INTO {$table} (username, responden_nama, password) VALUES (?, ?, ?)");
    //     $query->bind_param('sss', $data['username'], $data['responden_nama'], $data['password']);
    //     $query->execute();
    // }
    
    public function insertData($data) {
        if (!isset($data['role'])) {
            throw new Exception('Role is not set');
        }
        
        $table = $this->getTableByRole($data['role']);
        $fields = $this->getFieldsByRole($data['role']);
        
        $columns = implode(", ", array_keys($fields));
        $placeholders = implode(", ", array_fill(0, count($fields), '?'));
        $types = implode('', array_values($fields));
        
        $query = $this->db->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})");
        
        $params = [];
        foreach (array_keys($fields) as $field) {
            $params[] = $data[$field];
        }
        
        $query->bind_param($types, ...$params);
        $query->execute();
    }

    public function getData() {
        $results = [];
        $roles = ['mahasiswa', 'dosen', 'ortu', 'tendik', 'industri', 'alumni'];
        foreach ($roles as $role) {
            $table = $this->getTableByRole($role);
            $query = $this->db->query("SELECT * FROM {$table}");
            while ($row = $query->fetch_assoc()) {
                $row['role'] = $role;
                $results[] = $row;
            }
        }
        return $results;
    }

    public function getDataById($id, $role) {
        $table = $this->getTableByRole($role);
        $query = $this->db->prepare("SELECT * FROM {$table} WHERE responden_{$role}_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result();
    }
 
    public function updateData($id, $data) {
        $table = $this->getTableByRole($data['role']);
        $fields = $this->getFieldsByRole($data['role']);

        $setClause = [];
        foreach (array_keys($fields) as $field) {
            $setClause[] = "{$field} = ?";
        }
        $setClause = implode(", ", $setClause);

        $types = implode('', array_values($fields)) . 'i';
        $params = [];
        foreach (array_keys($fields) as $field) {
            $params[] = $data[$field];
        }
        $params[] = $id;

        $query = $this->db->prepare("UPDATE {$table} SET {$setClause} WHERE responden_{$data['role']}_id = ?");
        $query->bind_param($types, ...$params);
        $query->execute();
    }
    
    public function deleteData($id, $role) {
        $table = $this->getTableByRole($role);
        $query = $this->db->prepare("DELETE FROM {$table} WHERE responden_{$role}_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
    }

    private function getTableByRole($role) {
        switch ($role) {
            case 'mahasiswa':
                return 't_responden_mahasiswa';
            case 'dosen':
                return 't_responden_dosen';
            case 'ortu':
                return 't_responden_ortu';
            case 'tendik':
                return 't_responden_tendik';
            case 'industri':
                return 't_responden_industri';
            case 'alumni':
                return 't_responden_alumni';
            default:
                throw new Exception("Invalid role");
        }
    }

    private function getFieldsByRole($role) {
        switch ($role) {
            case 'mahasiswa':
                return [
                    'username' => 's',
                    'responden_nama' => 's',
                    'password' => 's',
                    'responden_nim' => 's',
                    'responden_prodi' => 's',
                    'responden_email' => 's',
                    'responden_hp' => 's',
                    'tahun_masuk' => 's'
                ];
            case 'dosen':
                return [
                    'username' => 's',
                    'responden_nama' => 's',
                    'password' => 's',
                    'responden_nip' => 's',
                    'responden_unit' => 's'
                ];
            case 'ortu':
                return [
                    'username' => 's',
                    'responden_nama' => 's',
                    'password' => 's',
                    'responden_umur' => 's',
                    'responden_jk' => 's',
                    'responden_hp' => 's',
                    'responden_pendidikan' => 's',
                    'responden_pekerjaan' => 's',
                    'responden_penghasilan' => 's',
                    'mahasiswa_nim' => 's',
                    'mahasiswa_nama' => 's',
                    'mahasiswa_prodi' => 's'
                ];
            case 'tendik':
                return [
                    'username' => 's',
                    'responden_nama' => 's',
                    'password' => 's',
                    'responden_nopeg' => 's',
                    'responden_unit' => 's'
                ];
            case 'industri':
                return [
                    'username' => 's',
                    'responden_nama' => 's',
                    'password' => 's',
                    'responden_jabatan' => 's',
                    'responden_perusahaan' => 's',
                    'responden_email' => 's',
                    'responden_hp' => 's',
                    'responden_kota' => 's'
                ];
            case 'alumni':
                return [
                    'username' => 's',
                    'responden_nama' => 's',
                    'password' => 's',
                    'responden_nim' => 's',
                    'responden_prodi' => 's',
                    'responden_email' => 's',
                    'responden_hp' => 's',
                    'tahun_lulus' => 's'
                ];
            default:
                throw new Exception("Invalid role");
        }
    }
}
?>
