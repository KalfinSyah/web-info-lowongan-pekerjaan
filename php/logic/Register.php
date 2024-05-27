<?php
require_once('Database.php');

class Register extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function register_pekerja($nama, $tanggal_lahir, $gender, $foto_profil, $email, $password, $konfirmasi_password) {
        if (strlen($nama) < 4) {
            return 'error : nama minimal 4 karakter';
        } 

        if (!$this->is_valid_date_format($tanggal_lahir)) {
            return "error : tanggal tidak valid";
        }

        if (!in_array($gender, array('Pria', 'Wanita'))) {
            return 'error : gender tidak valid';
        }

        $upload_dir = 'uploads/foto_profil/akun_pencari_kerja/';
        $allowed_ext = array('png');
        $max_file_size = 5 * 1024 * 1024;
        $foto_profil_name = $this->upload_foto_profile($foto_profil, $upload_dir, $allowed_ext, $max_file_size);
        if ($foto_profil_name === false) {
            return 'error : foto profil harus berformat .png dan berukuran maksimal 5 MB';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'error : email tidak valid';
        } 

        if ($this->email_exists($email, 'akun_pencari_kerja')) {
            return 'error : email sudah terdaftar';
        }

        if (strlen($password) < 8) {
            return 'error : password minimal 8 karakter';
        } 

        if ($password != $konfirmasi_password) {
            return 'error : password dan konfirmasi password tidak sama';
        } 

        $nama = mysqli_real_escape_string($this->get_connection(), $nama);
        $tanggal_lahir = mysqli_real_escape_string($this->get_connection(), $tanggal_lahir);
        $gender = mysqli_real_escape_string($this->get_connection(), $gender);
        $email = mysqli_real_escape_string($this->get_connection(), $email);
        $password = mysqli_real_escape_string($this->get_connection(), $password);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO akun_pencari_kerja (nama, tanggal_lahir, gender, foto_profil, email, password) VALUES ('$nama', '$tanggal_lahir', '$gender', '$foto_profil_name', '$email', '$password_hash')";
        if (mysqli_query($this->get_connection(), $sql)) {
            header("Location: login.php");
            exit();
        } else {
            return 'error :  mysqli error';
        }
    }
    
    public function register_perusahaan($nama, $foto_profil, $email, $password, $konfirmasi_password) {
        if (strlen($nama) < 3) {
            return 'error : nama perusahaan minimal 3 karakter';
        } 

        if ($this->nama_perusahaan_exists($nama)) {
            return 'error : nama sudah terdaftar';
        }

        $upload_dir = 'uploads/foto_profil/akun_perusahaan/';
        $allowed_ext = array('png');
        $max_file_size = 5 * 1024 * 1024;
        $foto_profil_name = $this->upload_foto_profile($foto_profil, $upload_dir, $allowed_ext, $max_file_size);
        if ($foto_profil_name === false) {
            return 'error : foto profil harus berformat .png dan berukuran maksimal 5 MB';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'error : email tidak valid';
        } 

        if ($this->email_exists($email, 'akun_perusahaan')) {
            return 'error : email sudah terdaftar';
        }

        if (strlen($password) < 8) {
            return 'error : password minimal 8 karakter';
        } 

        if ($password != $konfirmasi_password) {
            return 'error : password dan konfirmasi password tidak sama';
        }  

        $nama = mysqli_real_escape_string($this->get_connection(), $nama);
        $email = mysqli_real_escape_string($this->get_connection(), $email);
        $password = mysqli_real_escape_string($this->get_connection(), $password);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO akun_perusahaan (nama, foto_profil, email, password) VALUES ('$nama',  '$foto_profil_name', '$email', '$password_hash')";
        if (mysqli_query($this->get_connection(), $sql)) {
            header("Location: login.php");
            exit();
        } else {
            return 'error :  mysqli error';
        }
    }

    protected function email_exists($email, $table) {
        $email = mysqli_real_escape_string($this->get_connection(), $email);
        if ($table == 'akun_perusahaan') {
            $sql = "SELECT * FROM akun_perusahaan WHERE email = '$email'";
        } elseif ($table == 'akun_pencari_kerja') {
            $sql = "SELECT * FROM akun_pencari_kerja WHERE email = '$email'";
        }

        $result = mysqli_query($this->get_connection(), $sql);
        return mysqli_num_rows($result) > 0;
    }

    protected function nama_perusahaan_exists($nama) {
        $nama = mysqli_real_escape_string($this->get_connection(), $nama);
        $sql = "SELECT * FROM akun_perusahaan WHERE nama = '$nama'";
        $result = mysqli_query($this->get_connection(), $sql);
        return mysqli_num_rows($result) > 0;
    }

    protected function is_valid_date_format($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    protected function upload_foto_profile($file, $upload_dir, $allowed_ext, $max_file_size) {
        $filename = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];

        $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_ext)) {
            return false;
        }

        if ($file_size > $max_file_size) {
            return false;
        }

        $new_filename = uniqid('profile_', true) . '.' . $file_ext;
        $upload_path = $upload_dir . $new_filename;

        if (move_uploaded_file($file_tmp, $upload_path)) {
            return $new_filename;
        } else {
            return false;
        }
    }
}
?>
