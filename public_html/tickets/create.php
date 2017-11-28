<?php
  include '../sql/dbconnect.php';

  $showing_sql = "SELECT * FROM ShowingInformation WHERE showing_id=" . $_REQUEST["showing_id"];

  if (!$showings = $mysqli->query($showing_sql)) {
    include '../sql/sqlerror.php';
  } else {
    $showing = $showings->fetch_assoc();

    $amount = (int) $_REQUEST["count"] * $showing["price"];
    $transaction_sql = "INSERT INTO Transactions (account_id, showing_id, ticket_count, amount, date) VALUES (" . $_COOKIE["account_id"] . ", " . $_REQUEST["showing_id"] . ", " . $_REQUEST["count"] . ", " . (string) $amount . ", '" . date('Y-m-d H:i:s') . "')";
    
    if (!$result = $mysqli->query($transaction_sql)) {
      include '../sql/sqlerror.php';
    }
  }

  header("Location: /accounts/" . $_COOKIE["account_id"] . "/show");
  exit;
?>
