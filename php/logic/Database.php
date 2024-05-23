<?php
    class Database {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'web_info_loker_db';
        private $conn;

        public function __construct() {
            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }

        public function get_connection() {
            return $this->conn;
        }
    }
?>