<?php 
    require_once('Database.php');

    class Register extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function registerUser($username, $email, $password, $confirmPassword) {
            $mistake = '';
            if (strlen($username) < 4) {
                echo '<script>alert("USERNAME MINIMAL 4 KARAKTER");</script>';
                $mistake .= '1';
            }

            if (empty($email)) {
                echo '<script>alert("EMAIL WAJIB DI ISI");</script>';
                $mistake .= '2';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("EMAIL TIDAK VALID");</script>';
                $mistake .= '3';
            } elseif ($this->emailExists($email)) {
                echo '<script>alert("EMAIL SUDAH DIGUNAKAN");</script>';
                $mistake .= '4';
            }

            if (strlen($password) < 8) {
                echo '<script>alert("PASSWORD MINIMAL 8 KARAKTER");</script>';
                $mistake .= '5';
            }

            if ($password != $confirmPassword) {
                echo '<script>alert("PASSWORD TIDAK SAMA DENGAN CONFIRM PASSWORD");</script>';
                $mistake .= '6';
            }

            if (empty($mistake)) {
                $username = mysqli_real_escape_string($this->getConnection(), $username);
                $email = mysqli_real_escape_string($this->getConnection(), $email);
                $password = mysqli_real_escape_string($this->getConnection(), $password);
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email' ,'$passwordHash')";
                if (mysqli_query($this->getConnection(), $sql)) {
                    echo '<script>alert("REGISTRASI SUKSES!");</script>';

                } else {
                    echo '<script>alert("TERJADI ERROR");</script>';
                }
            }
        }

        private function emailExists($email) {
            $email = mysqli_real_escape_string($this->getConnection(), $email);
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($this->getConnection(), $sql);
            return mysqli_num_rows($result) > 0;
        }
    }
?>
