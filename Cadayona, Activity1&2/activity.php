<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  
    <title>Student Profile With BMI Calculator</title>
</head>

<body>
    <form method="POST">
        <div class="profile-container">
            <h2>STUDENT PROFILE</h2>
            <label>Name:</label>
            <input type="text" id="name" required="" name="name">
            <label>Age:</label>
            <input type="text" id="age" required="" name="age">
            <label>Address:</label>
            <input type="text" id="address" required="" name="address">
            <label>Contact Number:</label>
            <input type="tel" id="contactnumber" required="" name="contactnumber">
            <label>Birthdate:</label>
            <input type="date" id="birthdate" required="" name="birthdate">
            <label>Gender:</label>
            <select id="gender" name="gender">
                <option value="male" required="">Male</option>
                <option value="female" required="">Female</option>
            </select>
            <label>Blood Type:</label>
            <input type="text" id="bloodtype" required="" name="bloodtype">
            <label>Height (in meters):</label>
            <input type="number" step="0.01" id="height" name="height" required>
            <label>Weight (in kilograms):</label>
            <input type="number" id="weight" name="weight" required>
            <button type="submit" name="submit">CALCULATE BMI</button>
            <p id="bmi-result" name="bmi"></p>
        </div>
    </form>

<div class="container">

        <h2>STUDENT LIST</h2>

<table class="table">

    <thead>

        <tr>

        <th>STUDENT ID</th>

        <th> Name</th>

        <th>Age</th>

        <th>Address</th>

        <th>Contact Number</th>

        <th>Birthdate</th>
       
        <th>Gender</th>

        <th>BMI</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php
 include "connection1.php";
 include "passing.php";
 include "select.php";
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>
                        <td><?php echo $row['Student_ID']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Age']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Contact Number']; ?></td>
                        <td><?php echo $row['Birthdate']; ?></td>
                        <td><?php echo $row['Gender']; ?></td>
                        <td><?php echo $row['BMI']; ?></td>
                        <td>
                            <a class="btn btn-info" href="update.php?id=<?php echo $row['Student_ID']; ?>">Edit</a>&nbsp;
                            <a class="btn btn-danger" name="delete" href="delete.php?id=<?php echo $row['Student_ID']; ?>">Delete</a>
                        </td>
                    </tr>                       

        <?php       }
            }

        ?>                

    </tbody>

</table>



    <?php
    include "connection1.php";
    include "passing.php";
    include "select.php";
    if (isset($_POST['submit'])) {
    
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $contact = $_POST['contactnumber'];
        $birthday = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $blood = $_POST['bloodtype'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];

        $BMI = $weight / ($height * $height);

        $sql = "INSERT INTO `information_tb` (`name`, `age`, `address`, `contact`, `birthday`, `gender`, `blood`, `bmi`)
                VALUES ('$name', '$age', '$address', '$contact', '$birthday', '$gender', '$blood', '$BMI')";
        
        if (mysqli_query($conn, $sql)) {
            echo " ";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
    <?php 
 include "connection1.php";
 include "passing.php";
 include "select.php";
if (isset($_POST['update'])) {

    $id = $_POST['Student_ID'];

    $Name = $_POST['Name'];

    $Age = $_POST['Age'];

    $Address= $_POST['Address'];

    $ContactNumber = $_POST['Contact Number'];

    $Birthdate = $_POST['Birthdate'];

    $Gender = $_POST['Gender'];

    $BMI = $_POST['BMI'];

    $sql = "UPDATE `information_tb` SET `name`='$name',`Age`='$Age',`Address`='$Address',`Contact Number`='$ContactNumber',`Birthdate`='$Birthdate',`Gender`='$Gender' ,`BMI`='$BMI'WHERE `demo_id`='$id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {

        echo "Record updated successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

if (isset($_GET['id'])) {

$id = $_GET['id']; 

$sql = "SELECT * FROM `information_tb` WHERE `Student_ID`='$id'";

$result = $conn->query($sql); 

if ($result->num_rows > 0) {        

    while ($row = $result->fetch_assoc()) {
        $Name = $row['Name'];

        $Age = $row['Age'];
    
        $Address= $row['Address'];
    
        $ContactNumber = $row['Contact Number'];
    
        $Birthdate = $row['Birthdate'];
    
        $Gender = $row['Gender'];
    
        $BMI = $row['BMI'];
       
        $id = $row['Student_ID'];

    } 

?>

    <h2>Student Profile Update Form</h2>

    <form action="" method="post">

      <fieldset>

        <legend>Personal information:</legend>

        Name:<br>

        <input type="text" name="Name" value="<?php echo $Name; ?>">

        <input type="hidden" name="Student_ID" value="<?php echo $id; ?>">

        <br>

        Age:<br>

        <input type="text" name="Age" value="<?php echo $Age; ?>">

        <br>

        Address:<br>

        <input type="number" name="Address" value="<?php echo $Address; ?>">

        <br>

        Contact Number:<br>

        <input type="text" name=" Contact Number" value="<?php echo $ContactNumber; ?>">

        <br>
        Birthdate:<br>

        <input type="phone" name="Birthdate" value="<?php echo $Birthdate; ?>">

        <br>

        Gender:<br>

        <input type="date" name="Gender" value="<?php echo $Gender;?>">
        BMI:<br>

<input type="date" name="BMI" value="<?php echo $BMI;?>">

        
        <br><br>

        <input type="submit" value="Update" name="update">

      </fieldset>

    </form> 



</body>
</html>
<?php
} else { 

header('Location: activity.php');

} 
}
?> 
<?php 
 include "connection1.php";
 include "passing.php";
 include "select.php";
if (isset($_POST['delete'])) {

    $id = $_POST['Student_ID'];

    $sql = "DELETE FROM `information_tb` WHERE `Student_ID`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>
<?php
if (isset($_GET['id'])) {

$id = $_GET['id']; 

$sql = "SELECT * FROM `information_tb` WHERE `Student_ID`='$id'";

$result = $conn->query($sql); 

if ($result->num_rows > 0) {        

    while ($row = $result->fetch_assoc()) {
        $Name = $row['Name'];

        $Age = $row['Age'];
    
        $Address= $row['Address'];
    
        $ContactNumber = $row['Contact Number'];
    
        $Birthdate = $row['Birthdate'];
    
        $Gender = $row['Gender'];
    
        $BMI = $row['BMI'];
       
        $id = $row['Student_ID'];


    } 

?>

    <h2>Student Profile Delete Form</h2>

    <form action="" method="post">

    <fieldset>

        <legend>Personal information:</legend>

        Name:<br>

        <input type="text" name="Name" value="<?php echo $Name; ?>">

        <input type="hidden" name="Student_ID" value="<?php echo $id; ?>">

        <br>

        Age:<br>

        <input type="text" name="Age" value="<?php echo $Age; ?>">

        <br>

        Address:<br>

        <input type="number" name="Address" value="<?php echo $Address; ?>">

        <br>

        Contact Number:<br>

        <input type="text" name=" Contact Number" value="<?php echo $ContactNumber; ?>">

        <br>
        Birthdate:<br>

        <input type="phone" name="Birthdate" value="<?php echo $Birthdate; ?>">

        <br>

        Gender:<br>

        <input type="date" name="Gender" value="<?php echo $Gender;?>">
        BMI:<br>

<input type="date" name="BMI" value="<?php echo $BMI;?>">

        
        <br><br>

        <input type="submit" value="Update" name="update">

      </fieldset>

    </form> 


    </body>
    </html>
<?php
} else { 

    header('Location: demoDB.php');

} 
}
?> 
</body>

</html>