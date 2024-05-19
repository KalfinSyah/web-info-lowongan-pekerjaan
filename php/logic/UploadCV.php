<?php
require_once('Database.php');

class UploadCV extends Database {
    private $message;

    public function __construct($id_loker, $id_perusahaan) {
        parent::__construct();

        if (isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0) {
            $allowed_types = array('pdf');
            $max_size = 5 * 1024 * 1024; // 5 MB
    
            $file_name = $_FILES["cv"]["name"];
            $file_size = $_FILES["cv"]["size"];
            $file_tmp = $_FILES["cv"]["tmp_name"];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
            if (in_array($file_ext, $allowed_types) === false) {
                $this->message = "Error: Hanya file PDF yang diperbolehkan";
                return;
            }
    
            if ($file_size > $max_size) {
                $this->message = "Error: Ukuran file maksimal adalah 5 MB";
                return;
            }
    
            $upload_dir = "./uploads/";
            $new_file_name = uniqid() . '.' . $file_ext;
            $upload_path = $upload_dir . $new_file_name;
    
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $this->message = "File berhasil diupload: " . $new_file_name;
                $this->insert_to_history($new_file_name, $id_loker, $id_perusahaan);
            } else {
                $this->message = "Error: Terjadi kesalahan saat mengupload file";
            }
        } else {
            $this->message = "Error: File CV tidak terdeteksi atau terjadi kesalahan saat mengupload";
        }
    }

    public function get_message() {
        return $this->message;
    }

    private function insert_to_history($file_name, $id_loker, $id_perusahaan) {
        $id_pencari_kerja = mysqli_real_escape_string($this->get_connection(), $_SESSION['id']);
        $id_loker = mysqli_real_escape_string($this->get_connection(), $id_loker);
        $file_name = mysqli_real_escape_string($this->get_connection(), $file_name);
        $id_perusahaan = mysqli_real_escape_string($this->get_connection(), $id_perusahaan);

        $sql = "INSERT INTO history (id_pencari_kerja, id_loker, nama_file, id_perusahaan) VALUES ('$id_pencari_kerja', '$id_loker', '$file_name', '$id_perusahaan')";
        if (mysqli_query($this->get_connection(), $sql)) {
            header("Location: history_pekerjaan_yang_telah_dilamar.php");
            exit();
        } else {
            return 'Error :  Mysqli error';
        }
    }
}
?>
