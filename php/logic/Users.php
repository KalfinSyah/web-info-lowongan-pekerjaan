<?php 
require_once('Database.php');

class Users extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function get_user_with_id_pencari_kerja($id) {
        $users_data = array();

        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users_data[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "Error : Mysqli error";
        }

        return $users_data;
    }

    public function get_nama_perusahaan_with_id_perusahaan($id) {
        $users_data = array();

        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($this->get_connection(), $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users_data[] = $row;
            }
            mysqli_free_result($result);
        } else {
            return "Error : Mysqli error";
        }

        return $users_data;
    }
}
?>