<?php
    session_start();
    require_once('Database.php');

    class Login extends Database {
        public function __construct() {
            parent::__construct();
        }

        public function loginUser($email, $password, $header) {
            $email = mysqli_real_escape_string($this->getConnection(), $email);
            $password = mysqli_real_escape_string($this->getConnection(), $password);

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($this->getConnection(), $sql);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['email'] = $email;
                        header("Location: $header");
                        exit(); 
                    } else {
                        echo '<script>alert("USERNAME/PASSWORD SALAH!");</script>';
                    }
                } else {
                    echo '<script>alert("USERNAME/PASSWORD SALAH!");</script>';
                }
            } else {
                echo '<script>alert("USERNAME/PASSWORD SALAH!");</script>';
            }
        }
    }
?>
