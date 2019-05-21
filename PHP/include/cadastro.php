<?php

    //cadastro
    if (isset($_POST['cadastrar'])) {

        require 'servidor.php';

        $usuario = $email = $senha = $confSenha = null;

        $usuario = $_POST['user'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confsenha'];

        if (empty($usuario) || empty($email) || empty($senha) || empty($confSenha)) {
            header("Location: ../cadastro.php?error=emptyfields&user=" . $usuario . "&email=" . $email);
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z\d]*$/", $usuario)) {
            header("Location: ../cadastro.php?error=invalidemailuser");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../cadastro.php?error=invalidemail&user=" . $usuario);
            exit();
        } elseif (!preg_match("/^[a-zA-Z\d]*$/", $usuario)) {
            header("Location: ../cadastro.php?error=invaliduser&email=" . $email);
            exit();
        } elseif ($senha !== $confSenha) {
            header("Location: ../cadastro.php?error=passwordcheck&user=" . $usuario . "&email=" . $email);
            exit();
        } else {
            $sql = "SELECT `usuario`, `email` FROM `usuarios` WHERE `usuario`='$username' AND `email`='$email'"; //sql query
            $stmt = mysqli_stmt_init($db); //conect to db
            if (!mysqli_stmt_prepare($stmt, $sql)) { //if db is not connected
                header("Location: ../cadastro.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "ss", $usuario, $email); //bind user data to db
                mysqli_stmt_execute($stmt); //exec query
                mysqli_stmt_store_result($stmt);
                $resultado = mysqli_stmt_num_rows($stmt);
                if ($resultado > 0) { //if num of rows is greater than 0, then user already taken
                    header("Location: ../cadastro.php?error=usertaken&email=" . $email);
                    exit();
                } else {
                    $sql = "INSERT INTO `usuarios` (`usuario`, `email`, `senha`) VALUES ('$usuario', '$email', '$senha')";
                    $stmt = mysqli_stmt_init($db);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../cadastro.php?error=sqlerror");
                        exit();
                    } else {
                        $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $usuario, $email, $hashSenha);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../cadastro.php?signup=success");
                        exit();
                    }
                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($db);
    
    } else {
        header("Location: ../cadastro.php");
        exit();
    }

    ?>

    <!-- <script type="text/javascript">
        var erroUser = document.getElementById('user').setAttribute(class, "erro");
        erroUser();
    </script> -->