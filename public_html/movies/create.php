<?php
  include '../sql/dbconnect.php';

  $movie_sql = "INSERT INTO Movies (title, description, genre, rating, producer_id, run_time, release_date) VALUES ('" . $_REQUEST["title"] . "', '" . $_REQUEST["description"] . "', '" . $_REQUEST["genre"] . "', '" . $_REQUEST["rating"] . "', " . $_REQUEST["producer_id"] . ", " . $_REQUEST["run_time"] . ", '" . date('Y-m-d', strtotime($_REQUEST["release_date"])) . "');";

  if (!$result = $mysqli->query($movie_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/" . $_COOKIE["account_id"] . "/show");
  exit;
?>
