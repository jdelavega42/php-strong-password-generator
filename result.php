<?php session_start();
$my_password = $_SESSION['my_password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php if($my_password) { ?>
        <p>La password é <?php echo $my_password; ?></p>
    <?php } ?>
</body>
</html>
