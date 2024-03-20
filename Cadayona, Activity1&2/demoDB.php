<?php
//This variable stores the hostname of mysql server.
$serverName = "localhost";

//This variable stores the username used to connect to the MySQL database.
$user = "root";

//This variable stores the pass used to connect to the MySQL database.
$pass = "";

//This variable stores the name of the database yo want to connect to within the MySQL server.
$databaseName = "demodb";

//Establishing the connection between php and your database
$conn = new mysqli($serverName, $user, $pass, $databaseName);

//Checking the connection if its successfully established or not
if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);

}
echo "Connection Established!";
?>

<?php 

//PASSING THE DATA FROM HTML TO PHP AND STORE IT IN VARIABLES
  if (isset($_POST['submit'])) {
   
    $first_name = $_POST['firstname'];

    $last_name = $_POST['lastname'];

    $age = $_POST['age'];

    $address = $_POST['address'];

    $contact = $_POST['contact'];

    $birthday = $_POST['birthday'];


//INSERT DATA TO DATABASE
    $sql = "INSERT INTO `dbtable`(`firstname`, `lastname`, `age`, `address`, `contact`, `birthday`) VALUES ('$first_name','$last_name','$age','$address','$contact','$birthday')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
<h2>Student Profile</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Student Information:</legend>

    Student ID:<br>

    <input id="id" type="text" name="id" value="Auto" readonly>

    <br>

    First name:<br>

    <input type="text" name="firstname">

    <br>

    Last name:<br>

    <input type="text" name="lastname">

    <br>

    Age:<br>

    <input type="number" name="age">

    <br>

    Address:<br>

    <input type="text" name="address">

    <br>

    Contact Number:<br>
    <input type="phone" name="contact"><br>

    Birthdate: <br>
    <input type="date" name="birthday">    
    <br>


    <input id="submit" type="submit" name="submit" value="submit">
 
  </fieldset>

</form>

<?php 


$sql = "SELECT * FROM dbtable";

$result = $conn->query($sql);

?>
<div class="container">

        <h2>STUDENT LIST</h2>

<table class="table">

    <thead>

        <tr>

        <th>STUDENT ID</th>

        <th>First Name</th>

        <th>Last Name</th>

        <th>Age</th>

        <th>Address</th>

        <th>Contact</th>

        <th>Birthday</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>
                        <td><?php echo $row['demo_id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['birthday']; ?></td>
                        <td>
                            <a class="btn btn-info" href="update.php?id=<?php echo $row['demo_id']; ?>">Edit</a>&nbsp;
                            <a class="btn btn-danger" name="delete" href="delete.php?id=<?php echo $row['demo_id']; ?>">Delete</a>
                        </td>
                    </tr>                       

        <?php       }
            }

        ?>                

    </tbody>

</table>




</body>
</html>