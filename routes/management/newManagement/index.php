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


    <main class="pt-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header fw-bold text-center text-uppercase bg-light">Add New Management Company <button class="btn btn-primary btn-addMgt">Show Me How</button></div>
                        <div class="card-body bg--primary">
                            <form name="" action="" method="post">
                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="companyName" class="justify-content-start col-md-4 col-form-label text-md-right">Company Name</label>
                                    <div class="col-md-8 px-0">
                                        <input type="text" id="full_name" class="form-control rounded-0 bg-light" name="companyName">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="url" class="col-md-4 col-form-label text-md-right">Web Address</label>
                                    <div class="col-md-8 px-0">
                                        <input type="text" id="url" class="form-control rounded-0 bg-light" name="url">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="comment" class="col-md-4 col-form-label text-md-right">Notes</label>
                                    <div class="col-md-8 px-0">
                                        <textarea class="form-control rounded-0 bg-light" name="comment" placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="streetNumber" class="col-md-4 col-form-label text-md-right">Street Number</label>
                                    <div class="col-md-8 px-0">
                                        <input type="text" id="streetNumber" class="form-control rounded-0 bg-light" name="streetNumber">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="street_name" class="col-md-4 col-form-label text-md-right">Street Name</label>
                                    <div class="col-md-8 px-0">
                                        <input type="text" id="street_name" class="form-control rounded-0 bg-light">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="streetType" class="col-md-4 col-form-label text-md-right">Street Type</label>
                                    <div class="col-md-8 px-0">
                                        <select class="form-select bg-light">
                                            <option selected></option>
                                            <option value="a">AA</option>
                                            <option value="b">AB</option>
                                            <option value="c">AC</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="cityStateZip" class="col-md-4 col-form-label text-md-right">City, State, Zip</label>
                                    <div class="col-md-8 px-0">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control rounded-0 bg-light" id="inputCity" name="inputCity">
                                            </div>
                                            <div class="col">
                                                <select class="form-select bg-light" id="state" name="state">
                                                    <option value=""></option>
                                                    <option value="AL">AL</option>
                                                    <option value="AK">AK</option>
                                                    <option value="AR">AR</option>
                                                    <option value="AZ">AZ</option>
                                                    <option value="CA">CA</option>
                                                    <option value="CO">CO</option>
                                                    <option value="CT">CT</option>
                                                    <option value="DC">DC</option>
                                                    <option value="DE">DE</option>
                                                    <option value="FL">FL</option>
                                                    <option value="GA">GA</option>
                                                    <option value="HI">HI</option>
                                                    <option value="IA">IA</option>
                                                    <option value="ID">ID</option>
                                                    <option value="IL">IL</option>
                                                    <option value="IN">IN</option>
                                                    <option value="KS">KS</option>
                                                    <option value="KY">KY</option>
                                                    <option value="LA">LA</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MD">MD</option>
                                                    <option value="ME">ME</option>
                                                    <option value="MI">MI</option>
                                                    <option value="MN">MN</option>
                                                    <option value="MO">MO</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MT">MT</option>
                                                    <option value="NC">NC</option>
                                                    <option value="NE">NE</option>
                                                    <option value="NH">NH</option>
                                                    <option value="NJ">NJ</option>
                                                    <option value="NM">NM</option>
                                                    <option value="NV">NV</option>
                                                    <option value="NY">NY</option>
                                                    <option value="ND">ND</option>
                                                    <option value="OH">OH</option>
                                                    <option value="OK">OK</option>
                                                    <option value="OR">OR</option>
                                                    <option value="PA">PA</option>
                                                    <option value="RI">RI</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SD">SD</option>
                                                    <option value="TN">TN</option>
                                                    <option value="TX">TX</option>
                                                    <option value="UT">UT</option>
                                                    <option value="VT">VT</option>
                                                    <option value="VA">VA</option>
                                                    <option value="WA">WA</option>
                                                    <option value="WI">WI</option>
                                                    <option value="WV">WV</option>
                                                    <option value="WY">WY</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control rounded-0 bg-light" id="inputZip" name="inputZip">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center px-4 my-2">
                                    <label for="buildingNumber" class="col-md-4 col-form-label text-md-right">Building Number</label>
                                    <div class="col-md-8 px-0">
                                        <input type="text" id="buildingNumber" class="form-control rounded-0 bg-light" name="buildingNumber">
                                    </div>
                                </div>

                                <div class="form-group row px-4 my-2">
                                    <label for="tel" class="col-md-4 col-form-label text-md-right">Main Phone</label>
                                    <div class="col-md-4 px-0">
                                        <input type="text" id="tel" class="form-control rounded-0 bg-light" name="tel">
                                    </div>
                                </div>

                                <div class="form-group row px-4 my-2">
                                    <label for="fax" class="col-md-4 col-form-label text-md-right">Fax</label>
                                    <div class="col-md-4 px-0">
                                        <input type="text" id="fax" class="form-control rounded-0 bg-light" name="fax">
                                    </div>
                                </div>



                                <div class="col-md-8 mx-auto offset-md-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Add New Management Company
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>