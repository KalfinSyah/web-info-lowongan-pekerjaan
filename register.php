<?php
    require_once('./php/template/StructureHTML.php');
    $structureHTML = new StructureHTML();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('./php/logic/Register.php');
        $register = new Register();
        $register->registerUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmpassword']);
    }
?>
    
<!DOCTYPE html>

<?php echo $structureHTML->getTopStructure("Register", "css/register.css"); ?>
            <form action="register.php" method="post">
                <section>
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username" required>
                    </div>

                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div>
                        <label for="">Password</label>
                        <input type="password" name="password" required>
                    </div>

                    <div>
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirmpassword" required>
                    </div>
                </section>

                <p>Sudah mempunyai akun? <a href="login.php">klik disini</a></p>

                <button type="submit">REGISTER</button>
            </form>
<?php echo $structureHTML->getBottomStructure(); ?>