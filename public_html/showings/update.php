<?php
  include '../sql/dbconnect.php';

  $showing_sql = "UPDATE Showings SET movie_id=" . $_REQUEST["movie_id"] . ", theater_id=" . $_REQUEST["theater_id"] . ", show_date='" . date('Y-m-d', strtotime($_REQUEST["show_date"])) . "', show_time='" . date('H:i', strtotime($_REQUEST["show_time"])) . "', price='" . bcmul($_REQUEST["price"], 100) . "' where id=" . $_REQUEST["showing_id"];

  if (!$result = $mysqli->query($showing_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /cinemas/" . $_REQUEST["cinema_id"] . "/show");
  exit;
?>
