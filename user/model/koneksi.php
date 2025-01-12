<?php
if (!class_exists('Koneksi')) {
    class Koneksi {
        public $db;

        public function __construct($host = 'localhost', $username = 'root', $password = '', $dbname = 'sispolin') {
            $this->db = new mysqli($host, $username, $password, $dbname);

            if ($this->db->connect_error) {
                die('Connection failed: ' . $this->db->connect_error);
            }
        }

        public function getConnection() {
            return $this->db;
        }
    }
}
?>
