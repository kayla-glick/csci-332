<?php
  include '../sql/dbconnect.php';

  $theater_sql = "DELETE FROM Theaters WHERE id = " . $_REQUEST["theater_id"];

  if (!$result = $mysqli->query($theater_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /cinemas/" . $_REQUEST["cinema_id"] . "/show");
  exit;
?>
