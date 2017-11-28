<?php
  include '../layout/header.htm';
?>

<div class="page-header">
  <h1 class="page-title">
    Find a Showing
    <a class="btn btn-warning pull-right" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Choose Different Cinema</a>
    <div class="clearfix"></div>
  </h1>
</div>

<?php
  $showing_sql = "SELECT * FROM ShowingInformation WHERE cinema_id=" . $_REQUEST["cinema_id"] . ($_REQUEST["movie_id"] ? " AND movie_id=" . $_REQUEST["movie_id"] : "");

  if ( !$showings = $mysqli->query($showing_sql) ) {
    include '../sql/sqlerror.php';
  } 

  if ( $showings->num_rows == 0 ) {
    echo "<div class='alert alert-danger'><h1 style='margin: 0;'>There are no showings at this cinema!</h1></div>";
  } else {
    $n = 0;
    while($showing = $showings->fetch_assoc()) {
      if ( $n % 4 == 0 ) {
        echo "<div class='container-fluid' style='padding: 0; display: flex;'>";
      }
      echo "<div class='col-sm-3' style='margin-bottom: 20px; display: flex;'>";
      echo "<div class='panel panel-default' style='width: 100%; display: flex; flex-flow: column;'>";
      echo "<div class='panel-body' style='padding-top: 0; padding-bottom: 0; flex: 1 auto;'>";
      echo "<h2 style='margin: 15px 0; line-height: 1.5;'>" . $showing["movie"] . "<br><small style='line-height: inherit;'><span class='rating' style='border: 1px solid #ddd; padding: 0 10px;'>Rated " . $showing["rating"] . "</span><br>" . date("m/d/Y", strtotime($showing["show_date"])) . " | " . date("g:i A", strtotime($showing["show_time"])) . "<br>Theater " . $showing["theater_number"] . "<br>Price: $" . number_format($showing["price"]/100, 2, '.', ' ') . "</small></h2>";
      echo "</div>";
      if ( $showing["capacity"] == $showing["ticket_count"] ) {
        echo "<a class='btn btn-lg btn-danger disabled' style='width: 100%; border-radius: 0 0 3px 3px;'>Sold Out</a>";
      } else if ( $_COOKIE["account_id"] ) {
        echo "<a class='btn btn-lg btn-primary' style='width: 100%; border-radius: 0 0 3px 3px;' href='/cinemas/" . $_REQUEST["cinema_id"] . "/showings/" . $showing["showing_id"] . "/tickets/new'>Get Tickets</a>";
      } else {
        echo "<a class='btn btn-lg btn-primary' style='width: 100%; border-radius: 0 0 3px 3px;' href='/accounts'>Log In to Get Tickets</a>";
      }
      echo "</div>";
      echo "</div>";
      if ( $n % 4 == 3 || $n == ($showings->num_rows - 1) ) {
        echo "</div>";
      }
      $n++;
    }
  }
?>

<?php
  include '../layout/footer.htm';
?>