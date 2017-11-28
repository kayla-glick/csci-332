<?php
  include '../layout/header.htm';
?>

<?php
  $showing_sql = "SELECT * FROM ShowingInformation WHERE showing_id=" . $_REQUEST["showing_id"];

  if ( !$showings = $mysqli->query($showing_sql) ) {
    include '../sql/sqlerror.php';
  }

  $showing = $showings->fetch_assoc();

  $cinema_sql = "SELECT * FROM CinemaInformation WHERE cinema_id=" . $showing["cinema_id"];

  if ( !$cinemas = $mysqli->query($cinema_sql) ) {
    include '../sql/sqlerror.php';
  }

  $cinema = $cinemas->fetch_assoc();
?>

<div class="page-header">
  <h1 class="page-title">Purchase Tickets</h1>
</div>

<form class="form" action="/tickets/create.php" method="post">
  <input name="showing_id" type="hidden" value="<?php echo $_REQUEST["showing_id"]; ?>">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">Ticket Information</h4>
    </div>
    <div class="panel-body">
      <div class="form-group row">
        <label for="cinema" class="control-label col-sm-2 required">Cinema:</label>
        <div class="col-sm-10">
          <p id="cinema"><?php echo $cinema["name"]; ?></p>
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="control-label col-sm-2 required">Address:</label>
        <div class="col-sm-10">
          <p id="address"><?php echo $cinema["address"]; ?></p>
        </div>
      </div>
      <div class="form-group row">
        <label for="theater-number" class="control-label col-sm-2 required">Theater:</label>
        <div class="col-sm-10">
          <p id="theater-number">Theater <?php echo $showing["theater_number"]; ?></p>
        </div>
      </div>
      <div class="form-group row">
        <label for="ticket-price" class="control-label col-sm-2 required">Price Per Ticket:</label>
        <div class="col-sm-10">
          <p id="ticket-price">$<?php echo number_format($showing["price"]/100, 2, '.', ' '); ?></p>
        </div>
      </div>
      <div class="form-group row">
        <label for="ticket-count" class="control-label col-sm-2 required">
          Number of Tickets:
          <span class="required text-danger">*</span>
        </label>
        <div class="col-sm-10">
          <input id="ticket-count" class="form-control" type="number" name="count" min="1" value="1">
        </div>
      </div>
      <hr>
      <div class="form-group row">
        <label for="total-price" class="control-label col-sm-2 required">Total:</label>
        <div class="col-sm-10">
          <p id="total-price">$<?php echo number_format($showing["price"]/100, 2, '.', ' '); ?></p>
        </div>
      </div>
    </div>
  </div>

  <input class="btn btn-success" type="submit" value="Purchase">
  <a class="btn btn-danger" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Cancel</a>
</form>

<script>
  $(document).on("change", "#ticket-count", function() {
    price = (parseFloat($("#ticket-price").text().replace("$", "")) * parseInt($("#ticket-count").val())).toFixed(2);
    $("#total-price").text("$" + price);
  })
</script>

<?php
  include '../layout/footer.htm';
?>