<div class="d-block">

  <table class="table table-striped ">
    <thead class="bg--secondary">
    <tr>
      <th scope="col">Issue ID</th>
      <th scope="col">
        <select class="form-select bg-light" aria-label="property name">
          <option selected disabled>Property Name</option>

        </select>
      </th>

      <th scope="col">

        <select class="form-select bg-light" aria-label="property name">
          <option selected disabled>Reported Issue</option>
          <option value="1">test</option>

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