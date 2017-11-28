<?php
  include '../sql/dbconnect.php';

  $address_sql = "INSERT INTO Addresses (street, city, state, zip) VALUES ('" . $_REQUEST["street"] . "', '" . $_REQUEST["city"] . "', '" . $_REQUEST["state"] . "', '" . $_REQUEST["zip"] . "');";
  $cinema_sql = "INSERT INTO Cinemas (name, address_id, owner_id) VALUES ('" . $_REQUEST["name"] . "', " . "(SELECT LAST_INSERT_ID()), " . $_REQUEST["owner_id"] . ");";

  if (!$result = $mysqli->query($address_sql)) {
    include '../sql/sqlerror.php';
  }

  if (!$result = $mysqli->query($cinema_sql)) {
    include '../sql/sqlerror.php';
  }

  if ( $_REQUEST["theater_count"] ) {
    $theater_sql = "CALL DefaultTheatersProc((SELECT LAST_INSERT_ID()), " . $_REQUEST["theater_count"] . ", " . ( $_REQUEST["default_capacity"] ? $_REQUEST["default_capacity"] : 200 ) . ");";

    if (!$result = $mysqli->query($theater_sql)) {
      include '../sql/sqlerror.php';
    }
  }

  header("Location: /accounts/" . $_COOKIE["account_id"] . "/show");
  exit;
?>

