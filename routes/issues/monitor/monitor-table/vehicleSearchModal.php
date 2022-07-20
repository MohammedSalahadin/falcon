<div class="modal fade" id="vehicleSearchModal" tabindex="-1" aria-labelledby="vehicleSearchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg--primary border-bottom">
        <h5 class="modal-title " id="vehicleSearchModalLabel">Vehicle Search</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-light">
       <!-- your code here start -->
       <table class="table">
  <thead>
    <tr>
      <div class="text-left">

        <th scope="col">Vehicle ID</th>
        <th scope="col">License Plate</th>
        <th scope="col">Permit Number</th>
      </div>
      <div class="text-center">

        <th scope="col">VIN</th>
        <th scope="col">Property Name</th>
        <th scope="col">Expires</th>
      </div>
    </tr>
  </thead>
</table>

       <!-- your code here  end -->
       <div class="modal-footer d-flex justify-content-evenly">
        <input type="text" name="liecensePlate" id="liecensePlate" class="p-2 bg--primary border-0" placeholder="Liecense Plate">
        <input type="text" class="p-2 bg--primary border-0 " name="permitNumber" id="permitNumber" placeholder="permit number">
        <input type="text"  class="p-2 bg--primary border-0" name="vin" id="vin" placeholder="vin">
        <select   class="p-2 bg--primary border-0 " name="propertyNameVHM" id="propertyNameVHM">
          <option value="1" disabled>select Property</option>
          <option value="test" >test</option>
        </select>
        <button class="btn btn-primary">Search</button>
       
      </div>
        </div>

      </div>
    </div>
  </div>

</div>