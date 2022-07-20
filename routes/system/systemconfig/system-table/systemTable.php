<div class="d-block"> 
  <div class="table table-striped system-table">
    <div class="bg--secondary">
      <div id="system-col">
        <a class="btn btn-primary toggle-btn" href="#" role="button" onClick="showGeneral()" autofocus>General</a> 
        <a class="btn btn-primary toggle-btn" href="#" role="button" onClick="showNotifications()">Notifications</a> 
        <a class="btn btn-primary toggle-btn" href="#" role="button" onClick="showEmail()" >Email</a> 
        <a class="btn btn-primary toggle-btn" href="#" role="button" onClick="showLogo()">Logos</a> 
        <a class="btn btn-primary toggle-btn" href="#" role="button" onClick="showSoftware()">Team Software</a> 
      </div>
      <div class="system-table-body1">
        <div id="general" style="display:block;">
            <?php require('general.php') ?>
          </div>
          <div id="notifications" style="display:none;">
            <?php require('notifications.php') ?>
          </div>
          <div id="logo" style="display:none;">
            <?php require('logos.php') ?>
          </div>
          <div id="team-software" style="display:none;">
            <?php require('team-software.php') ?>
          </div>
          <div id="email" style="display:none;">
            <?php require('email.php') ?>
          </div>
      </div>
    </div>
  </div>