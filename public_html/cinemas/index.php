<?php
  include '../layout/header.htm';
?>

<?php
  if ( $_REQUEST["movie_id"] ) {
    $sql = "SELECT title FROM MovieInformation WHERE movie_id=" . $_REQUEST["movie_id"];

    if ( !$result = $mysqli->query($sql) ) {
      include '../sql/sqlerror.php';
    }

    $row = $result->fetch_assoc();
  }
?>

<div class="page-header">
  <?php if ( $_REQUEST["movie_id"] ) : ?>
    <h1 class="page-title">
      Cinemas Showing <?php echo $row["title"]; ?>
      <a class="btn btn-warning pull-right" href="/movies">Choose Different Movie</a>
      <div class="clearfix"></div>
    </h1>
  <?php else : ?>
    <h1 class="page-title">Find a Cinema</h1>
  <?php endif ?>
</div>

<?php
  $cinema_sql = "SELECT DISTINCT cins.cinema_id, cins.name, cins.address FROM CinemaInformation cins" . ($_REQUEST["movie_id"] ? " INNER JOIN Theaters thets ON thets.cinema_id = cins.cinema_id INNER JOIN Showings shows ON shows.theater_id=thets.id WHERE shows.movie_id=" . $_REQUEST["movie_id"] : "");

  if ( !$cinemas = $mysqli->query($cinema_sql) ) {
    include '../sql/sqlerror.php';
  } 

  if ( $cinemas->num_rows == 0 ) {
    echo "<div class='alert alert-danger'><h1 style='margin: 0;'>There are no cinemas near you!</h1></div>";
  } else {
    $n = 0;
    while($cinema = $cinemas->fetch_assoc()) {
      if ( $n % 3 == 0 ) {
        echo "<div class='container-fluid' style='padding: 0; display: flex;'>";
      }
      echo "<div class='col-sm-4' style='margin-bottom: 20px; display: flex;'>";
      echo "<div class='panel panel-default' style='width: 100%; display: flex; flex-flow: column;'>";
      echo "<div class='panel-body' style='padding-top: 0; padding-bottom: 0; flex: 1 auto;'>";
      echo "<h1 style='margin: 15px 0; line-height: 1.5;'>" . $cinema["name"] . "<br><small style='line-height: inherit;'>" . $cinema["address"] . "</small></h1>";
      echo "</div>";
      echo "<a class='btn btn-lg btn-primary' style='width: 100%; border-radius: 0 0 3px 3px;' href='/cinemas/" . $cinema["cinema_id"] . "/showings" . ($_REQUEST["movie_id"] ? "?movie_id=" . $_REQUEST["movie_id"] : "") . "'>View Showings</a>";
      echo "</div>";
      echo "</div>";
      if ( $n % 3 == 2 || $n == ($cinemas->num_rows - 1) ) {
        echo "</div>";
      }
      $n++;
    }
  }
?>

<?php
  include '../layout/footer.htm';
?>