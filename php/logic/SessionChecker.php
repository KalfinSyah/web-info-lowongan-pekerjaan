<?php
    session_start();

    class SessionChecker {
        public function __construct() {
            if (!isset($_SESSION['id']) || !isset($_SESSION['nama']) || !isset($_SESSION['email']) || !isset($_SESSION['role'])) {
                header("Location: ./login.php");
                exit;
            }
        }

        public function get_id() {
            return $_SESSION['id'];
        }
        
        public function get_nama() {
            return $_SESSION['nama'];
        }

        public function get_email() {
            return $_SESSION['email'];
        }

        public function get_role() {
            return $_SESSION['role'];
        }
    }
?>
