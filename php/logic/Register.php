<?php
require_once('Database.php');

class Register extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function register_user($nama, $email, $password, $konfirmasi_password, $role) {
        $valid_role = array('pencari_kerja', 'perusahaan');

        if (!in_array($role, $valid_role)) {
            return 'Error : Invalid Role';
        }
        if (strlen($nama) < 4) {
            return 'Error : Nama minimal 4 karakter';
        } 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Error : Penulisan email tidak valid';
        } 
        if ($this->email_exists($email)) {
            return 'Error : Email sudah terdaftar';
        }
        if ($password != $konfirmasi_password) {
            return 'Error : Pastikan password dan konformasi password sama';
        } 
        if (strlen($password) < 8) {
            return 'Error : Password minimal 8 karakter';
        } 

        $nama = mysqli_real_escape_string($this->get_connection(), $nama);
        $email = mysqli_real_escape_string($this->get_connection(), $email);
        $password = mysqli_real_escape_string($this->get_connection(), $password);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $role = mysqli_real_escape_string($this->get_connection(), $role);

        $sql = "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$passwordHash', '$role')";
        if (mysqli_query($this->get_connection(), $sql)) {
            header("Location: login.php");
            exit();
        } else {
            return 'Error :  Mysqli error';
        }
    }

    private function email_exists($email) {
        $email = mysqli_real_escape_string($this->get_connection(), $email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->get_connection(), $sql);
        return mysqli_num_rows($result) > 0;
    }
}
?>
