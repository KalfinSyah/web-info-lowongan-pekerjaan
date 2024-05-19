<?php
    require_once('Database.php');

    class TipsMencariPekerjaan extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function getTips() {
            $tips = array();

            $sql = "SELECT tips FROM tipsmencaripekerjaan ORDER BY RAND() LIMIT 3";
            $result = mysqli_query($this->get_connection(), $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $tips[] = $row['tips'];
                }
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($this->get_connection());
            }

            return $tips;
        }
    }
?>