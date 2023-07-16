<?php

require 'config.php';
  $conn = connection();
  $sql = "DELETE FROM category WHERE cat_id='" . $_GET["cat_id"] . "'";
  $data = $conn->query($sql);
  $conn=null;
  echo "<span style='font-size: 20px; color: purple;' class=\"splash-description\">Category deleted.</span><br>";

  header('Location: index.php');
?>