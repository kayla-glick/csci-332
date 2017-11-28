<?php
  include '../layout/header.htm';
?>

<?php
  $sql = "select * from MovieInformation where movie_id=" . $_REQUEST["movie_id"];

  if ( !$result = $mysqli->query($sql) ) {
    include '../sql/sqlerror.php';
  }

  $row = $result->fetch_assoc();
?>

<div class="page-header">
  <h1 class="page-title">Edit Movie</h1>
</div>

<form class="form" action="/movies/update.php" method="put">
  <input id="movie_id" type="hidden" name="movie_id" value=<?php echo $row["movie_id"]; ?>>

  <div class="form-group row">
    <label for="title" class="control-label col-sm-2 required">
      Title:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <input id="title" class="form-control" type="text" name="title" value="<?php echo $row["title"]; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="control-label col-sm-2 required">Description:</label>
    <div class="col-sm-10">
      <textarea id="description" class="form-control" name="description" style="resize: vertical;"><?php echo $row["description"]; ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="genre" class="control-label col-sm-2 required">
      Genre:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <select id="genre" class="selectpicker form-control" name="genre">
        <option value="" <?php echo ($row["genre"] == "" ? "selected='selected'" : ""); ?>>Nothing Selected</option>
        <option value="Action" <?php echo ($row["genre"] == "Action" ? "selected='selected'" : ""); ?>>Action</option>
        <option value="Adult" <?php echo ($row["genre"] == "Adult" ? "selected='selected'" : ""); ?>>Adult</option>
        <option value="Adventure" <?php echo ($row["genre"] == "Adventure" ? "selected='selected'" : ""); ?>>Adventure</option>
        <option value="Animated" <?php echo ($row["genre"] == "Animated" ? "selected='selected'" : ""); ?>>Animated</option>
        <option value="Comedy" <?php echo ($row["genre"] == "Comedy" ? "selected='selected'" : ""); ?>>Comedy</option>
        <option value="Crime" <?php echo ($row["genre"] == "Crime" ? "selected='selected'" : ""); ?>>Crime</option>
        <option value="Documentary" <?php echo ($row["genre"] == "Documentary" ? "selected='selected'" : ""); ?>>Documentary</option>
        <option value="Drama" <?php echo ($row["genre"] == "Drama" ? "selected='selected'" : ""); ?>>Drama</option>
        <option value="Fantasy" <?php echo ($row["genre"] == "Fantasy" ? "selected='selected'" : ""); ?>>Fantasy</option>
        <option value="Historical" <?php echo ($row["genre"] == "Historical" ? "selected='selected'" : ""); ?>>Historical</option>
        <option value="Horror" <?php echo ($row["genre"] == "Horror" ? "selected='selected'" : ""); ?>>Horror</option>
        <option value="Musical" <?php echo ($row["genre"] == "Musical" ? "selected='selected'" : ""); ?>>Musical</option>
        <option value="Sci-Fi" <?php echo ($row["genre"] == "Sci-Fi" ? "selected='selected'" : ""); ?>>Sci-Fi</option>
        <option value="War" <?php echo ($row["genre"] == "War" ? "selected='selected'" : ""); ?>>War</option>
        <option value="Western" <?php echo ($row["genre"] == "Western" ? "selected='selected'" : ""); ?>>Western</option>
        <option value="Other" <?php echo ($row["genre"] == "Other" ? "selected='selected'" : ""); ?>>Other</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="rating" class="control-label col-sm-2 required">
      Rating:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <select id="rating" class="selectpicker form-control" name="rating">
        <option value="" <?php echo ($row["rating"] == "" ? "selected='selected'" : ""); ?>>Nothing Selected</option>
        <option value="G" <?php echo ($row["rating"] == "G" ? "selected='selected'" : ""); ?>>G</option>
        <option value="PG" <?php echo ($row["rating"] == "PG" ? "selected='selected'" : ""); ?>>PG</option>
        <option value="PG-13" <?php echo ($row["rating"] == "PG-13" ? "selected='selected'" : ""); ?>>PG-13</option>
        <option value="R" <?php echo ($row["rating"] == "R" ? "selected='selected'" : ""); ?>>R</option>
        <option value="NC-17" <?php echo ($row["rating"] == "NC-17" ? "selected='selected'" : ""); ?>>NC-17</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="run_time" class="control-label col-sm-2 required">
      Run Time (Minutes):
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-time"></span>
        </span>
        <input id="run_time" class="form-control" type="number" name="run_time" min="0" value="<?php echo $row["run_time"]; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="release_date" class="control-label col-sm-2 required">
      Release Date:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
        <input id="release_date" class="form-control" type="date" name="release_date" placeholder="mm/dd/yyyy" value="<?php echo date("Y-m-d", strtotime($row["release_date"])); ?>">
      </div>
    </div>
  </div>
  <input class="btn btn-success" type="submit" value="Save">
  <a class="btn btn-danger" href="<?php echo "/accounts/" . $_COOKIE["account_id"] . "/show"; ?>">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>