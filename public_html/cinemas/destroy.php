<?php
  include '../sql/dbconnect.php';

  $address_sql = "DELETE FROM Addresses WHERE id = ( SELECT address_id FROM Cinemas where id = " . $_REQUEST["cinema_id"] . " );";
  $cinema_sql = "DELETE FROM Cinemas WHERE id = " . $_REQUEST["cinema_id"] . ";";
  
  if (!$result = $mysqli->query($address_sql)) {
    include '../sql/sqlerror.php';
  }

  if (!$result = $mysqli->query($cinema_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/" . $_COOKIE["account_id"] . "/show");
  exit;
?>
