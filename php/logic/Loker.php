<?php
    require_once('Database.php');
    
    class Loker extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function get_loker() {
            $loker = array();

            $sql = "SELECT * FROM loker";
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

        public function get_specific_loker($id) {
            $loker = array();

            $sql = "SELECT * FROM loker WHERE id = '$id'";
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

        public function get_specific_perusahaan_loker($id) {
            $loker = array();

            $sql = "SELECT * FROM loker WHERE id_perusahaan = '$id'";
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

        public function get_specific_id_loker_with_id_perusahaan($id, $id_perusahaan) {
            $loker = array();

            $sql = "SELECT * FROM loker WHERE id = '$id' AND id_perusahaan = '$id_perusahaan'";
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
