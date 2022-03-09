<?php
require_once 'sys.php';

$sys = new system();
if (isset($_POST['submit'])) {
    $sys->getLogos("2");

    echo "</br><img src='$sys->mainPageLogo' />";
    echo "</br><img src='$sys->reportHeaderLogo' />";
}

    $sys->getLogos("1");
    echo "</br><img src='$sys->mainPageLogo' width=200 height = 300 />";
    echo "<img src='$sys->reportHeaderLogo' width=200 height = 300 />";

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