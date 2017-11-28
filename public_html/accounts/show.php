<?php
  setcookie("account_id", $_REQUEST["id"], 0, "/");
?>

<?php include '../layout/header.htm'; ?>

<?php
  $account_sql = "select * from AccountInformation where account_id=" . $_REQUEST["id"];
  $ticket_sql = "select * from TicketInformation where account_id=" . $_REQUEST["id"];
  $cinema_sql = "select * from CinemaInformation where owner_id=" . $_REQUEST["id"];
  $movie_sql = "select * from MovieInformation where producer_id=" . $_REQUEST["id"];

  if ( !$accounts = $mysqli->query($account_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( !$tickets = $mysqli->query($ticket_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( !$cinemas = $mysqli->query($cinema_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( !$movies = $mysqli->query($movie_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( $accounts->num_rows == 0 ) {
    echo "<div class='alert alert-danger text-center col-sm-12'><h1 style='margin: 0;'>User not found with ID " . $_REQUEST["id"] . "</h1></div>";
    exit;
  } else {
    $user = $accounts->fetch_assoc();
  }
?>

<div class="page-header">
  <h1 class="page-title">Account Information</h1>
</div>
<table class="table">
  <tr>
    <th class="col-sm-2" style="border-top: 0;">Name:</th>
    <td class="col-sm-10" style="border-top: 0;"><?php echo $user["first_name"] . " " . $user["last_name"]; ?></td>
  </tr>
  <tr>
    <th class="col-sm-2">Address:</th>
    <td class="col-sm-10"><?php echo $user["address"]; ?></td>
  </tr>
  <tr>
    <th class="col-sm-2">Email:</th>
    <td class="col-sm-10"><?php echo $user["email"]; ?></td>
  </tr>
</table>

<div class="page-header">
  <h1 class="page-title">Your Tickets</h1>
</div>
<a href=<?php echo "/movies"; ?> class="btn btn-success">Purchase Tickets</a>
<table class="table table-striped table-condensed" style="margin-top: 20px;">
  <thead class="bg-primary">
    <tr>
      <th class="col-sm-3">Movie</th>
      <th class="col-sm-3">Cinema</th>
      <th class="col-sm-2">Date</th>
      <th class="col-sm-2">Show Time</th>
      <th class="col-sm-2">Theater #</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ( $tickets->num_rows == 0 ) {
        echo "<tr><td class='text-center' colspan=6>You don't have any tickets.</td></tr>";
      } else {
        while ( $ticket = $tickets->fetch_assoc() ) {
          echo "<tr>";
          echo "<td>" . $ticket["movie_title"] . "</td>";
          echo "<td><strong>" . $ticket["cinema_name"] . "</strong><br>" . $ticket["address"] . "</td>";
          echo "<td>" . date("d/m/Y", strtotime($ticket["show_date"])) . "</td>";
          echo "<td>" . date("g:i A", strtotime($ticket["show_time"])) . "</td>";
          echo "<td>Theater " . $ticket["theater_number"] . "</td>";
          echo "</tr>";
        }
      }
    ?>
  </tbody>
</table>

<?php if ( $user["is_owner"] == 1 ) : ?>
  <div class='page-header'>
    <h1 class='page-title'>Manage Your Cinemas</h1>
  </div>
  <a href=<?php echo "/cinemas/new"; ?> class="btn btn-success">Add New Cinema</a>
  <table class="table table-striped table-condensed" style="margin-top: 20px;">
    <thead class="bg-primary">
      <tr>
        <th class="col-sm-2">Name</th>
        <th class="col-sm-3">Address</th>
        <th class="col-sm-2">Num Theaters</th>
        <th class="col-sm-2">Num Showings</th>
        <th class="col-sm-3 text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if ( $cinemas->num_rows == 0 ) {
          echo "<tr><td class='text-center' colspan=5>You don't have any cinemas.</td></tr>";
        } else {
          while ( $cinema = $cinemas->fetch_assoc() ) {
            echo "<tr>";
            echo "<td>" . $cinema["name"] . "</td>";
            echo "<td>" . $cinema["address"] . "</td>";
            echo "<td>" . $cinema["theater_count"] . "</td>";
            echo "<td>" . $cinema["showing_count"] . "</td>";
            echo "<td class='text-center'><a class='btn btn-primary' href='/cinemas/" . $cinema["cinema_id"] . "/show' style='margin-right: 10px;'>Manage</a><a class= 'btn btn-warning' href='/cinemas/" . $cinema["cinema_id"] . "/edit' style='margin-right: 10px;'>Edit</a><a class='btn btn-danger' href='/cinemas/destroy.php?cinema_id=" . $cinema["cinema_id"] . "'>Delete</a></td>";
            echo "</tr>";
          }
        }
      ?>
    </tbody>
  </table>
<?php endif; ?>

<?php if ( $user["is_producer"] == 1 ) : ?>
  <div class='page-header'>
    <h1 class='page-title'>Manage Your Movies</h1>
  </div>
  <a href=<?php echo "/movies/new"; ?> class="btn btn-success">Add New Movie</a>
  <table class="table table-striped table-condensed" style="margin-top: 20px;">
    <thead class="bg-primary">
      <tr>
        <th class="col-sm-2">Title</th>
        <th class="col-sm-3">Description</th>
        <th class="col-sm-2">Genre</th>
        <th class="col-sm-1">Rating</th>
        <th class="col-sm-1">Run Time</th>
        <th class="col-sm-1">Release</th>
        <th class="col-sm-2 text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if ( $movies->num_rows == 0 ) {
          echo "<tr><td class='text-center' colspan=7>You don't have any movies.</td></tr>";
        } else {
          while ( $movie = $movies->fetch_assoc() ) {
            echo "<tr>";
            echo "<td>" . $movie["title"] . "</td>";
            echo "<td>" . $movie["description"] . "</td>";            
            echo "<td>" . $movie["genre"] . "</td>";
            echo "<td>" . $movie["rating"] . "</td>";
            echo "<td>" . $movie["run_time"] . " Minutes</td>";
            echo "<td>" . date("m/d/Y", strtotime($movie["release_date"])) . "</td>";
            echo "<td class='text-center'><a class='btn btn-warning' href='/movies/" . $movie["movie_id"] . "/edit' style='margin-right: 10px;'>Edit</a><a class='btn btn-danger' href='/movies/destroy.php?movie_id=" . $movie["movie_id"] . "'>Delete</a></td>";
            echo "</tr>";
          }
        }
      ?>
    </tbody>
  </table>
<?php endif; ?>

<?php include '../layout/footer.htm'; ?>
