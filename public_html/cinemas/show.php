<?php include '../layout/header.htm'; ?>

<?php
  $cinema_sql = "SELECT * FROM CinemaInformation WHERE cinema_id=" . $_REQUEST["cinema_id"];
  $theater_sql = "SELECT * FROM TheaterInformation WHERE cinema_id=" . $_REQUEST["cinema_id"] . " ORDER BY number";
  $showing_sql = "SELECT * FROM ShowingInformation WHERE cinema_id=" . $_REQUEST["cinema_id"] . " ORDER BY show_date, show_time, theater_number";
 
  if ( !$cinemas = $mysqli->query($cinema_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( !$theaters = $mysqli->query($theater_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( !$showings = $mysqli->query($showing_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( $cinemas->num_rows == 0 ) {
    echo "<div class='alert alert-danger text-center col-sm-12'><h1 style='margin: 0;'>Cinema not found with ID " . $_REQUEST["cinema_id"] . "</h1></div>";
    exit;
  } else {
    $cinema = $cinemas->fetch_assoc();
  }
?>

<div class="page-header">
  <h1 class="page-title">
    Cinema Information
    <a class="btn btn-warning pull-right" href="<?php echo "/accounts/" . $_COOKIE["account_id"] . "/show"; ?>">Back to My Account</a>
  </h1>
</div>
<table class="table">
  <tr>
    <th class="col-sm-2" style="border-top: 0;">Name:</th>
    <td class="col-sm-10" style="border-top: 0;"><?php echo $cinema["name"]; ?></td>
  </tr>
  <tr>
    <th class="col-sm-2">Address:</th>
    <td class="col-sm-10"><?php echo $cinema["address"]; ?></td>
  </tr>
  <tr>
    <th class="col-sm-2">Owner:</th>
    <td class="col-sm-10"><?php echo $cinema["owner"]; ?></td>
  </tr>
</table>

<div class="page-header">
  <h1 class="page-title">Manage Your Theaters</h1>
</div>
<a href=<?php echo "/cinemas/" . $_REQUEST["cinema_id"] . "/theaters/new"; ?> class="btn btn-success">Add New Theater</a>
<table class="table table-striped table-condensed" style="margin-top: 20px;">
  <thead class="bg-primary">
    <tr>
      <th class="col-sm-3">Theater Number</th>
      <th class="col-sm-3">Capacity</th>
      <th class="col-sm-2">Num Showings</th>
      <th class="col-sm-4 text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ( $theaters->num_rows == 0 ) {
        echo "<tr><td class='text-center' colspan=6>This cinema doesn't have any theaters.</td></tr>";
      } else {
        while ( $theater = $theaters->fetch_assoc() ) {
          echo "<tr>";
          echo "<td>" . $theater["number"] . "</td>";
          echo "<td>" . $theater["capacity"] . "</td>";
          echo "<td>" . $theater["showing_count"] . "</td>";
          echo "<td class='text-center' ><a class='btn btn-warning' href='/cinemas/" . $_REQUEST["cinema_id"] . "/theaters/" . $theater["theater_id"] . "/edit' style='margin-right: 10px;'>Edit</a><a class='btn btn-danger' href='/theaters/destroy.php?cinema_id=" . $_REQUEST["cinema_id"] . "&theater_id=" . $theater["theater_id"] . "'>Delete</a></td>";
          echo "</tr>";
        }
      }
    ?>
  </tbody>
</table>

<div class="page-header">
  <h1 class="page-title">Manage Your Showings</h1>
</div>
<a href="<?php echo "/cinemas/" . $_REQUEST["cinema_id"] . "/showings/new"; ?>" class="btn btn-success">Add New Showing</a>
<a href="<?php echo "/cinemas/" . $_REQUEST["cinema_id"] . "/report"; ?>" class="btn btn-info">Showings Report</a>
<table class="table table-striped table-condensed" style="margin: 20px 0">
  <thead class="bg-primary">
    <tr>
      <th>Date</th>
      <th>Start Time</th>
      <th>Movie</th>
      <th>Theater Number</th>
      <th>Run Time</th>
      <th>Price</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ( $showings->num_rows == 0 ) {
        echo "<tr><td class='text-center' colspan=6>This cinema doesn't have any showings.</td></tr>";
      } else {
        while ( $showing = $showings->fetch_assoc() ) {
          echo "<tr>";
          echo "<td>" . date("m/d/Y", strtotime($showing["show_date"])) . "</td>";
          echo "<td>" . date("g:i A", strtotime($showing["show_time"])) . "</td>";
          echo "<td>" . $showing["movie"] . "</td>";
          echo "<td>" . $showing["theater_number"] . "</td>";
          echo "<td>" . $showing["run_time"] . " Minutes</td>";
          echo "<td>$" . number_format($showing["price"]/100, 2, '.', ' ') . "</td>";
          echo "<td class='text-center' ><a class='btn btn-warning' href='/cinemas/" . $_REQUEST["cinema_id"] . "/showings/" . $showing["showing_id"] . "/edit' style='margin-right: 10px;'>Edit</a><a class='btn btn-danger' href='/showings/destroy.php?cinema_id=" . $_REQUEST["cinema_id"] . "&showing_id=" . $showing["showing_id"] . "'>Delete</a></td>";
          echo "</tr>";
        }
      }
    ?>
  </tbody>
</table>

<?php include '../layout/footer.htm'; ?>
