<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="../styles/mystyles.css">
  <link rel="icon" href="../../../assets/images/favicon.png">
  

  <title>Falcontrac</title>
</head>

<body>

  <?php require('../../../components/navbar.php') ?>

  <div class="d-flex flex-row-reverse overflow-auto">

    <div class="container">
      <div class="p-1 rounded text-center mt-3 bg--primary header1" id="device-head">
        <h3 class="main-header" id="main-head">DEVICE MAINTAINANCE - ACTIVE DEVICES </h3>
        <button class="save-button" id="import-btn3" type="button">Show Me How</button>
      </div>
      <?php
      require('device-table/deviceTable.php')
      ?>
    </div>
  </div>

  <script src="https://use.fontawesome.com/9608db71df.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../../../assets/js/bootstrap.js"></script>
  <script src="js/device.js"></script>
</body>

</html>