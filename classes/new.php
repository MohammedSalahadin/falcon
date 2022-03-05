<?php
require_once 'sys.php';

$sys = new system();
if (isset($_POST['submit'])) {
    $sys->addLogos();

    echo "</br></br></br>Main Page logo URL: ".$sys->mainPageLogo;
    echo "</br></br></br>Report Header Page logo URL: ".$sys->mainPageLogo;
}

?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload: 
    </br>
  <input type="file" name="mainLogo" id="mainLogo" required />
  </br>
  <input type="file" name="reportHeaderLogo" id="reportHeaderLogo" required />
  </br>
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>