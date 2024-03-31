<?php
session_start();
include_once('db_connect.php');

if(isset($_POST['save_date']))
{
    $eventtitle = $_POST['ET'];
    $longitude = $_POST['long'];
    $latitude = $_POST['lat'];
    $description = $_POST['des'];
    $sd = date('Y-m-d', strtotime($_POST['StartingDate']));
    $ed = date('Y-m-d', strtotime($_POST['EndingDate']));
    $rd = date('Y-m-d', strtotime($_POST['created']));

    $query = "INSERT INTO event (title,longitude,latitude,description,start_date,end_date,created) VALUES ('$eventtitle','$longitude','$latitude','$description','$sd','$ed','$rd')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Date values Inserted";
        header("Location: dash.php");
    }
    else
    {
        $_SESSION['status'] = "Date values Inserting Failed";
        header("Location: dash.php");
    }
}
?>