<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <button name="Logout">Logout</button>
    </form>

    <?php
    if(isset($_POST['Logout']))
    {
        session_destroy();
        header("location:admin.php");
    }
    ?>
</body>
</html>