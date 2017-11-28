<?php
  include './layout/header.htm';
?>

<div class="container-fluid" style="padding: 0;<?php echo $_COOKIE["account_id"] ? "margin-top: 70px;" : "margin-top: 120px;"; ?>">
  <div class="col-sm-7 col-sm-offset-1">
    <h1 style="color: white; font-size: 64px; margin-top: 0;">
      A Database Concepts Website
      <br>
      <small style="color: #9d9d9d;">by <a class="text-primary" href='https://github.com/kyle-glick' target='_blank' style='text-decoration: none; transition: color .2s;'>Kyle Glick</a></small>
    </h1>
    <label style="color: #9d9d9d; font-size: 24px;">
      A simple PHP / SQL website for movie tickets similar to IMDb
      <br>
      to demonstrate various database concepts.
      <br>
      Created for my CSCI 332 - Database Concepts class.
    </label>
    <ul style="color: #9d9d9d; font-size: 24px; list-style: none; font-weight: bold;">
      <li><strong>-</strong> Table DDL</li>
      <li><strong>-</strong> View DDL</li>
      <li><strong>-</strong> Procedure DDL</li>
      <li><strong>-</strong> Function DDL</li>
      <li><strong>-</strong> Trigger DDL</li>
      <li><strong>-</strong> DML Statements</li>
      <li><strong>-</strong> Simple Reports</li>
      <li><strong>-</strong> Integrity Enforcement</li>
      <li><strong>-</strong> Isolation Levels</li>
      <li><strong>-</strong> Normalization</li>
      <li><strong>-</strong> ER Diagram</li>
    </ul>
  </div>
</div>

<div class="container-fluid text-center" style="margin-top: 140px">
  <h1 style="margin: 0; font-size: 64px;">
    <a href="#actions" style="color: white; text-decoration: none;">
      <span class="glyphicon glyphicon-chevron-down"></span>
    </a>
  </h1>
</div>

<div id="actions" class="container-fluid" style="padding: 0; margin-top: 140px; display: flex; justify-content: space-around;">
  <div class="panel panel-default col-sm-3" style="padding: 30px 15px; background: transparent; border: 10px solid white;">
    <div class="panel-body">
      <div class="page-header" style="margin-top: 0; color: white;">
        <h1 class="page-title text-center" style="margin-top: 0; font-size: 64px;">What's Playing</h1>
      </div>
      <a class="btn btn-lg btn-primary col-sm-8 col-sm-offset-2" style="border: 5px solid #2e6da4; color: #2e6da4; background: white; transition: color .1s, background .1s; box-shadow: none;" onMouseOver="this.style.background='#2e6da4'; this.style.color='white'" onMouseOut="this.style.background='white'; this.style.color='#2e6da4'" href="/movies">View Movies</a>
    </div>
  </div>
  <div class="panel panel-default col-sm-3" style="padding: 30px 15px;  background: transparent; border: 10px solid white;">
    <div class="panel-body">
      <div class="page-header" style="margin-top: 0; color: white;">
        <h1 class="page-title text-center" style="margin-top: 0; font-size: 64px;">Purchase Tickets</h1>
      </div>
      <a class="btn btn-lg btn-primary col-sm-8 col-sm-offset-2" style="border: 5px solid #2e6da4; color: #2e6da4; background: white; transition: color .1s, background .1s; box-shadow: none;" onMouseOver="this.style.background='#2e6da4'; this.style.color='white'" onMouseOut="this.style.background='white'; this.style.color='#2e6da4'" href="/accounts">Log In</a>
    </div>
  </div>
  <div class="panel panel-default col-sm-3" style="padding: 30px 15px;  background: transparent; border: 10px solid white;">
    <div class="panel-body">
      <div class="page-header" style="margin-top: 0; color: white;">
        <h1 class="page-title text-center" style="margin-top: 0; font-size: 64px;">Cinemas Near Me</h1>
      </div>
      <a class="btn btn-lg btn-primary col-sm-8 col-sm-offset-2" style="border: 5px solid #2e6da4; color: #2e6da4; background: white; transition: color .1s, background .1s; box-shadow: none;" onMouseOver="this.style.background='#2e6da4'; this.style.color='white'" onMouseOut="this.style.background='white'; this.style.color='#2e6da4'" href="/cinemas">Find a Cinema</a>
    </div>
  </div>
</div>

<div class="container-fluid" style="padding: 0; margin-top: 120px;">
  <div class="col-sm-12 text-center">
    <h1 style="color: white; font-size: 64px; margin-top: 0;">Top Movies of 2017</h1>
  </div>
  <div class="col-sm-12" style="background: black; padding-right: 0; padding-bottom: 180px; display: flex; align-items: flex-start;">
    <img src="images/beauty_and_the_beast.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/wonder_woman.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/guardians_of_the_galaxy_2.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/spiderman_homecoming.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/despicable_me_3.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/logan.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/the_fate_of_the_furious.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/dunkirk.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/the_lego_batman_movie.jpg" width="10%" style="padding-right: 15px;">
    <img src="images/get_out.jpg" width="10%" style="padding-right: 15px;">
  </div>
</div>
