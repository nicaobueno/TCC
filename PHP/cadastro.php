<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .erro {
            color: red;
            border-color: red;
        }
    </style>
    <title>Cadastro</title>
</head>

<body>
    <div>
        <form method="POST" action="include/cadastro.php">
            <div>
                <h2>Preencha os campos:</h2>
            </div>
            <div>
                <label for="user">Usuário:</label>
                <input  type="text" id="user" name="user">

            </div>
            <div>
                <label for="email">Email:</label>
                <input  type="email" id="email" name="email">

            </div>
            <div>
                <label for="senha">Senha:</label>
                <input  type="password" id="senha" name="senha">

            </div>
            <div>
                <label for="confirmsenha">Digite a senha novamente:</label>
                <input  type="password" id="confsenha" name="confsenha">

            </div>
            <div>
                <button type="submit" id="cadastrar" name="cadastrar">Cadastrar</button>
                <button type="reset" name="limpar">Limpar</button>
            </div>
            <p>
                Já é cadastrado? <a href="login.php">Fazer Login</a>
            </p>
        </form>
    </div>

    <?php

    //cadastro
    /*if (isset($_POST['cadastrar'])) {

        require 'servidor.php';

        $usuario = $email = $senha = $confSenha = null;

        $usuario = $_POST['user'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confsenha'];

        if (empty($usuario) || empty($email) || empty($senha) || empty($confSenha)) {
            //header("../cadastro.php?error=emptyfields&user=" . $usuario . "&email=" . $email);
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*&/", $usuario)) {
            //header("../cadastro.php?error=invalidemailuser");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //header("../cadastro.php?error=invalidemail&user=" . $usuario);
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9]*&/", $usuario)) {
            //header("../cadastro.php?error=invaliduser&email=" . $email);
            exit();
        } elseif ($senha !== $confSenha) {
            //header("../cadastro.php?error=passwordcheck&user=" . $usuario . "&email=" . $email);
            exit();
        } else {
            $sql = "SELECT user FROM usuarios WHERE user=?";
            $stmt = mysqli_stmt_init($db);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                header("../cadastro.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $usuario);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultado = mysqli_stmt_num_rows($stmt);
                if ($resultado > 0) {
                    //header("../cadastro.php?error=usertaken&email=" . $email);
                    exit();
                } else {
                    $sql = "INSERT INTO usuarios (user, email, senha) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($db);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        //header("../cadastro.php?error=sqlerror");
                        exit();
                    } else {
                        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $usuario, $email, $hashSenha);
                        mysqli_stmt_execute($stmt);
                        //header("../cadastro.php?signup=success");
                        echo "Sucesso";
                        exit();
                    }
                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($db);
    } else {
        header("../cadastro.php");
        exit();
    }*/

    ?>

    <!-- <script type="text/javascript">
        var erroUser = document.getElementById('user').setAttribute(class, "erro");
        erroUser();
    </script> -->

</body>

</html>