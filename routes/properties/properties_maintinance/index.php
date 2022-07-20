<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="../../../assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="../../../assets/styles/styles.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/widgets.css">
    <link rel="icon" href="../../../assets/images/favicon.png">


    <title>Falcontrac</title>
</head>

<body>
    <?php require('../../../components/navbar.php') ?>

    <div class="container bg-light border ">
        <div class="row justify-content-center p-2">
            <h4>Property Maintinance</h4>
        </div>
        <div class="row justify-content-between p-2">
            <div class="">
                <input id="serachFilter" type="text" class="form-control rounded-0 px-5" placeholder="Serach for a property">
            </div>
            <div class="form-check align-left">
                <input class="form-check-input" type="checkbox" value="" id="includeInactiveProperties" name="includeInactiveProperties">
                <label class="form-check-label" for="includeInactiveProperties">
                    Include Inactive Properties
                </label>
            </div>
            <div class="form-check align-left">
                <input class="form-check-input" type="checkbox" value="" id="includeInactiveProperties" name="includeInactiveProperties">
                <label class="form-check-label" for="includeInactiveProperties">
                    Active Property
                </label>
            </div>
        </div>
        <div class="row p-2">
            <div clsss="col-4" style="width:25%">
                <!-- Properties List Container -->
                <div class=" mx-2 px-4 h-75  overflow-auto" style="background-color: #ebebeb;">
                    <div class="accordion py-2 " id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button px-4 btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#p1" aria-expanded="true" aria-controls="p1">
                                    Alpha
                                </button>
                            </h2>
                            <div id="p1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul style="list-style-type: none;">
                                        <li class="py-1"><button class="btn btn-outline-secondary  border-0">Addresses / Unites</button></li>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Alerts</button></li>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Attached Documents</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">CheckPoints</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">CheckPoints Tour</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Geofance </button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Issue Types</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Locations</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Parking Setup</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Phone Numbers</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Tasks</button>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button px-4 btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#p2" aria-expanded="true" aria-controls="p2">
                                    Beta
                                </button>
                            </h2>
                            <div id="p2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul style="list-style-type: none;">
                                        <li class="py-1"><button class="btn btn-outline-secondary  border-0">Addresses / Unites</button></li>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Alerts</button></li>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Attached Documents</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">CheckPoints</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">CheckPoints Tour</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Geofance </button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Issue Types</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Locations</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Parking Setup</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Phone Numbers</button>
                                        <li class="py-1"><button class="btn btn-outline-secondary border-0">Tasks</button>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>
                    </div>
                </div>
                <!-- Add Property Option -->
                <div class="p-1">
                    <button class="btn btn-primary">Add New Property</button>
                </div>
            </div>
            <div clsss="col-8 bg-light">
                <div class="row p-2">
                    <div class="col col-4">
                        <div class="">
                            Property Name</br>
                            <input class="form-control  " value="Test Property" name="propertyName" />
                        </div>
                        <div class="">
                            Web Address</br>
                            <input class="form-control " value="Test Property" name="propertyName" />
                        </div>
                        <div class="">
                            Management Company</br>
                            <input class="form-control " value="Test Property" name="propertyName" />
                        </div>
                        <div class="">
                            Primary Address</br>
                            <select class="form-select" name="primaryAddress">
                                <option> Choose </option>
                            </select>
                        </div>
                        <div class="form-select" name="billingAddress">
                            Billing Address</br>
                            <select>
                                <option> Choose </option>
                            </select>
                        </div>

                    </div>
                    <div class="col col-4">
                        <div class="">
                            Property Code</br>
                            <input class="form-control " value="Test Property" name="propertyName" />
                        </div>
                        <div class="">
                            Property Luck Status</br>
                            <button class="btn btn-dark"> Luck Property</button>
                        </div>
                        <div class="form-check align-left">
                            <input class="form-check-input" type="checkbox" value="" id="securityProgram" name="securityProgram">
                            <label class="form-check-label" for="securityProgram">
                                Security Program
                            </label>
                        </div>
                        <div class="form-check align-left">
                            <input class="form-check-input" type="checkbox" value="" id="maintinanceProgram" name="maintinanceProgram">
                            <label class="form-check-label" for="maintinanceProgram">
                                Maintinance Program
                            </label>
                        </div>
                        <div class="form-check align-left">
                            <input class="form-check-input" type="checkbox" value="" id="parkingProgram" name="parkingProgram">
                            <label class="form-check-label" for="parkingProgram">
                                Parking Program
                            </label>
                        </div>

                    </div>
                    <div class="col col-4">
                        <div class="">
                            <img src="../../../assets/images/user-avatar.jpg">
                        </div>
                        </br>
                        <div class="">
                            <button class="btn btn-primary">Add Photo</button>
                            <button class="btn btn-primary">Delete Photo</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        Property Notes/Post Orders </br>
                        <textarea class="col-12">

                        </textarea>
                    </div>
                    <div class="col-4">
                        In Custom Groups </br>
                        <textarea class="col-12">
                            group 1
                            group 2
                            group 3
                        </textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-primary">Save Property Details</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Table Model Start -->
    <div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" $('#user_modal').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Users Table Model end -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../../../assets/js/falcon.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Live Filteration for the properties Script -->
    <script>
        $(document).ready(function() {
            $("#serachFilter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".accordion .accordion-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <!-- Model Running function -->
    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#user_modal").modal('show');
            });
        });
    </script>

</body>

</html>