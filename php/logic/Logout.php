<?php
    require_once('Database.php');

    class Logout extends Database{
        public function __construct() {
            parent::__construct();
            mysqli_close($this->getConnection());
            $_SESSION = [];
            session_destroy();
            header("Location: ../../login.php");
            exit();
        }
    }


    new Logout();
?>
