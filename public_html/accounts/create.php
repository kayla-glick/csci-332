<?php
  include '../sql/dbconnect.php';

  $address_sql = "INSERT INTO Addresses (street, city, state, zip) VALUES ('" . $_REQUEST["street"] . "', '" . $_REQUEST["city"] . "', '" . $_REQUEST["state"] . "', '" . $_REQUEST["zip"] . "');";
  $account_sql = "INSERT INTO Accounts (first_name, last_name, email, address_id, is_owner, is_producer) VALUES ('" . $_REQUEST["first_name"] . "', '" . $_REQUEST["last_name"] . "', '" . $_REQUEST["email"] . "', " . "(SELECT LAST_INSERT_ID()), " . ($_REQUEST["is_owner"]?1:0) . ", " . ($_REQUEST["is_producer"]?1:0) . ");";

  if (!$result = $mysqli->query($address_sql)) {
    include '../sql/sqlerror.php';
  }

  if (!$result = $mysqli->query($account_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/");
  exit;
?>
