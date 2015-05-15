<?php
$firstName = $_POST['firstName'];
$food = $_POST['food'];
$output = "$firstName's favorite food is $food";
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<p>
    <?php echo "$output"; ?>
</p>

</body>
</html>