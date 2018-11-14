<?php
include('session.php');
//include('StorageAccess/listblobs.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $_SESSION['login_user']; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>

</div>
<div>
<?php
$img_string = '<img src = ';

$img_string = $img_string . $image_path;

$img_string = $img_string . '  border=0 width="50%" height="50%">';

 echo $img_string;
?>
</div>
</body>
</html>
