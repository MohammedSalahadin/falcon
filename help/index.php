<?php include('header.php'); ?>

  <section>
    <div class="container">
      <?php
      // suppose there is a list of many bio in database and we get it as a json file such as bellow
      $bio = json_decode('[
  {
     "Title":"Start Here",
     "url":"1",
     "icon":"bi-file-earmark-plus",
     "body":"A few tools to get you started on your journey with Silvertrac",
     "articles":"4",
     "Written":"Casey Evans",
     "avatar":"avatar1.png"
  },
  {
    "Title":"Property Basics",
    "url":"2",
    "icon":"bi-folder-plus",
    "body":"Includes management companies, adding a property, addresses, units, locations, post orders, and more.",
    "articles":"11",
    "Written":"Casey Evans",
    "avatar":"avatar1.png"
 },
  {
    "Title":"Issue Types",
    "url":"3",
    "icon":"bi-info-circle",
    "body":"Includes adding issue types, editing issue types, and general best practices.",
    "articles":"7",
    "Written":"Casey Evans",
    "avatar":"avatar1.png"
 },
  {
    "Title":"Checkpoints",
    "url":"4",
    "icon":"bi-check-circle",
    "body":"Everything you need to know about Silvertracs Checkpoint feature.",
    "articles":"17",
    "Written":"Casey Evans",
    "avatar":"avatar1.png"
 },
 {
   "Title":"Tasks",
   "url":"4",
   "icon":"bi-arrow-repeat",
   "body":"Scheduling reminders so officers know exactly what to do and when.",
   "articles":"7",
   "Written":"Casey Evans",
   "avatar":"avatar1.png"
},
 {
   "Title":"Managing Users",
   "url":"4",
   "icon":"bi-person-check",
   "body":"Includes adding and managing officers, supervisors, and customer users.",
   "articles":"16",
   "Written":"Casey Evans",
   "avatar":"avatar1.png"
},
 {
   "Title":"Device Maintenance",
   "url":"4",
   "icon":"bi-phone",
   "body":"Everything you need to manage your devices in Silvertrac.",
   "articles":"4",
   "Written":"Casey Evans",
   "avatar":"avatar1.png"
},
 {
   "Title":"The Issue Monitor",
   "url":"4",
   "icon":"bi-laptop",
   "body":"",
   "articles":"9",
   "Written":"Casey Evans",
   "avatar":"avatar1.png"
}
]');

      foreach ($bio as $item) { //foreach element in bio array
      ?>
        <!-- begin bio panel item -->
        <div class="bio_list">
          <div class="bio_panel">
            <a href="details.php?=<?= $item->url;?>">
              <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12">
                  <button class="bio_icon_btn"><i class="bi <?= $item->icon; ?>"></i></button>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-8 col-xs-12">
                  <h3 class="bio_title"><?= $item->Title; ?></h3>
                  <p><?= $item->body; ?></p>
                  <div class="avatar">
                    <div class="avatar_img">
                      <img src="asset/img/avatars/<?= $item->avatar; ?>" alt="<?= $item->Written; ?> avatar">
                    </div>
                    <div class="avatar_info">
                      <span><?= $item->articles; ?> articles in this collection <br>Written by <span class="user"><?= $item->Written; ?></span></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- end bio panel item -->
      <?php } ?>

    </div>

  </section>


 <?php include('footer.php');?>
<!-- Custom js file-->
<script src="asset/js/index.js"> </script>

</body>

</html>