<?php
session_start();
require_once('Database.php');

class Login extends Database {
    public function __construct() {
        parent::__construct();
    }
 
    public function login_user($role, $email, $password) {
        $email = mysqli_real_escape_string($this->get_connection(), $email);
        $password = mysqli_real_escape_string($this->get_connection(), $password);

        if ($role == 'akun_pencari_kerja') {
            $sql = "SELECT id, nama, foto_profil, email, gender, tanggal_lahir, password FROM akun_pencari_kerja WHERE email = '$email'";
        } elseif ($role == 'akun_perusahaan') {
            $sql = "SELECT id, nama, foto_profil, email, password FROM akun_perusahaan WHERE email = '$email'";
        } elseif ($role == 'akun_admin') {
            $sql = "SELECT id, nama, email, password FROM akun_admin WHERE email = '$email'";
        } else {
            return "error : role tidak valid";
        }
        
        $result = mysqli_query($this->get_connection(), $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['role'] = $role;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['email'] = $row['email'];

                    if ($_SESSION['role'] == "akun_pencari_kerja") {
                        $_SESSION['foto_profil'] = $row['foto_profil'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
                        $birthDate = new DateTime($_SESSION['tanggal_lahir']);
                        $currentDate = new DateTime();
                        $age = $currentDate->diff($birthDate)->y;
                        $_SESSION['usia'] = $age;
                    } elseif ($_SESSION['role'] == "akun_perusahaan") {
                        $_SESSION['foto_profil'] = $row['foto_profil'];
                    }

                    header("Location: index.php");
                    exit();
                } else {
                    return 'error : password/email salah';
                }
            } else {
                return 'error : password/email salah';
            }
        } else {
            return 'error :  mysqli error';
        }
    }
}
?>
