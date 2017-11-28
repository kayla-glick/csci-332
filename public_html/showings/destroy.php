<?php
  include '../sql/dbconnect.php';

  $showing_sql = "DELETE FROM Showings WHERE id = " . $_REQUEST["showing_id"];

  if (!$result = $mysqli->query($showing_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /cinemas/" . $_REQUEST["cinema_id"] . "/show");
  exit;
?>
