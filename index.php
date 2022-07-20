<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/styles/styles.css">
    <title>Falcontrac</title>
    <!-- Application icon-->
    <link rel="icon" href="../assets/images/favicon.png">




</head>


<body>
    <!-- navbar start   -->
    <div class="container py-4">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <img src="assets/images/logo.png" alt="">
            </div>
            <ul class="nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">test</a>
                </li> -->
                <li class="nav-item">
                    <button type="button" value="Login" class="btn btn-primary"  onclick="window.location = 'help/' "> Help</button>
                </li>

            </ul>
        </div>
        <!-- navbar end   -->



        <!-- login form start  -->
        <div class="d-flex justify-content-center pt-5">
            <!-- --------------------------------------------formm------------------------------------- -->
            <form class="bg-light p-5 rounded shadow w-50" method="POST">
                <h1 class="text-center login-text">Login</h1>
                <br>
                <input type="radio" name="rr" value="Admin">
                  <label for="Admin">Admin</label>
                  <input type="radio" name="rr" value="custommer">
                  <label for="custommer">Custommer</label><br>
                <div class="mb-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                        <input type="text" class="form-control" placeholder="Username" name="userName" id="userName">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">***</span>
                        <input type="password" class="form-control" placeholder="password" name="password" id="password">
                    </div>
                    <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                    <div class="text-center m-1">


                    </div>

                </div>
                <div class="mb-3 forget-password">
                    <p data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot your passwoed ?</p>

                </div>
                <button type="submit" name="submit" class="btn btn-primary"">Submit</button>
            </form>
        </div>
    </div>
    <!-- login form end  -->


   

    <!-- login form end --->


    <!-- resetmodal -->
  

    

</body>

</html>