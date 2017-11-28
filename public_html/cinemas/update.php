<?php
  include '../sql/dbconnect.php';

  $address_sql = "UPDATE Addresses SET street='" . $_REQUEST["street"] . "', city='" . $_REQUEST["city"] . "', state='" . $_REQUEST["state"] . "', zip='" . $_REQUEST["zip"] . "' where id=" . $_REQUEST["address_id"];
  $cinema_sql = "UPDATE Cinemas SET name='" . $_REQUEST["name"] . "' where id=" . $_REQUEST["cinema_id"];
  
  if (!$result = $mysqli->query($address_sql)) {
    include '../sql/sqlerror.php';
  }

  if (!$result = $mysqli->query($cinema_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/" . $_COOKIE["account_id"] . "/show");
  exit;
?>
