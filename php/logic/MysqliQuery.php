<?php
require_once('Database.php');

class MysqliQuery extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function get_akun_perusahaan_for_index_admin() {
        $status = array();
        $sql = "SELECT * FROM akun_perusahaan";
        $result = mysqli_query($this->get_connection(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }
        return $status;      
    }

    public function get_akun_pencari_kerja_for_index_admin() {
        $status = array();
        $sql = "SELECT * FROM akun_pencari_kerja";
        $result = mysqli_query($this->get_connection(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }
        return $status;      
    }

    public function get_pencari_kerja_gender_by_id_pencari_kerja($id) {
        $sql = "SELECT gender FROM akun_pencari_kerja WHERE id = '$id'";
        $result = mysqli_query($this->get_connection(), $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $gender = $row['gender'];
            mysqli_free_result($result);
            return $gender;
        } else {
            return "error : mysqli error";
        }
    }

    public function get_pencari_kerja_age_by_id_pencari_kerja($id) {
        $sql = "SELECT tanggal_lahir FROM akun_pencari_kerja WHERE id = '$id'";
        $result = mysqli_query($this->get_connection(), $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $tanggal_lahir = $row['tanggal_lahir'];
            $birthDate = new DateTime($tanggal_lahir);
            $currentDate = new DateTime();
            $age = $currentDate->diff($birthDate)->y;
            mysqli_free_result($result);
            return $age;
        } else {
            return "error : mysqli error";
        }
    }

    public function get_status_lamaran_by_id_pekerja_and_id_loker($id_pekerja, $id_loker) {
        $status = array();
        $sql = "SELECT status FROM history WHERE id_pencari_kerja = '$id_pekerja' AND id_loker = '$id_loker'";
        $result = mysqli_query($this->get_connection(), $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $status[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }
        return $status;
    }

    public function get_loker() {
        $loker = array();

        $sql = "SELECT akun_perusahaan.nama, loker.*
                FROM loker
                INNER JOIN akun_perusahaan ON loker.id_perusahaan=akun_perusahaan.id";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loker[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }

        return $loker;
    }
    
    public function get_loker_by_id_perusahaan($id) {
        $loker = array();

        $sql = "SELECT * FROM loker WHERE id_perusahaan=$id";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loker[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }

        return $loker;
    }

    public function get_loker_by_keyword_and_category($searchQuery, $category) {
        $loker = array();
        $sql = "SELECT akun_perusahaan.nama, loker.*
                FROM loker
                INNER JOIN akun_perusahaan ON loker.id_perusahaan=akun_perusahaan.id 
                WHERE $category LIKE ?";
        $stmt = $this->get_connection()->prepare($sql);
        $searchParam = "%$searchQuery%";
        $stmt->bind_param("s", $searchParam);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $loker[] = $row;
        }
        $result->free();
        $stmt->close();
        return $loker;
    }

    public function get_loker_for_index_pencari_kerja() {
        $loker = array();

        $sql = "SELECT akun_perusahaan.nama,
                       loker.profesi, 
                       loker.posisi, 
                       loker.gaji, 
                       loker.syaratpendidikan, 
                       loker.lokasi
                FROM loker
                INNER JOIN akun_perusahaan ON loker.id_perusahaan=akun_perusahaan.id
                LIMIT 3";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loker[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }

        return $loker;
    }

    public function get_loker_for_index_perusahaan($id) {
        $loker = array();

        $sql = "SELECT loker.profesi, 
                       loker.posisi, 
                       loker.gaji
                FROM loker
                WHERE loker.id_perusahaan=$id
                LIMIT 3";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loker[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }

        return $loker;
    }

    public function get_pelamar_waktu_and_nama_pelamar_by_id_perusahaan($id) {
        $loker = array();

        $sql = "SELECT * 
                FROM (
                    SELECT history.waktu_melamar, history.id_perusahaan, akun_pencari_kerja.nama
                    FROM history
                    INNER JOIN akun_pencari_kerja ON history.id_pencari_kerja = akun_pencari_kerja.id
                ) AS subquery
                WHERE id_perusahaan = $id";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loker[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }

        return $loker;
    }

    public function get_pelamar_by_id_perusahaan($id) {
        $loker = array();

        $sql = "SELECT akun_pencari_kerja.nama, history.*, loker.profesi, loker.posisi
                FROM history
                INNER JOIN akun_pencari_kerja ON history.id_pencari_kerja = akun_pencari_kerja.id
                INNER JOIN loker ON history.id_loker = loker.id
                WHERE history.id_perusahaan = $id";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $loker[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "error : mysqli error";
        }

        return $loker;
    }
}
?>