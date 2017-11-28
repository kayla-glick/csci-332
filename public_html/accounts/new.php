<?php
  include '../layout/header.htm';
?>

<div class="page-header">
  <h1 class="page-title">Create a New Account</h1>
</div>

<form class="form" action="/accounts/create.php" method="post">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">Account Information</h4>
    </div>
    <div class="panel-body">
      <div class="form-group row">
        <label for="first_name" class="control-label col-sm-2 required">
          First Name:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="first_name" class="form-control" type="text" name="first_name">
        </div>
      </div>
      <div class="form-group row">
        <label for="last_name" class="control-label col-sm-2 required">
          Last Name:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="last_name" class="form-control" type="text" name="last_name">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="control-label col-sm-2 required">
          Email:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="email" class="form-control" type="email" name="email">
        </div>
      </div>
      <div class="form-group row">
        <label for="is_owner" class="control-label col-sm-2 required">
          Cinema Owner:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="is_owner" type="checkbox" value="true" name="is_owner">
        </div>
      </div>
      <div class="form-group row">
        <label for="is_producer" class="control-label col-sm-2 required">
          Producer:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="is_producer" type="checkbox" value="true" name="is_producer">
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
  <input class="btn btn-success" type="submit" value="Create">
  <a class="btn btn-danger" href="/accounts/">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>