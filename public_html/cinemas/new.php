<?php
  include '../layout/header.htm';
?>

<div class="page-header">
  <h1 class="page-title">Add a New Cinema</h1>
</div>

<form class="form" action="/cinemas/create.php" method="post">
  <input id="owner_id" type="hidden" name="owner_id" value="<?php echo $_COOKIE["account_id"]; ?>">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">Cinema Information</h4>
    </div>
    <div class="panel-body">
      <div class="form-group row">
        <label for="name" class="control-label col-sm-2 required">
          Name:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="name" class="form-control" type="text" name="name">
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
       Theater Information (Optional)
       <small>Create theaters here or add them later</small>
      </h4>
    </div>
    <div class="panel-body">
      <div class="form-group row">
        <label for="theater_count" class="control-label col-sm-2 required">Number of Theaters:</label>
        <div class="col-sm-10">
          <input id="theater_count" class="form-control" type="number" name="theater_count" min="0">
        </div>
      </div>
      <div class="form-group row">
        <label for="default_capacity" class="control-label col-sm-2 required">Default Theater Capacity:</label>
        <div class="col-sm-10">
          <input id="default_capacity" class="form-control" type="number" name="default_capacity" min="0">
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">Address Information</h4>
    </div>
    <div class="panel-body">
      <div class="form-group row">
        <label for="street" class="control-label col-sm-2 required">
          Street:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="street" class="form-control" type="text" name="street">
        </div>
      </div>
      <div class="form-group row">
        <label for="city" class="control-label col-sm-2 required"l>
          City:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="city" class="form-control" type="text" name="city">
        </div>
      </div>
      <div class="form-group row">
        <label for="state" class="control-label col-sm-2 required">
          State:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <select id="state" class="selectpicker form-control" name="state">
            <option value="" selected="selected">Nothing Selected</option>
	    <option value="AL">Alabama</option>
	    <option value="AK">Alaska</option>
	    <option value="AZ">Arizona</option>
	    <option value="AR">Arkansas</option>
	    <option value="CA">California</option>
	    <option value="CO">Colorado</option>
	    <option value="CT">Connecticut</option>
	    <option value="DE">Delaware</option>
	    <option value="DC">District Of Columbia</option>
	    <option value="FL">Florida</option>
	    <option value="GA">Georgia</option>
	    <option value="HI">Hawaii</option>
	    <option value="ID">Idaho</option>
	    <option value="IL">Illinois</option>
	    <option value="IN">Indiana</option>
	    <option value="IA">Iowa</option>
	    <option value="KS">Kansas</option>
	    <option value="KY">Kentucky</option>
	    <option value="LA">Louisiana</option>
	    <option value="ME">Maine</option>
	    <option value="MD">Maryland</option>
	    <option value="MA">Massachusetts</option>
	    <option value="MI">Michigan</option>
	    <option value="MN">Minnesota</option>
	    <option value="MS">Mississippi</option>
	    <option value="MO">Missouri</option>
	    <option value="MT">Montana</option>
	    <option value="NE">Nebraska</option>
	    <option value="NV">Nevada</option>
	    <option value="NH">New Hampshire</option>
	    <option value="NJ">New Jersey</option>
	    <option value="NM">New Mexico</option>
	    <option value="NY">New York</option>
	    <option value="NC">North Carolina</option>
	    <option value="ND">North Dakota</option>
	    <option value="OH">Ohio</option>
	    <option value="OK">Oklahoma</option>
	    <option value="OR">Oregon</option>
	    <option value="PA">Pennsylvania</option>
	    <option value="RI">Rhode Island</option>
	    <option value="SC">South Carolina</option>
	    <option value="SD">South Dakota</option>
	    <option value="TN">Tennessee</option>
	    <option value="TX">Texas</option>
	    <option value="UT">Utah</option>
	    <option value="VT">Vermont</option>
	    <option value="VA">Virginia</option>
	    <option value="WA">Washington</option>
	    <option value="WV">West Virginia</option>
	    <option value="WI">Wisconsin</option>
	    <option value="WY">Wyoming</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="zip" class="control-label col-sm-2 required">
          Zipcode:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="zip" class="form-control" type="text" format="[0-9]{5}" name="zip" placeholder="XXXXX">
        </div>
      </div>
    </div>
    </div>
  <input class="btn btn-success" type="submit" value="Add">
  <a class="btn btn-danger" href="<?php echo "/accounts/" . $_COOKIE["account_id"] . "/show"; ?>">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>
