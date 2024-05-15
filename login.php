<?php
    require_once('./php/template/StructureHTML.php');
    $structureHTML = new StructureHTML();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('./php/logic/Login.php');
        $login = new Login();
        $login->loginUser($_POST['email'], $_POST['password'], 'index.php');
    }
?>


<?php echo $structureHTML->getTopStructure("Login", "css/login.css"); ?>

<form action="login.php" method="post">
    <section>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="">Password</label>
            <input type="password" name="password" required>
        </div>
    </section>

    <p>Belum mempunyai akun? <a href="register.php">klik disini</a></p>

    <button type="submit">LOGIN</button>
</form>

<?php echo $structureHTML->getBottomStructure(); ?>