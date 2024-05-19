<?php
require_once('Database.php');

class Lamaran extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function set_status($id_pencari_kerja, $id_loker, $action) {
        $valid_action = array('diterima', 'ditolak');
        $id_pencari_kerja = mysqli_real_escape_string($this->get_connection(), $id_pencari_kerja);
        $id_loker = mysqli_real_escape_string($this->get_connection(), $id_loker);

        if (!in_array($action, $valid_action)) {
            return 'Error : Invalid Action';
        }

        $sql = "UPDATE history SET status = '$action' WHERE id_pencari_kerja = '$id_pencari_kerja' AND id_loker = '$id_loker'";
        if (mysqli_query($this->get_connection(), $sql)) {
            header("Location: list_pelamar.php");
            exit();
        } else {
            return 'Error :  Mysqli error';
        }
    }
}
?>
