<?php
  include '../layout/header.htm';
?>

<div class="page-header">
  <h1 class="page-title">Add a New Movie</h1>
</div>

<form class="form" action="/movies/create.php" method="post">
  <input type="hidden" name="producer_id" value=<?php echo $_COOKIE["account_id"]; ?>>

  <div class="form-group row">
    <label for="title" class="control-label col-sm-2 required">
      Title:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <input id="title" class="form-control" type="text" name="title">
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="control-label col-sm-2 required">Description:</label>
    <div class="col-sm-10">
      <textarea id="description" class="form-control" name="description" style="resize: vertical;"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="genre" class="control-label col-sm-2 required">
      Genre:
      <span class="required text-danger">*</span>
    </label>
    <div class="col-sm-10">
      <select id="genre" class="selectpicker form-control" name="genre">
        <option value="" selected="selected">Nothing Selected</option>
        <option value="Action">Action</option>
        <option value="Adult">Adult</option>
        <option value="Adventure">Adventure</option>
        <option value="Animated">Animated</option>
        <option value="Comedy">Comedy</option>
        <option value="Crime">Crime</option>
        <option value="Documentary">Documentary</option>
        <option value="Drama">Drama</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Historical">Historical</option>
        <option value="Horror">Horror</option>
        <option value="Musical">Musical</option>
        <option value="Sci-Fi">Sci-Fi</option>
        <option value="War">War</option>
        <option value="Western">Western</option>
        <option value="Other">Other</option>
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
        <option value="" selected="selected">Nothing Selected</option>
        <option value="G">G</option>
        <option value="PG">PG</option>
        <option value="PG-13">PG-13</option>
        <option value="R">R</option>
        <option value="NC-17">NC-17</option>
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
        <input id="run_time" class="form-control" type="number" name="run_time" min="0">
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
        <input id="release_date" class="form-control" type="date" name="release_date" placeholder="mm/dd/yyyy">
      </div>
    </div>
  </div>
  <input class="btn btn-success" type="submit" value="Add">
  <a class="btn btn-danger" href="<?php echo "/accounts/" . $_COOKIE["account_id"] . "/show"; ?>">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>