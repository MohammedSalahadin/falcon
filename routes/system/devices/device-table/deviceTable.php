<div class="d-block"> 
  <div class="table table-striped system-table">
    <div class="bg--secondary">
       <div id="system-col">
          <div class="device-inline">
              <p> Search for a Device </p>
              <p class="deviceTable-head"> Global Phone Numbers List </p>
          </div>
          <div class="device-inline next-device"> 
            <input type="text" placeholder="" class="mytext-1"> 
            <div class="device-middle"> 
              <input type="checkbox">
              <label>Include Inactive Devices </label>
            </div>
            <!-- Device form body -->
            <div class="device-right"> 
                <select class="bg-grey system-select3" aria-label="property name" id="device-selection">
                  <option selected>Choose</option>
                  <option value="(737) 346-2748 Abubaker">(737) 346-2748 Abubaker</option>
                  <option value="(+1) (61-2) 4 Porter">(+1) (61-2) 4 Porter</option>
                </select>
                <button class="save-button" id="btn4" type="button" onClick="openModal()">Add Number</button>
            </div>
          </div>
          <div class="device-body"> 
            <div class="device-body1"> 
                <p class="device-bheader">DEVICES CAN ONLY BE APPROVED BY AN ADMINISTRATOR</p>
                <div class="device-list"> 
                  <?php
                  require('deviceList.php')
                  ?>
                </div>
                </div>
            </div>
            <div class="device-body2"> 
                <?php
                  require('deviceForm.php')
                ?>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- Add Modal display -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <p class="modal-header">Add/Edit Phone Number </p>
    <div class="modal-body">
     <label>Phone Number</label>
     <input type="number" placeholder="" class="mytext-2">
     <label>Phone Number Description</label>
     <input type="text" placeholder="" class="mytext-2"> 
     <button class="save-button" id="import-btn5" type="button">Add</button>
  </div>
  </div>
</div>