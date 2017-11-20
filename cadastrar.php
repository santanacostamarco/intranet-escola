<?php
  include('functions.php');
  session_start();
  if (isset($_SESSION['user_id'])){
    $user_type = $_POST['user-type'];
    $user_first_name = $_POST['user-first-name'];
    $user_last_name = $_POST['user-last-name'];
    $user_birthdate = $_POST['user-birthdate'];
    $user_sexo = $_POST['user-sexo'];
    $user_username = $_POST['user-username'];
    $user_email = $_POST['user-email'];
    $user_password = stringAleatoria();
    $connection = connection_checker();
    $query = "INSERT INTO users (
      username,
      user_tipo,
      email,
      user_password,
      senha_prov,
      user_first_name,
      user_last_name,
      sex,
      user_birth_date,
      user_date_creation
      )
      VALUES (
        '{$user_username}',
        '{$user_type}',
        '{$user_email}',
        '" . md5($user_password) . "',
        1,
        '{$user_first_name}',
        '{$user_last_name}',
        '{$user_sexo}',
        '{$user_birthdate}',
        CURRENT_DATE
      )";
    switch (existeUsuario($user_username, $user_email)) {
      case 0:
        mysqli_query($connection, $query);
        echo "<br> a SENHA do novo user é: " . $user_password;
        break;
      case 1:
        echo "Este usuário já existe.";
        break;
      case 2:
        echo "Já existe um usuário com este e-mail.";
        break;
      case 3:
        echo "Já existe um usuário com o mesmo nome de usuário e e-mail.";
        break;
      default:
        echo "woops!";
        break;
    }
  }

 ?>
