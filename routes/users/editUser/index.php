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
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header fw-bold text-center text-uppercase bg-light">Edit User</div>
                        <div class="card-body bg--primary">
                            <form name="" action="" method="get">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" name="user_name" required value="">
                                            
                                            <input type="hidden" name="userType" value="" >
                                            <div class="input-group-prepend mr-2">
                                                <button type="button" class="btn btn-danger" onclick="reset_user_input()">X</button>
                                            </div>
                                            <a data-toggle="modal" href="#user_modal" class="btn btn-primary">choose</a>
                                        </div>
                                    </div>
                                    <div class="col form-gourp d-flex justify-content-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <!-- First Col -->
                                    <div class="col col-4">
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="userName" class="justify-content-start  col-form-label text-md-right  py-0"> User Name:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="userName" class="form-control rounded-0 bg-light" name="userName" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="lastLoginDate" class="justify-content-start  col-form-label text-md-right  py-0"> Last Login Date:</label>
                                            <div class="col-md-10 px-0">
                                                <input disabled type="text" id="lastLoginDate" class="form-control rounded-0 bg-light" name="lastLoginDate" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="managementCompanyName" class="justify-content-start  col-form-label text-md-right  py-0">Management Company Name:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="managementCompanyName" class="form-control rounded-0 bg-light" name="managementCompanyName" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="firstName" class="justify-content-start  col-form-label text-md-right  py-0"> First Name:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="firstName" class="form-control rounded-0 bg-light" name="firstName" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="lastName" class="justify-content-start  col-form-label   text-md-right py-0"> Last Name:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="lastName" class="form-control rounded-0 bg-light" name="lastName" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="email" class="justify-content-start  col-form-label   text-md-right py-0"> Email Address:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="email" class="form-control rounded-0 bg-light" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="maintinanceEmail" class="justify-content-start  col-form-label   text-md-right py-0">Maintenance Email:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="maintinanceEmail" class="form-control rounded-0 bg-light" name="maintinanceEmail" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-left px-1  my-0">
                                            <label for="timeIDCard" class="justify-content-start  col-form-label   text-md-right py-0">Time ID Card:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="timeIDCard" class="form-control rounded-0 bg-light" name="timeIDCard" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Second Col -->
                                    <div class="col col-4">

                                        <div class="form-group row justify-content-left px-1">
                                            <label for="UserGroup" class="justify-content-start col-form-label   text-md-right py-0"> User Group:</label>
                                            <div class="col-md-10 px-0">
                                                <select class="form-select bg-light" name="UserGroup" id="UserGroup">
                                                    <option selected>Select Group</option>
                                                    <option value="c-pManager">Group 1</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-left px-1">
                                            <label for="securityRole" class="justify-content-start  col-form-label   text-md-right py-0">Security Role :</label>
                                            <div class="col-md-10 px-0">
                                                <select class="form-select bg-light" name="securityRole" id="securityRole">
                                                    <option selected>Select Role</option>
                                                    <option value="e-g">Employee Guard</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-left px-1">
                                            <label for="address" class="justify-content-start  col-form-label   text-md-right py-0"> Address:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="address" class="form-control rounded-0 bg-light" name="address" required>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-left px-1">
                                            <label for="cityStateZip" class="justify-content-start col-form-label   text-md-right py-0"> City State Zip:</label>
                                            <div class="px-0">
                                                <div class="row col-10" id="cityStateZip">
                                                    <div class="col col-4 ">
                                                        <input type="text" id="city" class="form-control rounded-0 bg-light" name="city" required>
                                                    </div>
                                                    <div class="col col-4 ">
                                                        <select class="form-select bg-light" name="state" id="state">
                                                            <option selected value="tx">TX</option>
                                                            <option value="ak">AK
                                                            <option>
                                                        </select>
                                                    </div>
                                                    <div class="col col-4">
                                                        <input type="text" id="zip" class="form-control rounded-0 bg-light" name="zip" required>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-left px-1">
                                            <label for="phoneNumber" class="justify-content-start  col-form-label   text-md-right py-0"> Phone Number:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="phoneNumber" class="form-control rounded-0 bg-light" name="phoneNumber" required>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-left px-1">
                                            <label for="cellNumber" class="justify-content-start  col-form-label   text-md-right py-0"> Cell Number:</label>
                                            <div class="col-md-10 px-0">
                                                <input type="text" id="cellNumber" class="form-control rounded-0 bg-light" name="cellNumber" required>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Theird Col -->
                                    <div class="col col-4">
                                        <div class="form-group row justify-content-center px-1">
                                            <img id="currentAvatar" src="../../../assets/images/user.png" style="max-width: 250px; border: 1px solid;" alt="User image">
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
                                        <button type="button" class="col btn btn-primary d-flex justify-content-center">
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

    <!-- User Modal -->
    <?php require_once '../../../components/selectModal.php'; ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     -->
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/js/bootstrap.js"></script>

    <script src="js/myquery.js"></script>

    <!-- list of users Script -->
    <script>

        // users original array
        const users_arr = [{
                id: 1,
                title: "ahmed magdi",
                user_type: "Guards",
                status: "active",
                image: "images/user-avatar.jpg",
                company: "none",
            },
            {
                id: 2,
                title: "Mohammed Omer",
                user_type: "Guards",
                status: "active",
                image: "images/1.png",
                company: "none",
            },
            {
                id: 3,
                title: "Kamal Ali",
                user_type: "Guards",
                status: "active",
                image: "images/2.png",
                company: "none",
            },
            {
                id: 4,
                title: "Rodwan samih",
                user_type: "admin",
                status: "active",
                image: "images/3.png",
                company: "none",
            },
            {
                id: 5,
                title: "Mahmoud khalil",
                user_type: "admin",
                status: "active",
                image: "images/4.png",
                company: "none",
            },
            {
                id: 6,
                title: "baraa eisa",
                user_type: "customer",
                status: "inactive",
                image: "images/user-avatar.jpg",
                company: "twitter",
            },
            {
                id: 7,
                title: "sami massik",
                user_type: "customer",
                status: "active",
                image: "images/4.png",
                company: "twitter",
            },
            {
                id: 8,
                title: "rwda gadir",
                user_type: "dispatcher",
                status: "inactive",
                image: "images/3.png",
                company: "none",
            },
            {
                id: 9,
                title: "Mahmoud mohammed",
                user_type: "customer",
                status: "active",
                image: "images/2.png",
                company: "twitter",
            },
            {
                id: 10,
                title: "ahmed farah",
                user_type: "customer",
                status: "active",
                image: "images/2.png",
                company: "twitter",
            },
            {
                id: 11,
                title: "Kamal Ali",
                user_type: "customer",
                status: "active",
                image: "images/user-avatar.jpg",
                company: "facebook",
            },
            {
                id: 12,
                title: "Omer alghali",
                user_type: "customer",
                status: "active",
                image: "images/1.png",
                company: "facebook",
            },
            {
                id: 13,
                title: "magdi azez",
                user_type: "customer",
                status: "active",
                image: "images/2.png",
                company: "youtube",
            },
            {
                id: 14,
                title: "gadir ali",
                user_type: "customer",
                status: "inactive",
                image: "images/3.png",
                company: "youtube",
            },
        ];


        // empty array to store filtred array
        var filtred_array = [];

        // starting with push all array to the table
        this.push_to_table(users_arr);

        // keyup event when user input characters on user_name field
        $("input[name='user_name']").keyup(function() {
            var user_name = this.value;
            filterByName(user_name);
        });

        //store checked boxes in array , dispatch when user checked
        $("input[name='user_type']").change(function() {
            var userTypesSelected = [];
            $("input[name='user_type']:checked").each(function() {
                userTypesSelected.push($(this).val());
            });
            filterByUserType(userTypesSelected);
        });

        // management company
        $("select[name='company_management']").change(function() {
            var select_val = this.value;

            if (select_val === "") {
                $("input:checkbox[name=user_type]").each(function() {
                    $(this).prop('checked', false);
                });
                filtred_array.length = 0
                push_to_table(users_arr);
            } else {
                filterByCompany(select_val);
            }
        });

        function reset_userInfo(){
            $("input[name='user_name']").val(" ");
            $("input[name='lastLoginDate']").val(" ");
            $("input[name='managementCompanyName']").val(" ");
            $("input[name='firstName']").val(" ");
            $("input[name='lastName']").val(" ");
            $("input[name='email']").val(" ");
            $("input[name='maintinanceEmail']").val(" ");
            //select UserGroup
            //select securityRole
            $("input[name='address']").val(" ");
            $("input[name='city']").val(" ");
            //select state
            $("input[name='zip']").val(" ");
            $("input[name='phoneNumber']").val(" ");
            $("input[name='cellNumber']").val(" ");
            //$("#currentAvatar").val(userInfo['currentAvatar']); //Replace Src with default

            //checkbox allowSecurityAssignments
            //checkbox allowParkingAssignments
            //checkbox allowMaintinanceAssignments
            //checkbox allowUserToViewGPSData
            //checkbox allowEmails

        }

        function set_selected_userInfo(){
            //seperate 
            var id;
            var type;
            //send id and type to b-end Via AJAX Rquest and return user info


            var userInfo // array of user info
            $("input[name='user_name']").val(userInfo['userName']);
            $("input[name='lastLoginDate']").val(userInfo['lastLoginDate']);
            $("input[name='managementCompanyName']").val(userInfo['managementCompanyName']);
            $("input[name='firstName']").val(userInfo['firstName']);
            $("input[name='lastName']").val(userInfo['lastName']);
            $("input[name='email']").val(userInfo['email']);
            $("input[name='maintinanceEmail']").val(userInfo['maintinanceEmail']);
            //select UserGroup
            //select securityRole

            $("input[name='address']").val(userInfo['address']);
            $("input[name='city']").val(userInfo['city']);
            //select state
            $("input[name='zip']").val(userInfo['zip']);
            $("input[name='phoneNumber']").val(userInfo['phoneNumber']);
            $("input[name='cellNumber']").val(userInfo['cellNumber']);
            //$("#currentAvatar").val(userInfo['currentAvatar']); //Change Src to the path
            //checkbox allowSecurityAssignments
            //checkbox allowParkingAssignments
            //checkbox allowMaintinanceAssignments
            //checkbox allowUserToViewGPSData
            //checkbox allowEmails
        }

        // set selected user in user input
        function set_selected(param) {
            $("input[name='user_name']").val(param);
            set_selected_userInfo(param);
        }

        // reset user input
        function reset_user_input() {
            $("input[name='user_name']").val(" ");

        }

        // filter methods ...... start

        // 1- first method {filter by first / last / username}
        // - first check if filtred array is empty
        // - if filtred array empty , will filter in original array {users_arr}
        // - else will fillter in filtred array

        const filterByName = (query) => {
            if (filtred_array.length > 0) {
                var filtred_arr = filtred_array.filter(el => el.title.toLowerCase().indexOf(query.toLowerCase()) !== -
                    1);
            } else {
                var filtred_arr = users_arr.filter(el => el.title.toLowerCase().indexOf(query.toLowerCase()) !== -1);
            }

            return push_to_table(filtred_arr);;
        }


        // 2- second method {filter by user type / guards / dispatcher ...}
        // - first make filtred array empty !!;
        // - then filter the original array {users_arr}
        // - foreach to push element from {users_arr} to filtred array
        // - if any of checkbox not checked , it will return original array (users_arr)
        // - if checked any box will return filtred array

        const filterByUserType = (userTypesSelected) => {
            filtred_array.length = 0
            var getUserTypes = users_arr.filter(function(users) {
                return userTypesSelected.indexOf(users.user_type) > -1 || userTypesSelected.indexOf(users
                    .status) > -1;
            });
            getUserTypes.forEach(push_to_array);

            function push_to_array(item) {
                filtred_array.push(item);
            }

            if (filtred_array.length === 0) {
                this.push_to_table(users_arr);
            } else {
                this.push_to_table(filtred_array);
            }

            return filtred_array;
        }


        // 3- third method {filter by company / facebook / twitter ...}

        // - first make filtred array empty !!.
        // - then filter the original array {users_arr}.
        // - foreach to push element from {users_arr} to filtred array.
        // - get all checkbox values.
        // - first : pick the checkbox has customer value and checked.
        // - second : unchecked other checkbox.

        const filterByCompany = (query) => {
            filtred_array.length = 0;
            var filtred_arr = users_arr.filter(el => el.company.toLowerCase().indexOf(query.toLowerCase()) !== -1);
            filtred_arr.forEach(push_to_array);

            function push_to_array(item) {
                filtred_array.push(item);
            }
            $("input:checkbox[name=user_type]").each(function() {
                if ($(this).val() === "customer") {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            });
            return push_to_table(filtred_array);
        }


        // 4- forth method {push data to table}

        // - this method responsible from push data to users table.
        // - first make {tbody} in table empty.
        // - second get array , and push to the table by foreach.
        // - insertRow to add new {tr} html tag.
        // - insertCell to add new {td} html tag.
        // - innerHTML to html element between {td} element.

        function push_to_table(arr) {
            $("#testBody").html("");
            const table = document.getElementById("testBody");

            arr.forEach(users => {
                let row = table.insertRow();

                let id = row.insertCell(0);
                id.innerHTML = users.id;

                var image_tag = "<img src=" + users.image + " class='user-avatar'>";
                let image = row.insertCell(1);
                image.innerHTML = image_tag;

                let title = row.insertCell(2);
                title.innerHTML = users.title;

                let user_type = row.insertCell(3);
                user_type.innerHTML = users.user_type;

                let status = row.insertCell(4);
                status.innerHTML = users.status;

                let company = row.insertCell(5);
                company.innerHTML = users.company;

                var action_btn =
                    "<button class='btn btn-success btn-sm user_name_btn' data-dismiss='modal'  aria-label='Close'  onclick=\'set_selected(\"" +
                    users.id + ","+users.user_type +
                    "\")\'   ><i class='fa fa-check'></i></button>";
                let action = row.insertCell(6);
                action.innerHTML = action_btn;
            });
        }
    </script>

</body>

</html>