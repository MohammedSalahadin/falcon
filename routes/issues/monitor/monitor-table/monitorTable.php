<div class="d-block">

  <table class="table table-striped" id="monitor_table">
    <thead class="bg--secondary">
    <tr>
      <th scope="col">Issue ID</th>
      <th scope="col">
        <select class="form-select bg-light" aria-label="property name" id="filter_property">
          <option selected value="" >All Properties</option>
          <option  value="Austin" >Austin</option>
          <option  value="New Yourk" >New Yourk</option>
        </select>
      </th>

      <th scope="col">
        <select class="form-select bg-light" aria-label="property name" id="filter_issue">
          <option selected value="" >All Issues</option>
          <option value="property inspection">property inspection</option>
          <option value="check in">check in</option>
          <option value="check out">check out</option>
        </select>
       
      </th>

      <th scope="col">

        <input type="datetime-local" class="form-select bg-light" name="createdDate" id="">
      </th>

      <!-- choose user modal filter start -->
      <th scope="col">
        <button class="btn bg-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Created By</button>
        <?php 
      require('monitorFilterModal.php')
      ?>
      </th>
      <!-- modal filter end -->

      <th scope="col">
        <select class="form-select bg-light" aria-label="property name">
          <option selected disabled>All</option>
          <option value="1">test</option>
        </select>
      </th>

      <!-- choose user modal filter start -->
      <th scope="col">
        <button class="btn bg-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Assigned</button>
      </th>
      <!-- modal filter end -->
    </tr>
  </thead>
  <tbody class="text-center fs-6">
    <?php require('tableBody.php') ?>
  </tbody>
</table>
  <?php require('monitorFooterTable.php') ?>

</div>
<?php require('cameraModalReportModal.php') ?>