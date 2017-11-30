<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include('functions.php');
if (isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $files_dir = "files/";
  if (is_dir($files_dir)){
    if (isset($_FILES['arquivo'])){
      $file_name = explode(".", $_FILES['arquivo']['name']);
      $file_name[count($file_name)-1] = "";
      $new_name = "";
      foreach ($file_name as $key => $value) {
        $new_name .= $value;
      }
      $file_type = $_FILES['arquivo']['type'];
      $file_ext = get_file_ext($file_type);
      $file_proprietario = $user_id;
      $file_upload_date = date("Y-m-d H:i:s");
      $file_server_name = $file_proprietario."_".str_replace(":","",str_replace("-","",str_replace(" ","",str_replace("-","",$file_upload_date))));
      $file_url = $files_dir . $file_server_name;
      if (isset($_POST['visibilidade'])){
        $file_visibilidade = $_POST['visibilidade'];
      } else {
        $file_visibilidade = "private";
      }

      $connection = connection_checker();
      if ($connection){
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $file_url)){
          $query = "INSERT INTO arquivos (
            data_hora,
            extencao,
            proprietario,
            ref,
            visibilidade,
            url,
            nome_original,
            tipo
          ) VALUES (
            '{$file_upload_date}',
            '{$file_ext}',
            '{$file_proprietario}',
            '{$file_server_name}',
            '{$file_visibilidade}',
            '{$file_url}',
            '{$new_name}',
            '{$file_type}'
          )";
          if (mysqli_query($connection, $query)){
            echo "Arquivo enviado com sucesso!";
          } else {
            echo " falha ao atualizar o banco ";
            echo mysqli_connect_error();
          }
        } else {
          echo "Falha ao enviar o arquivo =[";
        }
      }
    }
  } else {
    echo "Diretorio nao encontrado!";
  }
} else{
  header("Location: index.php");
}


?>
