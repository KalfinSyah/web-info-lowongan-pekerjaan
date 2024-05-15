<?php
    require_once('Database.php');
    
    class Loker extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function getLoker() {
            $loker = array();

            $sql = "SELECT * FROM loker";
            $result = mysqli_query($this->getConnection(), $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $loker[] = $row;
                }
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($this->getConnection());
            }

            return $loker;
        }
    }
?>
