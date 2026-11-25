<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        .error {
            color: red;
            font-size: small;
        }
    </style>
</head>
<body>
<center>
<form method="POST" action="">
    <h1>Registration Form</h1>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Name">
    <br><br>
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" placeholder="phone">
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="email">
    <br><br>
    <label for="address">Address:</label>
    <textarea id="address" name="address" placeholder="address"></textarea>
    <br><br>
    <label for="qlf">Qualification:</label>
    <select id="qlf" name="qlf" >
        <option value="">Select a qualification</option>
        <option value="B">Bachelor's Degree</option>
        <option value="M">Master's Degree</option>
    </select>
    <br><br>
    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass" placeholder="password">
    <br><br>
    <label for="cpass">Confirm Password:</label>
    <input type="password" id="cpass" name="cpass" placeholder="confirm">
    <br><br>
    <button type="submit">Register</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $qlf = $_POST['qlf'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $cpass = $_POST['cpass'] ?? '';
    $address = $_POST['address'] ?? '';
    $errors = [];
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }
    if (empty($phone)) {
        $errors['phone'] = "Phone is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required";
    }
    if (empty($qlf)) {
        $errors['qlf'] = "Qualification is required";
    }
    if (empty($address)) {
        $errors['address'] = "Address is required";
    }
    if (empty($pass)) {
        $errors['pass'] = "Password is required";
    } 
    else if (strlen($pass) < 8) {
        $errors['pass'] = "Password must be at least 8 characters";
    } 
    else if ($pass != $cpass) {
        $errors['cpass'] = "Passwords do not match";
    }
    if (!empty($errors)) {
        foreach ($errors as $failed => $message) {
            echo "<p class='error'>$message</p>";
        }
    } else {
        echo "<script>alert('Registration successful!');</script>";
    }
}
?>
</center>
</body>
</html>
