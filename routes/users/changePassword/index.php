<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.jpg">

    <title>Falcontrac</title>
    <link rel="stylesheet" href="../../../assets/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.css"> -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/widgets.css">
    <link href="../../../assets/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../../assets/css/daterangepicker.css" />
    <!-- site font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../assets/images/favicon.png">

</head>

<body>
    <?php
    require_once '../../../components/navbar.php';
    ?>



    <?php
    $MgtCompName = array(
        "Hotel XYZ" => array("", "", ""),
        "ABC Inc."  => array("", "", ""),
        "Sample Company"  => array("", "", "")
    );

    ?>

    <main class="pt-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header fw-bold text-center text-uppercase bg-light">Add New User</div>
                        <div class="card-body bg--primary">
                            <form name="" action="" method="get">


                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="pass" class="justify-content-start col-md-4 col-form-label text-md-right">Old Password </label>
                                    <div class="col-md-5 px-0">
                                        <input type="password" id="pass" class="form-control rounded-0 bg-light" name="oldPass" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="pass" class="justify-content-start col-md-4 col-form-label text-md-right">New Password </label>
                                    <div class="col-md-5 px-0">
                                        <input type="password" id="pass" class="form-control rounded-0 bg-light" name="newPass" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="confPass" class="justify-content-start col-md-4 col-form-label text-md-right"> Confirm Password : </label>
                                    <div class="col-md-5 px-0">
                                        <input type="password" id="confPass" class="form-control rounded-0 bg-light" name="confPass" required>
                                    </div>
                                </div>


                                <div class="col-md-5 mx-auto offset-md-4 text-center pt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save Company Details
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/myquery.js"></script>

</body>

</html>