<?php
//Please create users database inside phpmysql admin and create userdetails tabel and create id, email and username fields
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "users";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//Add user
if(isset($_POST['myEmail']))
{
    $sql = "INSERT INTO userdetails (email, username)
        VALUES ('".$_POST['myEmail']."', '".$_POST['myUsername']."')";
    if (mysqli_query($conn,$sql)) {
    $data = array("data" => "You Data added successfully");
        echo json_encode($data);
    } else {
        $data = array("data" => "Error: " . $sql . "<br>" . $conn->error);
        echo json_encode($data);
        
    }
}
//Get single user details
elseif(isset($_POST['userid']))
{
    $trp = mysqli_query($conn, "SELECT * from userdetails where id =".$_POST['userid']);
    $rows = array();
    while($r = mysqli_fetch_assoc($trp)) {
        $rows[] = $r;
    }
    print json_encode($rows);
}
//Delete user
elseif(isset($_POST['deleteid']))
{
    $sql = mysqli_query($conn, "DELETE from userdetails where id =".$_POST['deleteid']);
    if ($sql) {
        
        $data = array("data" => "Record deleted successfully");
        echo json_encode($data);
      } else {
      
        $data = array("data" =>"Error deleting record: " . mysqli_error($conn));
        echo json_encode($data);
      }
}
//Update user
elseif(isset($_POST["updateid"]))
{
    $sql = "UPDATE userdetails SET email='".$_POST["updateEmail"]."', username='".$_POST["updateUsername"]."'  WHERE id=".$_POST["updateid"];
    if ($conn->query($sql) === TRUE) {
    
       $data = array("data" => "Record updated successfully");
        echo json_encode($data);
    } else {
    
    $data = array("data" => "Error updating record: " . $conn->error);
    echo json_encode($data);
    }
}
else
{
    //get all users details
    $trp = mysqli_query($conn, "SELECT * from userdetails");
    $rows = array();
    while($r = mysqli_fetch_assoc($trp)) {
        $rows[] = $r;
    }
    print json_encode($rows);
}
?>