<?php
  include '../layout/header.htm';
?>

<div class="page-header">
  <h1 class="page-title">What's Playing</h1>
</div>

<?php
  $movie_sql = "SELECT DISTINCT movs.movie_id, movs.title, movs.description, movs.rating, movs.genre, movs.run_time, movs.producer FROM MovieInformation movs INNER JOIN Showings shows ON movs.movie_id=shows.movie_id";

  if ( !$movies = $mysqli->query($movie_sql) ) {
    include '../sql/sqlerror.php';
  }
  
  if ( $movies->num_rows == 0 ) {
    echo "<div class='alert alert-danger'><h1 style='margin: 0;'>There are no movies playing right now!</h1></div>";
  } else {
    $n = 0;
    while($movie = $movies->fetch_assoc()) {
      if ( $n % 3 == 0 ) {
        echo "<div class='container-fluid' style='padding: 0; display: flex;'>";
      }
      echo "<div class='col-sm-4' style='margin-bottom: 20px; display: flex;'>";
      echo "<div class='panel panel-default' style='width: 100%; display: flex; flex-flow: column;'>";
      echo "<div class='panel-body' style='padding-top: 0; padding-bottom: 0;'>";
      echo "<h2 style='margin: 15px 0; line-height: 1.5;'>" . $movie["title"] . "<br><small style='line-height: inherit;'><span class='rating' style='border: 1px solid #ddd; padding: 0 10px;'>Rated " . $movie["rating"] . "</span><span class='genre pull-right'>" . $movie["genre"] . "</span><br><span class='run-time'>Run Time: " . $movie["run_time"] . " Minutes</span><br><span class='producer'>Producer: " . $movie["producer"] . "</span>" . "</small></h2>";
      echo "</div>";
      echo "<div class='panel-body' style='border-top: 1px solid #ddd; flex: 1 auto;'>";
      echo "<p style='margin: 0;'>" . ($movie["description"] ? $movie["description"] : "No description available.") . "</p>";
      echo "</div>";
      if ( $_COOKIE["account_id"] ) {
        echo "<a class='btn btn-lg btn-primary' style='width: 100%; border-radius: 0 0 3px 3px;' href='/cinemas?movie_id=" . $movie["movie_id"] . "'>Find a Cinema</a>";
      } else {
        echo "<a class='btn btn-lg btn-primary' style='width: 100%; border-radius: 0 0 3px 3px;' href='/accounts'>Log In to Get Tickets</a>";
      }
      echo "</div>";
      echo "</div>";
      if ( $n % 3 == 2 || $n == ($movies->num_rows - 1) ) {
        echo "</div>";
      }
      $n++;
    }
  }
?>

<?php
  include '../layout/footer.htm';
?>