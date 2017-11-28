<?php
  include '../sql/dbconnect.php';

  $movie_sql = "UPDATE Movies SET title='" . $_REQUEST["title"] . "', description='" . $_REQUEST["description"] . "', genre='" . $_REQUEST["genre"] . "', rating='" . $_REQUEST["rating"] . "', run_time=" . $_REQUEST["run_time"] . ", release_date='" . date('Y-m-d', strtotime($_REQUEST["release_date"])) . "' where id=" . $_REQUEST["movie_id"];

  if (!$result = $mysqli->query($movie_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/" . $_COOKIE["account_id"] . "/show");
  exit;
?>
