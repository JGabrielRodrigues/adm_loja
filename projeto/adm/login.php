<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administrador</title>
</head>
<body>
    <h2>Login Administrador</h2>

    <form action="processa_login.php" method="post">
        <label for="name">Nome:</label>
        <p><input type="text" name="name" id="name" required></p>
        <label for="password">Senha:</label>
        <p><input type="text" name="password" id="password" required></p>
        <button><input type="submit" value="Join" name="btn" id="btn"></button>

        <?php
            if(isset($_GET['erro'])){
                echo '<p style="color: red;">Nome de usuario ou senha invalido!</p>';
            }
        ?>

    </form>
</body>
</html>



