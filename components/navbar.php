<nav class="navbar navbar-light px-5 ">
    <div class="container-fluid">
        <a class="navbar-brand logo"><img src="../assets/images/logo.png" alt=""></a>
        <div>
            <div class="d-flex my-3">

                <button class="btn mx-3 rounded btn-primary ">
                    issue monitor
                </button>
                 <a href="../components/logout.php">
                     <button  class=" btn mx-3 rounded btn-primary">
                         logout
                     </button>

                 </a>
                <button class="btn mx-3 rounded btn-primary">
                    help
                </button>
            </div>
            <div class="LoggedinAdminName mx-3">
                <p>User:<?php echo $fullName; ?>
                <p>ID: <?php echo $id; ?> </p>
            </div>
        </div>
    </div>
</nav>