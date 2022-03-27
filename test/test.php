<?php

if (isset($_POST['submit'])) {
    require_once '../classes/user.php';

    $id = $_POST['id'];

    $admin = new employee();
    

}


?>


<html>
<head>

</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <b>ID: </b><input type="text" name="id" value="" /></br>
        <b>Avatar: </b><input type="file" name="fileToUpload" id="fileToUpload"></br>
        <b></b><input type="submit" value="Upload Image" name="submit">
    </form>

</body>

</html>

