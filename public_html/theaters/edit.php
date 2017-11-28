<?php
  include '../layout/header.htm';
?>

<?php
  $sql = "select * from TheaterInformation where theater_id=" . $_REQUEST["theater_id"];

  if ( !$result = $mysqli->query($sql) ) {
    include '../sql/sqlerror.php';
  }

  $row = $result->fetch_assoc();
?>

<div class="page-header">
  <h1 class="page-title">Edit Theater</h1>
</div>

<form class="form" action="/theaters/update.php" method="put">
  <input name="cinema_id" type="hidden" value="<?php echo $_REQUEST["cinema_id"]; ?>">
  <input type="hidden" name="theater_id" value=<?php echo $_REQUEST["theater_id"]; ?>>

  <div class="form-group row">
    <label for="number" class="control-label col-sm-2 required">
      Theater Number:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <input id="number" class="form-control" type="text" name="number" value="<?php echo $row["number"] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="capacity" class="control-label col-sm-2 required">
      Capacity:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <input id="capacity" class="form-control" type="text" name="capacity" value="<?php echo $row["capacity"] ?>">
    </div>
  </div>
  <input class="btn btn-success" type="submit" value="Save">
  <a class="btn btn-danger" href="<?php echo "/cinemas/" . $_REQUEST["cinema_id"] . "/show"; ?>">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>