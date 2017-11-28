<?php
  include '../layout/header.htm';
?>

<div class="page-header">
  <h1 class="page-title">Add a New Theater</h1>
</div>

<form class="form" action="/theaters/create.php" method="post">
  <input name="cinema_id" type="hidden" value="<?php echo $_REQUEST["cinema_id"]; ?>">

  <div class="form-group row">
    <label for="number" class="control-label col-sm-2 required">
      Theater Number:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <input id="number" class="form-control" type="text" name="number">
    </div>
  </div>
  <div class="form-group row">
    <label for="capacity" class="control-label col-sm-2 required">
      Capacity:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <input id="capacity" class="form-control" type="text" name="capacity">
    </div>
  </div>
  <input class="btn btn-success" type="submit" value="Add">
  <a class="btn btn-danger" href="<?php echo "/cinemas/" . $_REQUEST["cinema_id"] . "/show"; ?>">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>