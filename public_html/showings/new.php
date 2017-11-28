<?php
  include '../layout/header.htm';
?>

<?php
  $movie_sql = "select title, id from Movies";
  $theater_sql = "select number, id from Theaters where cinema_id=" . $_REQUEST["cinema_id"];

  if ( !$movies = $mysqli->query($movie_sql) ) {
    include '../sql/sqlerror.php';
  }

  if ( !$theaters = $mysqli->query($theater_sql) ) {
    include '../sql/sqlerror.php';
  }
?>

<div class="page-header">
  <h1 class="page-title">Add a New Showing</h1>
</div>

<form class="form" action="/showings/create.php" method="post">
  <input name="cinema_id" type="hidden" value="<?php echo $_REQUEST["cinema_id"]; ?>">

  <div class="form-group row">
    <label for="movie_id" class="control-label col-sm-2 required">
      Movie:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <select id="movie_id" class="selectpicker form-control" name="movie_id">
        <option value="">Nothing Selected</option>
        <?php
          while( $movie = $movies->fetch_assoc() ) {
            echo "<option value='" . $movie["id"] . "'>" . $movie["title"] . "</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="theater_id" class="control-label col-sm-2 required">
      Theater:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <select id="theater_id" class="selectpicker form-control" name="theater_id">
        <option value="">Nothing Selected</option>
        <?php
          while( $theater = $theaters->fetch_assoc() ) {
            echo "<option value='" . $theater["id"] . "'>Theater " . $theater["number"] . "</option>";
          }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="show_date" class="control-label col-sm-2 required">
      Date:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
        <input id="show_date" class="form-control" type="date" name="show_date" placeholder="mm/dd/yyyy">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="show_time" class="control-label col-sm-2 required">
      Show Time:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-time"></span>
        </span>
        <input id="show_time" class="form-control" type="time" name="show_time" placeholder="hh:mm">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="control-label col-sm-2 required">
      Ticket Price:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <div class="input-group">
        <span class="input-group-addon" style="padding-left: 15px; padding-right: 15px;">$</span>
        <input id="price" class="form-control" type="number" name="price" step=".01" placeholder="0.00">
      </div>
    </div>
  </div>
  <input class="btn btn-success" type="submit" value="Add">
  <a class="btn btn-danger" href="<?php echo "/cinemas/" . $_REQUEST["cinema_id"] . "/show"; ?>">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>