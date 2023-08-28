<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $sql = "INSERT INTO `login`.`login` (`name`, `phone`, `email`, `service`) VALUES ('$name', '$phone', '$email', '$service');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3 {
            color: #E1306C;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        input[type="text"],
        input[type="phone"],
        input[type="email"],
        select, /* Apply styles to the select element */
        textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            background-color: #E1306C;
            color: #fff;
            border-radius: 10px;
            font-size: 16px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #FF6B9B;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
        }

        .submitMsg {
            background-color: #E1306C;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.2;
        }
    </style>
</head>
<body>
    <img class="bg" src="bg.jpg" alt="VCE">
    <div class="container">
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for signing up. We will get back to you soon.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <select name="service" id="service">
                <option value="" disabled selected>Select a service</option>
                <option value="option1">Capital Needs and Trust Building</option>
                <option value="option2">Advertising and Global Access</option>
                <option value="option3">Financial Management and Education</option>
                <option value="option4">Legal Advisory</option>
            </select>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="app.js"></script>
</body>
</html>
