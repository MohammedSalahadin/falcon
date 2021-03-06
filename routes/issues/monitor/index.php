<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../assets/styles/styles.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/widgets.css">
    <link rel="icon" href="../../../assets/images/favicon.png">

    <title>Falcontrac</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <!-- Filter issues Script -->
     <script>
          $(document).ready(function(){
            $("#filter_issue").change(function() {
              var value = $(this).val().toLowerCase();
              $("#monitor_table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
    </script>
    <!-- Filter Property Name -->
    <script>
          $(document).ready(function(){
            $("#filter_property").change(function() {
              var value = $(this).val().toLowerCase();
              $("#monitor_table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
    </script>
    <!-- Filter issues Script -->
    <script>
          $(document).ready(function(){
            $("#filter_issue").change(function() {
              var value = $(this).val().toLowerCase();
              $("#monitor_table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
    </script>


</head>

<body>
    <?php require('../../../components/navbar.php') ?>

    <?php //require('../../components/menu.php') 
    ?>
    <div class="d-flex flex-row-reverse overflow-auto">

        <?php
        require('monitor-table/monitorMessageBox.php')
        ?>

        <div class="container">
            <div class=" p-1 rounded text-center mt-3 bg--primary">
                <h3 class="" style="color: gray;">ISSUE MONITOR</h3>
            </div>

            <?php
            require('monitor-table/monitorTable.php')
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../../../assets/js/falcon.js"></script>
</body>

</html>