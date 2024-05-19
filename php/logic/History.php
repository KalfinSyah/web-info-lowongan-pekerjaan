<?php
    require_once('Database.php');
    
    class History extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function get_specific_id_pencari_kerja_history($id) {
            $loker = array();

            $sql = "SELECT * FROM history WHERE id_pencari_kerja = '$id'";
            $result = mysqli_query($this->get_connection(), $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $loker[] = $row;
                }
                mysqli_free_result($result);
            } else {
                return "Error : Mysqli error";
            }

            return $loker;
        }

        public function get_specific_history_with_id_perusahaan($id) {
            $loker = array();

            $sql = "SELECT * FROM history WHERE id_perusahaan = '$id'";
            $result = mysqli_query($this->get_connection(), $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $loker[] = $row;
                }
                mysqli_free_result($result);
            } else {
                return "Error : Mysqli error";
            }

            return $loker;
        }

        public function get_history_with_id_pekerja_and_id_loker($id_pekerja, $id_loker) {
            $loker = array();

            $sql = "SELECT * FROM history WHERE id_pencari_kerja = '$id_pekerja' AND id_loker = '$id_loker'";
            $result = mysqli_query($this->get_connection(), $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $loker[] = $row;
                }
                mysqli_free_result($result);
            } else {
                return "Error : Mysqli error";
            }

            return $loker;
        }
    }
?>