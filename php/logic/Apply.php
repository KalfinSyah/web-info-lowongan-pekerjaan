<?php
require_once('Database.php');

class Apply extends Database {

    private $message;

    public function __construct(
        $id_pencari_kerja, 
        $id_perusahaan, 
        $id_loker, 
        $file_cv, 
        $file_scan_ktp,
        $file_ijazah,
        $file_pass_foto,
        $file_sertifikat,
        $file_portfolio,
        $alasan
    ) {
        parent::__construct();
        $max_file_size = 5 * 1024 * 1024;
        
        $cv_uploaded = $this->upload_file($file_cv, 'uploads/apply/cv/', array('pdf'), $max_file_size);
        $ktp_uploaded = $this->upload_file($file_scan_ktp, 'uploads/apply/scan_ktp/', array('pdf'), $max_file_size);
        $ijazah_uploaded = $this->upload_file($file_ijazah, 'uploads/apply/ijazah/', array('pdf'), $max_file_size);
        $pass_foto_uploaded = $this->upload_file($file_pass_foto, 'uploads/apply/pass_foto/', array('jpg'), $max_file_size);
        $sertifikat_uploaded = $this->upload_file($file_sertifikat, 'uploads/apply/sertifikat/', array('pdf'), $max_file_size);
        $portfolio_uploaded = $this->upload_file($file_portfolio, 'uploads/apply/portfolio/', array('pdf'), $max_file_size);

        if ($cv_uploaded && $ktp_uploaded && $ijazah_uploaded && $pass_foto_uploaded && ($sertifikat_uploaded !== false) && ($portfolio_uploaded !== false)) {
            if ($this->insert_history($id_pencari_kerja, $id_perusahaan, $id_loker, $cv_uploaded, $ktp_uploaded, $ijazah_uploaded, $pass_foto_uploaded, $sertifikat_uploaded, $portfolio_uploaded, $alasan) == true) {
                header("Location: history_pekerjaan_yang_telah_dilamar.php");
                exit();
            } else {
                $this->message = "error : mysqli error";
            }
        } else {
            $this->message = "error : upload error";
        }
    }

    private function upload_file($file, $upload_dir, $allowed_ext, $max_file_size) {
        if ($file['error'] == UPLOAD_ERR_NO_FILE) {
            return null;
        }

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

        $new_filename = uniqid('file_', true) . '.' . $file_ext;
        $upload_path = $upload_dir . $new_filename;

        if (move_uploaded_file($file_tmp, $upload_path)) {
            return $upload_path;
        } else {
            return false;
        }
    }

    private function insert_history($id_pencari_kerja, $id_perusahaan, $id_loker, $cv_path, $ktp_path, $ijazah_path, $pass_foto_path, $sertifikat_path, $portfolio_path, $alasan) {
        $sql = "INSERT INTO history (id_pencari_kerja, id_perusahaan, id_loker, file_cv, file_scan_ktp, file_ijazah, file_pass_foto, file_sertifikat, file_portfolio, alasan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->get_connection(), $sql);
        mysqli_stmt_bind_param($stmt, 'iiisssssss', $id_pencari_kerja, $id_perusahaan, $id_loker, $cv_path, $ktp_path, $ijazah_path, $pass_foto_path, $sertifikat_path, $portfolio_path, $alasan);

        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }

        mysqli_stmt_close($stmt);
    }

    public function get_message() {
        return $this->message;
    }
}
?>
