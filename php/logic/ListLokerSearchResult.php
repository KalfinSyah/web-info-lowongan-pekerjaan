<?php
    require_once('Database.php');
    
    class ListLokerSearchResult extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function getSearchResult($searchQuery, $category) {
            $loker = array();
            $sql = "SELECT * FROM loker WHERE $category LIKE ?";
            $stmt = $this->getConnection()->prepare($sql);
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
    }
?>
