<?php
  include '../sql/dbconnect.php';

  $movie_sql = "DELETE FROM Movies WHERE id = " . $_REQUEST["movie_id"] . ";";

  if (!$result = $mysqli->query($movie_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/" . $_COOKIE["account_id"] . "/show");
  exit;
?>
