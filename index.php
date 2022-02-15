<?php
require("headerTAGS.php")
?>

<div class="container py-4">
    <div class="d-flex justify-content-between">
        <h1>Falcon</h1>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">test</a>
            </li>
        </ul>
    </div>
    <div class="d-flex justify-content-center pt-5">

        <form class="bg-light p-5 rounded shadow w-75" action="routes/monitor.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">username</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
require("footerTAGS.php")
?>