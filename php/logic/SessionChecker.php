<?php
    session_start();

    class SessionChecker {
        public function __construct() {
            if (!isset($_SESSION['id']) || !isset($_SESSION['nama']) || !isset($_SESSION['email']) || !isset($_SESSION['role'])) {
                header("Location: ./login.php");
                exit;
            }
        }
    }
?>
