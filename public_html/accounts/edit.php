<?php
  include '../layout/header.htm';
?>

<?php
  $sql = "select * from AccountInformation where account_id=" . $_REQUEST["id"];

  if ( !$result = $mysqli->query($sql) ) {
    include '../sql/sqlerror.php';
  }

  $row = $result->fetch_assoc();
?>

<div class="page-header">
  <h1 class="page-title">Edit Account</h1>
</div>

<form class="form" action="/accounts/update.php" method="put">
  <input id="account_id" type="hidden" name="account_id" value=<?php echo $row["account_id"]; ?>>
  <input id="address_id" type="hidden" name="address_id" value=<?php echo $row["address_id"]; ?>>

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
          <input id="first_name" class="form-control" name="first_name" type="text" value="<?php echo $row["first_name"]; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="last_name" class="control-label col-sm-2 required">
          Last Name:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="last_name" class="form-control" type="text" name="last_name" value="<?php echo $row["last_name"]; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="control-label col-sm-2 required">
          Email:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="email" class="form-control" type="text" name="email" value="<?php echo $row["email"]; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="is_owner" class="control-label col-sm-2 required">
          Cinema Owner:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="is_owner" type="checkbox" name="is_owner" <?php echo ($row["is_owner"] == 1 ? "checked='checked'" : ""); ?>>
        </div>
      </div>
      <div class="form-group row">
        <label for="is_producer" class="control-label col-sm-2 required">
          Producer:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="is_producer" type="checkbox" name="is_producer" <?php echo ($row["is_producer"] == 1 ? "checked='checked'" : ""); ?>>
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
          <input id="street" class="form-control" type="text" name="street" value="<?php echo $row["street"]; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="city" class="control-label col-sm-2 required"l>
          City:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="city" class="form-control" type="text" name="city" value="<?php echo $row["city"]; ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="state" class="control-label col-sm-2 required">
          State:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <select id="state" class="selectpicker form-control" name="state">
            <option value="" <?php echo ($row["state"] == "" ? "selected='selected'" : ""); ?>>Nothing Selected</option>
            <option value="AL" <?php echo ($row["state"] == "AL" ? "selected='selected'" : ""); ?>>Alabama</option>
            <option value="AK" <?php echo ($row["state"] == "AK" ? "selected='selected'" : ""); ?>>Alaska</option>
            <option value="AZ" <?php echo ($row["state"] == "AZ" ? "selected='selected'" : ""); ?>>Arizona</option>
            <option value="AR" <?php echo ($row["state"] == "AR" ? "selected='selected'" : ""); ?>>Arkansas</option>
            <option value="CA" <?php echo ($row["state"] == "CA" ? "selected='selected'" : ""); ?>>California</option>
            <option value="CO" <?php echo ($row["state"] == "CO" ? "selected='selected'" : ""); ?>>Colorado</option>
            <option value="CT" <?php echo ($row["state"] == "CT" ? "selected='selected'" : ""); ?>>Connecticut</option>
            <option value="DE" <?php echo ($row["state"] == "DE" ? "selected='selected'" : ""); ?>>Delaware</option>
            <option value="DC" <?php echo ($row["state"] == "DC" ? "selected='selected'" : ""); ?>>District Of Columbia</option>
            <option value="FL" <?php echo ($row["state"] == "FL" ? "selected='selected'" : ""); ?>>Florida</option>
            <option value="GA" <?php echo ($row["state"] == "GA" ? "selected='selected'" : ""); ?>>Georgia</option>
            <option value="HI" <?php echo ($row["state"] == "HI" ? "selected='selected'" : ""); ?>>Hawaii</option>
            <option value="ID" <?php echo ($row["state"] == "ID" ? "selected='selected'" : ""); ?>>Idaho</option>
            <option value="IL" <?php echo ($row["state"] == "IL" ? "selected='selected'" : ""); ?>>Illinois</option>
            <option value="IN" <?php echo ($row["state"] == "IN" ? "selected='selected'" : ""); ?>>Indiana</option>
            <option value="IA" <?php echo ($row["state"] == "IA" ? "selected='selected'" : ""); ?>>Iowa</option>
            <option value="KS" <?php echo ($row["state"] == "KS" ? "selected='selected'" : ""); ?>>Kansas</option>
            <option value="KY" <?php echo ($row["state"] == "KY" ? "selected='selected'" : ""); ?>>Kentucky</option>
            <option value="LA" <?php echo ($row["state"] == "LA" ? "selected='selected'" : ""); ?>>Louisiana</option>
            <option value="ME" <?php echo ($row["state"] == "ME" ? "selected='selected'" : ""); ?>>Maine</option>
            <option value="MD" <?php echo ($row["state"] == "MD" ? "selected='selected'" : ""); ?>>Maryland</option>
            <option value="MA" <?php echo ($row["state"] == "MA" ? "selected='selected'" : ""); ?>>Massachusetts</option>
            <option value="MI" <?php echo ($row["state"] == "MI" ? "selected='selected'" : ""); ?>>Michigan</option>
            <option value="MN" <?php echo ($row["state"] == "MN" ? "selected='selected'" : ""); ?>>Minnesota</option>
            <option value="MS" <?php echo ($row["state"] == "MS" ? "selected='selected'" : ""); ?>>Mississippi</option>
            <option value="MO" <?php echo ($row["state"] == "MO" ? "selected='selected'" : ""); ?>>Missouri</option>
            <option value="MT" <?php echo ($row["state"] == "MT" ? "selected='selected'" : ""); ?>>Montana</option>
            <option value="NE" <?php echo ($row["state"] == "NE" ? "selected='selected'" : ""); ?>>Nebraska</option>
            <option value="NV" <?php echo ($row["state"] == "NV" ? "selected='selected'" : ""); ?>>Nevada</option>
            <option value="NH" <?php echo ($row["state"] == "NH" ? "selected='selected'" : ""); ?>>New Hampshire</option>
            <option value="NJ" <?php echo ($row["state"] == "NJ" ? "selected='selected'" : ""); ?>>New Jersey</option>
            <option value="NM" <?php echo ($row["state"] == "NM" ? "selected='selected'" : ""); ?>>New Mexico</option>
            <option value="NY" <?php echo ($row["state"] == "NY" ? "selected='selected'" : ""); ?>>New York</option>
            <option value="NC" <?php echo ($row["state"] == "NC" ? "selected='selected'" : ""); ?>>North Carolina</option>
            <option value="ND" <?php echo ($row["state"] == "ND" ? "selected='selected'" : ""); ?>>North Dakota</option>
            <option value="OH" <?php echo ($row["state"] == "OH" ? "selected='selected'" : ""); ?>>Ohio</option>
            <option value="OK" <?php echo ($row["state"] == "OK" ? "selected='selected'" : ""); ?>>Oklahoma</option>
            <option value="OR" <?php echo ($row["state"] == "OR" ? "selected='selected'" : ""); ?>>Oregon</option>
            <option value="PA" <?php echo ($row["state"] == "PA" ? "selected='selected'" : ""); ?>>Pennsylvania</option>
            <option value="RI" <?php echo ($row["state"] == "RI" ? "selected='selected'" : ""); ?>>Rhode Island</option>
            <option value="SC" <?php echo ($row["state"] == "SC" ? "selected='selected'" : ""); ?>>South Carolina</option>
            <option value="SD" <?php echo ($row["state"] == "SD" ? "selected='selected'" : ""); ?>>South Dakota</option>
            <option value="TN" <?php echo ($row["state"] == "TN" ? "selected='selected'" : ""); ?>>Tennessee</option>
            <option value="TX" <?php echo ($row["state"] == "TX" ? "selected='selected'" : ""); ?>>Texas</option>
            <option value="UT" <?php echo ($row["state"] == "UT" ? "selected='selected'" : ""); ?>>Utah</option>
            <option value="VT" <?php echo ($row["state"] == "VT" ? "selected='selected'" : ""); ?>>Vermont</option>
            <option value="VA" <?php echo ($row["state"] == "VA" ? "selected='selected'" : ""); ?>>Virginia</option>
            <option value="WA" <?php echo ($row["state"] == "WA" ? "selected='selected'" : ""); ?>>Washington</option>
            <option value="WV" <?php echo ($row["state"] == "WV" ? "selected='selected'" : ""); ?>>West Virginia</option>
            <option value="WI" <?php echo ($row["state"] == "WI" ? "selected='selected'" : ""); ?>>Wisconsin</option>
            <option value="WY" <?php echo ($row["state"] == "WY" ? "selected='selected'" : ""); ?>>Wyoming</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="zip" class="control-label col-sm-2 required">
          Zipcode:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="zip" class="form-control" type="text" name="zip" placeholder="XXXXX" value="<?php echo $row["zip"]; ?>">
        </div>
      </div>
    </div>
    </div>
  <input class="btn btn-success" type="submit" value="Save">
  <a class="btn btn-danger" href="/accounts/">Cancel</a>
</form>

<?php
  include '../layout/footer.htm';
?>