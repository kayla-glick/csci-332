<?php
  include '../sql/dbconnect.php';

  $showing_sql = "INSERT INTO Showings (theater_id, movie_id, show_date, show_time, price) VALUES (" . $_REQUEST["theater_id"] . ", " . $_REQUEST["movie_id"] . ", '" . date('Y-m-d', strtotime($_REQUEST["show_date"])) . "', '" . date('H:i', strtotime($_REQUEST["show_time"])) . "', '" . bcmul($_REQUEST["price"], 100) . "');";

  if (!$result = $mysqli->query($showing_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /cinemas/" . $_REQUEST["cinema_id"] . "/show");
  exit;
?>
