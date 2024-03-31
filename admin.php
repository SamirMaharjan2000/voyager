<?php
require ("db_connect.php");
?>
<html>
<head>
<title>HTML_NEW</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<div class="login-form">
    <h2>ADMIN LOGIN</h2>
    <form method="POST">
        <div class="input-field">
            <i class="bi bi-person-circle"></i>
            <input type="text" placeholder="Username" name="AdminName">
        </div>
        <div class="input-field">
            <i class="bi bi-shield-lock"></i>
            <input type="password" placeholder="Password" name="AdminPassword">
        </div>
        
        <button type="submit" name="Signin">Sign In</button>

    </form>
</div>

</body>
</html>
<?php
if(isset($_POST['Signin']))
{
  $query="SELECT * FROM `admin_login` WHERE `username`='$_POST[AdminName]' AND `password`='$_POST[AdminPassword]'";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==1)
  {
    session_start();
    $_SESSION['AdminLoginId']=$_POST['AdminName'];
    header("location:dash.php");
  }
  else
  {
    echo "<script>alert('Incorrect Password');</script>";
  }
}
?>
  </body>
</html>