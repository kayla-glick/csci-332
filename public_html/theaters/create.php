<?php
  include '../sql/dbconnect.php';

  $theater_sql = "INSERT INTO Theaters (number, capacity, cinema_id) VALUES ('" . $_REQUEST["number"] . "', '" . $_REQUEST["capacity"] . "', " . $_REQUEST["cinema_id"] . ");";

  if (!$result = $mysqli->query($theater_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /cinemas/" . $_REQUEST["cinema_id"] . "/show");
  exit;
?>
