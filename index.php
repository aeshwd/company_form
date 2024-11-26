<?php
$insert = false;

if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "first";

    // Establish connection
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection failed due to: " . mysqli_connect_error());
    }

    // Prepare and bind parameters to prevent SQL injection
    $sql = $con->prepare("INSERT INTO `aeshcompany` (`name`, `email`, `phone`, `date`) VALUES (?, ?, ?, current_timestamp())");
    $sql->bind_param("sss", $name, $email, $phone);

    // Assign user inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Execute and check for success
    if ($sql->execute()) {
        $insert = true;
        echo "<script>alert('Thanks for submitting the form. We are happy to call you.');</script>";
    } else {
        echo "ERROR: " . $sql->error;
    }

    // Close the statement and connection
    $sql->close();
    $con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="set.jpg" class="bg" alt="Background">
    <div class="container">
        <h1>Welcome to Aesh Goswami Software Company</h1>
        <h3>Fill this form to reach out to us.</h3>
        

        <form action="index.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" pattern="[0-9]{10}" required>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>
</body>
<script src="script.js"></script>

<script>
function validateForm() {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();

        const nameRegex = /^[a-zA-Z ]{3,50}$/;
        const phoneRegex = /^[0-9]{10}$/;

        if (!nameRegex.test(name)) {
            alert("Invalid name. Please use only letters and spaces (3-50 characters).");
            return false;
        }

        if (!email.includes('@') || !email.includes('.') || email.length < 5) {
            alert("Invalid email format. Please enter a valid email address.");
            return false;
        }

        if (!phoneRegex.test(phone)) {
            alert("Invalid phone number. Please enter a 10-digit number.");
            return false;
        }

        return true;
    }
</script>
</script>
</html>
