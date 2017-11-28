<?php
  include '../sql/dbconnect.php';

  $sql = "DELETE FROM Addresses WHERE id = ( SELECT address_id FROM Accounts where id = " . $_REQUEST["id"] . " );";

  if (!$result = $mysqli->query($sql)) {
    include '../sql/sqlerror.php';
  }

  header("Location: /accounts/");
  exit;
?>
