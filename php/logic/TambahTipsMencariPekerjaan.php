<?php
    require_once('Database.php');

    class TambahTipsMencariPekerjaan extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function insert_data_tips_mencari_pekerjaan($tips) {
            $tips = mysqli_real_escape_string($this->get_connection(), $tips);
            $sql = "INSERT INTO tips_mencari_pekerjaan (tips) VALUES ('$tips')";
            if (mysqli_query($this->get_connection(), $sql)) {
                header("Location: index.php");
                exit();
            } else {
                return 'Error : Mysqli error';
            }
        }
    }
?>
