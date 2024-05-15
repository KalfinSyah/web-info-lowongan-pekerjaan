<?php
    session_start();

    class SessionChecker {
        public function __construct() {
            if (!isset($_SESSION['email'])) {
                header("Location: ./login.php");
                exit();
            }
        }

        public function getEmail() {
            return $_SESSION['email'];
        }
    }
?>
