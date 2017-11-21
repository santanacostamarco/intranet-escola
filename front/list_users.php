<?php
  include("../functions.php");
  $connection = connection_checker();
  if(!$connection){
    echo "falha na query";
  } else {
    $query = "SELECT user_id, username, email, user_tipo, senha_prov FROM users WHERE 1";
    $result = mysqli_query($connection, $query);
    echo "<table>";
    while ($row = mysqli_fetch_array($result)) {
      echo '<tr>';
      foreach($row as $field) {
          echo '<td>' . $field . '</td>';
      }
      echo '</tr>';
    }
    echo "</table>";

  }
?>
