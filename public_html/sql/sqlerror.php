<?php
  echo "<div class='alert alert-danger col-sm-12'>";
  echo "<span class='col-sm-1'>Error:</span><span class='col-sm-11'>SQL Error</span></br>";
  echo "<span class='col-sm-1'>Errno:</span><span class='col-sm-11'>" . $mysqli->errno . "</span></br>";
  echo "<span class='col-sm-1'>Error:</span><span class='col-sm-11'>" . $mysqli->error . "</span></br>";
  echo "</div>";  
  echo "<button class='btn btn-warning' onclick='history.go(-1);'>Return to Form</button>";

  exit;
?>