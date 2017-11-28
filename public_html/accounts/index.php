<?php
  include '../layout/header.htm';
?>

<div class="page-header">
  <h1 class="page-title">Accounts</h1>
</div>

<a class="btn btn-xl btn-success" href="/accounts/new">Create New Account</a>

<table class="table table-striped table-condensed" style="margin-top: 20px;">
  <thead class="bg-primary">
    <tr>
      <th class="col-sm-2">Name</th>
      <th class="col-sm-2">Email</th>
      <th class="col-sm-3">Address</th>
      <th class="col-sm-1 text-center">Owner</th>
      <th class="col-sm-1 text-center">Producer</th>
      <th class="col-sm-3 text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "select * from AccountInformation";

      if ( !$result = $mysqli->query($sql) ) {
        echo "<tr><td colspan=6>";
        include '../sql/sqlerror.php';
        echo "</td></tr>";
      } else if ( $result->num_rows == 0 ) {
        echo "<tr><td class='text-center' colspan=6>No Accounts Found. Create one to log in.</td></tr>";
      } else {
        while( $row = $result->fetch_assoc() ) {
          echo "<tr>";
          echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["address"] . "</td>";
          echo "<td class='text-center'>" . ($row["is_owner"] == 1 ? "Yes" : "No") . "</td>";
          echo "<td class='text-center'>" . ($row["is_producer"] == 1 ? "Yes" : "No") . "</td>";
          echo "<td class='text-center'>" . "<a class='btn btn-primary' href='/accounts/" . $row["account_id"] . "/show' style='margin-right: 10px;'>Log In</a><a class='btn btn-warning' href='/accounts/" . $row["account_id"] . "/edit' style='margin-right: 10px;'>Edit</a>" . "<a class='btn btn-danger' href='/accounts/destroy.php?id=" . $row["account_id"] . "'>Delete</a>" . "</td>";
          echo "</tr>";
        }
      }
    ?>
  </tbody>
</table>

<?php
  include '../layout/footer.htm';
?>