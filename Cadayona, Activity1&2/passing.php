<?php 

//PASSING THE DATA FROM HTML TO PHP AND STORE IT IN VARIABLES
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
  }
?>