<?php include '../layout/header.htm'; ?>

<div class="page-header">
  <h1 class="page-title">Showings Report</h1>
</div>

<?php
  $theater_sql = "SELECT id, number FROM Theaters WHERE cinema_id=" . $_REQUEST["cinema_id"] . " ORDER BY number";

  if ( !$theaters = $mysqli->query($theater_sql) ) {
    include '../sql/sqlerror.php';
  }

  while ( $theater = $theaters->fetch_assoc() ) {
    echo "<div class='col-sm-12'>";
    echo "<h3>Theater " . $theater["number"] . "</h3>";

    $showings_sql = "SELECT * FROM ShowingsReport WHERE theater_id=" . $theater["id"] . " ORDER BY show_date, show_time";

    if ( !$showings = $mysqli->query($showings_sql) ) {
      include '../sql/sqlerror.php';
    }
    
    echo "<table class='table table-striped table-condensed'>";
    echo "<thead class='bg-primary'>";
    echo "<tr>";
    echo "<th class='col-sm-2'>Date</th>";
    echo "<th class='col-sm-2'>Start Time</th>";
    echo "<th class='col-sm-3'>Movie</th>";
    echo "<th class='col-sm-2'>Run Time</th>";
    echo "<th class='col-sm-1'>Price</th>";
    echo "<th class='col-sm-2'>Tickets</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    if ( $showings->num_rows == 0 ) {
      echo "<tr><td class='text-center' colspan=6>No Showings</td></tr>";
    } else {
      while ( $showing = $showings->fetch_assoc() ) {    
        echo "<tr>";
        echo "<td>" . date("m/d/Y", strtotime($showing["show_date"])) . "</td>";
        echo "<td>" . date("g:i A", strtotime($showing["show_time"])) . "</td>";
        echo "<td>" . $showing["movie"] . "</td>";
        echo "<td>" . $showing["run_time"] . "</td>";
        echo "<td>$" . number_format($showing["price"]/100, 2, '.', ' ') . "</td>";
        echo "<td>" . $showing["ticket_count"] . "/" . $showing["capacity"] . "</td>";
        echo "</tr>";
      }
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  }
?>

<?php include '../layout/footer.htm'; ?>