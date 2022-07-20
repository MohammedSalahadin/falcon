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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="css/owl.theme.default.css"> -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/widgets.css">
    <link href="../../../assets/css/select2.min.css" rel="stylesheet" />
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


    <main class="pt-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header fw-bold text-center text-uppercase bg-light">Edit Notifications</div>
                        <div class="card-body bg--primary">
                            <form name="" action="" method="get">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-primary" type="button">Choose User</button>
                                        <input name="userName" id="userName" type="text" />
                                    </div>
                                    
                                </div>
                                <hr />
                                <div class="row">
                                    <!-- First Col -->
                                    <div class="col col-9 border">
                                        <div class="container bg-light">
                                                <input class="form-control" id="myInput" type="text" placeholder="Search..">

                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Issue Type (All Properties)	</th>
                                                        <th>Never</th>
                                                        <th>Only Urgent	</th>
                                                        <th>Anytime</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    <tr>
                                                        <td>John</td>
                                                        <td>Doe</td>
                                                        <td>john@example.com</td>
                                                        <td>john@example.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mary</td>
                                                        <td>Moe</td>
                                                        <td>mary@mail.com</td>
                                                        <td>john@example.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>July</td>
                                                        <td>Dooley</td>
                                                        <td>july@greatstuff.com</td>
                                                        <td>john@example.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Anja</td>
                                                        <td>Ravendale</td>
                                                        <td>a_r@test.com</td>
                                                        <td>john@example.com</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
                                        </div>

                                        <script>
                                            $(document).ready(function() {
                                                $("#myInput").on("keyup", function() {
                                                    var value = $(this).val().toLowerCase();
                                                    $("#myTable tr").filter(function() {
                                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                    });
                                                });
                                            });
                                        </script>

                                    </div>

                                    <!-- Second Col -->
                                    <div class="col col-3 p-1 border px-2">

                                        <div class="form-group row justify-content-center px-1">
                                            <img src="../../../assets/images/user.png" style="max-width: 250px; border: 1px solid;" alt="User image">
                                        </div>
                                        <div class="form-group row justify-content-left pt-2">
                                            <input type="file" name="userAvatar">
                                            <input type="hidden" name="imageName" value="userAvatar">
                                        </div>
                                        <div class="form-group row justify-content-left pt-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="allowSecurityAssignments" name="allowSecurityAssignments">
                                                <label class="form-check-label" for="allowSecurityAssignments">
                                                    Allow Security Assignments
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="allowParkingAssignments" name="allowParkingAssignments">
                                                <label class="form-check-label" for="allowParkingAssignments">
                                                    Allow Parking Assignments
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="allowMaintinanceAssignments" name="allowMaintinanceAssignments">
                                                <label class="form-check-label" for="allowMaintinanceAssignments">
                                                    Allow Maintinance Assignments
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="allowUserToViewGPSData" name="allowUserToViewGPSData">
                                                <label class="form-check-label" for="allowUserToViewGPSData">
                                                    Allow User to View GPS data
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="allowEmails" name="allowEmails">
                                                <label class="form-check-label" for="allowEmails">
                                                    Allow Emails
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row pt-3 d-flex justify-content-center">
                                    <div class="col p-2">
                                        <button type="submit" class="col btn btn-primary d-flex justify-content-center">
                                            Save
                                        </button>
                                    </div>
                                    <div class="col p-2">
                                        <button type="submit" class="col btn btn-primary d-flex justify-content-center">
                                            Reset Password
                                        </button>
                                    </div>


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