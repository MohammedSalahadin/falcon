<?php


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../assets/styles/styles.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/widgets.css">
    <link rel="icon" href="../../../assets/images/favicon.png">

    <title>Falcontrac</title>
</head>

<body>
    <?php require('../../../components/navbar.php') ?>

    <div class="container border">
        <div class="row justify-content-center p-2 border">
            <h4>Group Management</h4>
        </div>
        <div class="row m-2 justify-content-center">
            <span>Select Group To Edit</span>
        </div>
        <div class="row m-2 justify-content-center">
            <select class="form-select px-2 mx-2">
                <option value="group1">Select Property</option>
                <option value="group1">Group1</option>
                <option value="group2">Group2</option>
                <option value="group3">Group3</option>
                <option value="group4">Group4</option>
            </select>

            <button class="btn btn-primary">Add New Group</button>
        </div>
        <div class="row m-2 justify-content-center" id="groupInfo">
            <div class="m-2">
                <div class="p-3 border">
                    <div class="mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="property1" name="property1">
                        <label class="form-check-label" for="property1">
                            Property 1
                        </label>
                    </div>
                    <div class="mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="property2" name="property2">
                        <label class="form-check-label" for="property2">
                            Property 2
                        </label>
                    </div>
                  
                    
                </div>

                <input class="form-check-input" type="checkbox" value="" id="displayGroupInHandheld" name="displayGroupInHandheld">
                    <label class="form-check-label" for="displayGroupInHandheld">
                        Display Group In Handheld
                    </label></br>
                <button class="btn btn-primary">
                    Save Group Member List
                </button>
            </div>

            </div>

        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../../../assets/js/falcon.js"></script>
</body>

</html>