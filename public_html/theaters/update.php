<?php
  include '../sql/dbconnect.php';

  $theater_sql = "UPDATE Theaters SET number=" . $_REQUEST["number"] . ", capacity=" . $_REQUEST["capacity"] . " WHERE id=" . $_REQUEST["theater_id"];

  if (!$result = $mysqli->query($theater_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /cinemas/" . $_REQUEST["cinema_id"] . "/show");
  exit;
?>
