<?php
session_start();
require_once('Database.php');

class Login extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function loginUser($email, $password) {
        $email = mysqli_real_escape_string($this->getConnection(), $email);
        $password = mysqli_real_escape_string($this->getConnection(), $password);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->getConnection(), $sql);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['id'] = $row['id'];

                    if ($row['role'] == 'perusahaan') {
                        header("Location: index_perusahaan.php");
                    } elseif ($row['role'] == 'pencari_kerja') {
                        header("Location: index.php");
                    }
                    exit();
                } else {
                    echo '<script>alert("USERNAME/PASSWORD SALAH!");</script>';
                }
            } else {
                echo '<script>alert("USERNAME/PASSWORD SALAH!");</script>';
            }
        } else {
            echo '<script>alert("USERNAME/PASSWORD SALAH!");</script>';
        }
    }
}
