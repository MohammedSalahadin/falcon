<?php require('newIssue.php') ?>

 <div class="d-flex aligin-item-center p-2 bg--secondary">

	<div class="ms-2 p-1">
 <input type="text" class="filter" id="IssueTraking" placeholder="Issue ID/Tracking #" >
</div>
<div class="ms-5 p-1">
    <label>
        <input type="checkbox" id="security" checked="checked">
        Security
    </label>
    <label>
        <input type="checkbox" id="parking" checked="checked">
        Parking
    </label>
    <label>
        <input type="checkbox" id="maintenance" checked="checked">
        Maintenance
    </label>
    <label>
        <input type="checkbox" id="closed" checked="checked">
        Include Close
    </label>
</div>
<div class="none"></div>
</div>





 <div class="d-flex alert-secondary  justify-content-between aligin-item-center">
 	
 		<div class="footerModal">
			 
 		<img data-bs-toggle="modal" data-bs-target="#issueSummery" src="https://demo2.silvertracker.net/Images/summarysm.png">
		<img data-bs-toggle="modal" data-bs-target="#vehicleSearchModal" src="https://demo2.silvertracker.net/Images/vehiclesearch.png">
 		<img data-bs-toggle="modal" data-bs-target="#taskSummery" src="https://demo2.silvertracker.net/Images/taskbluesm.png">
 		<img data-bs-toggle="modal" data-bs-target="#checkPointSummery" src="https://demo2.silvertracker.net/Images/checkpointbluesm.png">
 		<img data-bs-toggle="modal" data-bs-target="#userMapModal" src="https://demo2.silvertracker.net/Images/gps.png">
 		<img id="monitorMessageIcon" src="https://demo2.silvertracker.net/Images/messageboardsm.png">
 		<img data-bs-toggle="modal" data-bs-target="#propertyAlertModal" src="https://demo2.silvertracker.net/Images/NewNote.png">
 		</div>
		 
 		<div class="text-center ">
 		<input type="button" data-bs-toggle="modal" data-bs-target="#newIssueModal" id="cmdnew" value="New Action" style="background-color: #03508e; color: white;">
 	</div>


 		<div class="float-right">
 		<img src="https://demo2.silvertracker.net/Images/StartNormal.png">
 		<img src="https://demo2.silvertracker.net/Images/PreviousNormal.png">
 		<label id="lblpage">1</label>
 		<img src="https://demo2.silvertracker.net/Images/NextNormal.png">
 		<input type="button" value="Update" style="color: white; background-color: #03508e; width: 100px">
 	</div>

 </div>
 <?php require('taskSummeryModal.php') ?>
 
 <?php require('vehicleSearchModal.php') ?>
</div>

<?php require('checkPointSummeryModal.php') ?>


<?php require('propertyAlertModal.php') ?>
<?php require('userMapModal.php') ?>
<?php require('issueSummeryModal.php') ?>
