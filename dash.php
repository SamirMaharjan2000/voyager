<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dash.css">
    <title>Dashboard</title>
</head>
<body>
<?php 
  if(isset($_SESSION['status']))
  {
      ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php
      unset($_SESSION['status']);
  }
?>
        <div class="header">
            <h3>Admin Dashboard</h3>
            <form method="POST">
             <button name="Logout">Logout</button>
            </form>
        </div>

    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            </ul> 
        </div>
    <div class="form">
        <form action="sql.php" method="POST">
            <div class="row">
              
                <div class="col-25">
                  <label>Starting Date</label>
                </div>
                <div class="col-75">
                  <input type="date" name="StartingDate">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label>Ending Date</label>
                </div>
                <div class="col-75">
                  <input type="date" name="EndingDate">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label>Event-Title</label>
                </div>
                <div class="col-75">
                  <input type="text" placeholder="Enter the name of destination" name="ET">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label>Longitude</label>
                </div>
                <div class="col-75">
                  <input type="text" placeholder="Enter the longitude of the destination" name="long">
                </div>
              </div>
              
              <div class="row">
                <div class="col-25">
                  <label>Latitude</label>
                </div>
                <div class="col-75">
                  <input type="text" placeholder="Enter the latitude of the destination" name="lat">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label>Registered data date:</label>
                </div>
                <div class="col-75">
                  <input type="date" name="created">
                </div>
              </div>

              <div class="row">
                <div class="col-25">
                  <label>Description</label>
                </div>
                <div class="col-75">
                <input type="text" placeholder="Enter the description..." name="des">
                </div>
              </div>

              <!-- <div class="row">
                <button class="sus" type="submit">Submit</button>
              </div> -->
              <button class="my-button" name="save_date">Submit</button>
    </div>
    </div>
    <?php
    if(isset($_POST['Logout']))
    {
        session_destroy();
        header("location:admin.php");
    }
    ?>
</body>
</html>
