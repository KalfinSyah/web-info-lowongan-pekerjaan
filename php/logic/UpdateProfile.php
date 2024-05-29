<?php
    require_once('Register.php');

    class UpdateProfile extends Register {
        public function update_pencari_kerja_profile_with__foto_profile($nama, $tanggal_lahir, $gender, $foto_profil, $id) {
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

            $nama = mysqli_real_escape_string($this->get_connection(), $nama);
            $tanggal_lahir = mysqli_real_escape_string($this->get_connection(), $tanggal_lahir);
            $gender = mysqli_real_escape_string($this->get_connection(), $gender);
            $id = mysqli_real_escape_string($this->get_connection(), $id);

            $sql = "UPDATE akun_pencari_kerja SET nama = '$nama', tanggal_lahir = '$tanggal_lahir', gender = '$gender', foto_profil = '$foto_profil_name' WHERE id = $id";
            if (mysqli_query($this->get_connection(), $sql)) {
                $_SESSION['nama'] = $nama;
                $_SESSION['foto_profil'] = $foto_profil_name;
                $_SESSION['gender'] = $gender;
                $_SESSION['tanggal_lahir'] = $tanggal_lahir;
                $birthDate = new DateTime($_SESSION['tanggal_lahir']);
                $currentDate = new DateTime();
                $age = $currentDate->diff($birthDate)->y;
                $_SESSION['usia'] = $age;

                header('Location: profile.php');
                exit;
            } else {
                return 'error :  mysqli error';
            }
        }

        public function  update_pencari_kerja_profile_without__foto_profile($nama, $tanggal_lahir, $gender, $id) {
            if (strlen($nama) < 4) {
                return 'error : nama minimal 4 karakter';
            } 
    
            if (!$this->is_valid_date_format($tanggal_lahir)) {
                return "error : tanggal tidak valid";
            }
    
            if (!in_array($gender, array('Pria', 'Wanita'))) {
                return 'error : gender tidak valid';
            }

            $nama = mysqli_real_escape_string($this->get_connection(), $nama);
            $tanggal_lahir = mysqli_real_escape_string($this->get_connection(), $tanggal_lahir);
            $gender = mysqli_real_escape_string($this->get_connection(), $gender);
            $id = mysqli_real_escape_string($this->get_connection(), $id);

            $sql = "UPDATE akun_pencari_kerja SET nama = '$nama', tanggal_lahir = '$tanggal_lahir', gender = '$gender'  WHERE id = $id";
            if (mysqli_query($this->get_connection(), $sql)) {
                $_SESSION['nama'] = $nama;
                $_SESSION['gender'] = $gender;
                $_SESSION['tanggal_lahir'] = $tanggal_lahir;
                $birthDate = new DateTime($_SESSION['tanggal_lahir']);
                $currentDate = new DateTime();
                $age = $currentDate->diff($birthDate)->y;
                $_SESSION['usia'] = $age;

                header('Location: profile.php');
                exit;
            } else {
                return 'error :  mysqli error';
            }
        }

        public function update_perusahaan_profile_with__foto_profile($nama, $foto_profil, $id) {
            if (strlen($nama) < 4) {
                return 'error : nama minimal 4 karakter';
            } 
            $upload_dir = 'uploads/foto_profil/akun_perusahaan/';
            $allowed_ext = array('png');
            $max_file_size = 5 * 1024 * 1024;
            $foto_profil_name = $this->upload_foto_profile($foto_profil, $upload_dir, $allowed_ext, $max_file_size);
            if ($foto_profil_name === false) {
                return 'error : foto profil harus berformat .png dan berukuran maksimal 5 MB';
            }

            $nama = mysqli_real_escape_string($this->get_connection(), $nama);
            $id = mysqli_real_escape_string($this->get_connection(), $id);

            $sql = "UPDATE akun_perusahaan SET nama = '$nama', foto_profil = '$foto_profil_name' WHERE id = $id";
            if (mysqli_query($this->get_connection(), $sql)) {
                $_SESSION['nama'] = $nama;
                $_SESSION['foto_profil'] = $foto_profil_name;
                header('Location: profile.php');
                exit;
            } else {
                return 'error :  mysqli error';
            }
        }

        public function update_perusahaan_profile_without__foto_profile($nama, $id) {
            if (strlen($nama) < 4) {
                return 'error : nama minimal 4 karakter';
            } 

            $nama = mysqli_real_escape_string($this->get_connection(), $nama);
            $id = mysqli_real_escape_string($this->get_connection(), $id);

            $sql = "UPDATE akun_perusahaan SET nama = '$nama' WHERE id = $id";
            if (mysqli_query($this->get_connection(), $sql)) {
                $_SESSION['nama'] = $nama;
                header('Location: profile.php');
                exit;
            } else {
                return 'error :  mysqli error';
            }
        }

        public function update_admin_profile_with__foto_profile($nama, $foto_profil, $id) {
            if (strlen($nama) < 4) {
                return 'error : nama minimal 4 karakter';
            } 
            $upload_dir = 'uploads/foto_profil/akun_admin/';
            $allowed_ext = array('png');
            $max_file_size = 5 * 1024 * 1024;
            $foto_profil_name = $this->upload_foto_profile($foto_profil, $upload_dir, $allowed_ext, $max_file_size);
            if ($foto_profil_name === false) {
                return 'error : foto profil harus berformat .png dan berukuran maksimal 5 MB';
            }

            $nama = mysqli_real_escape_string($this->get_connection(), $nama);
            $id = mysqli_real_escape_string($this->get_connection(), $id);

            $sql = "UPDATE akun_admin SET nama = '$nama', foto_profil = '$foto_profil_name' WHERE id = $id";
            if (mysqli_query($this->get_connection(), $sql)) {
                $_SESSION['nama'] = $nama;
                $_SESSION['foto_profil'] = $foto_profil_name;
                header('Location: profile.php');
                exit;
            } else {
                return 'error :  mysqli error';
            }
        }

        public function update_admin_profile_without__foto_profile($nama, $id) {
            if (strlen($nama) < 4) {
                return 'error : nama minimal 4 karakter';
            } 

            $nama = mysqli_real_escape_string($this->get_connection(), $nama);
            $id = mysqli_real_escape_string($this->get_connection(), $id);

            $sql = "UPDATE akun_admin SET nama = '$nama' WHERE id = $id";
            if (mysqli_query($this->get_connection(), $sql)) {
                $_SESSION['nama'] = $nama;
                header('Location: profile.php');
                exit;
            } else {
                return 'error :  mysqli error';
            }
        }
    }
?>