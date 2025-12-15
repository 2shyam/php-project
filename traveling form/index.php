<?php
$insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username="root";
    $password="";

    $con= mysqli_connect($server, $username, $password);

    if (!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "success connecting to the db";
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $desc = $_POST["desc"];

    $sql= "INSERT INTO `trip`.`mmdu` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql<br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Science+Gothic:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href ="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="MMDU">
    <div class="container">
       <h1> Welcome to MMDU Travel Form </h1>
       <p> Enter the Details and submit this form to Confirm your participation in the trip </p>
       <?php
       if($insert == true){
        echo "<p class='submittingMsg'> Thanks for submitting your form. We are happy to see you joining us for travling </p>";
       }
        ?>
       <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone">
            <textarea name='desc' id='desc' cols='30' rows='8' placeholder="enter any other information here"></textarea>
            <button class="btn">Submit</button>
        
        </form>            
    </div>
    <script src ="index.js"></script>
    
</body>
</html>
