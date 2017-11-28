<?php
  include '../sql/dbconnect.php';

  $address_sql = "UPDATE Addresses SET street='" . $_REQUEST["street"] . "', city='" . $_REQUEST["city"] . "', state='" . $_REQUEST["state"] . "', zip='" . $_REQUEST["zip"] . "' where id=" . $_REQUEST["address_id"];
  $account_sql = "UPDATE Accounts SET first_name='" . $_REQUEST["first_name"] . "', last_name='" . $_REQUEST["last_name"] . "', email='" . $_REQUEST["email"] . "', is_owner=" . ($_REQUEST["is_owner"]?1:0) . ", is_producer=" . ($_REQUEST["is_producer"]?1:0) . " where id=" . $_REQUEST["account_id"];

  if (!$result = $mysqli->query($address_sql)) {
    include '../sql/sqlerror.php';
  }

  if (!$result = $mysqli->query($account_sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/");
  exit;
?>
