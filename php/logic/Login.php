<?php
session_start();
require_once('Database.php');

class Login extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function login_user($email, $password) {
        $email = mysqli_real_escape_string($this->get_connection(), $email);
        $password = mysqli_real_escape_string($this->get_connection(), $password);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->get_connection(), $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = $row['role'];
                    header("Location: index.php");
                    exit();
                } else {
                    return 'Error : Password/Email salah';
                }
            } else {
                return 'Error : Password/Email salah';
            }
        } else {
            return 'Error :  Mysqli error';
        }
    }
}
?>
