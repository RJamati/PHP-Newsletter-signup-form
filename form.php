<?php
// DB Credentials
$user = "custom_user";
$password = "custom_pass1";
// MySQL DB Host URL
$host = "localhost.to.sql";
// DB Name and table to use
$dbase = "signupform";
$table = "emails";

// Connection to DB
$dbc= mysqli_connect($host, $user, $password, $dbase)
or die("Unable to connect to database");

// Form Post variable
$email = $_POST['email'];

// Process email to lowercase and trim whitespace
$email = strtolower(trim($email));

// Validate email and reject if invalid
if ($email && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email address, please go back and try again.');
}

// Begin connecting and posting to MySQL DB
$select = mysqli_query($dbc, "SELECT * FROM `emails` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($dbc));

// Checks if email already exists in DB and reject if so
if (mysqli_num_rows($select)) {
    exit('This email address has already been added.');
} else {
    // Save to DB if unique email entered
    $query= "INSERT INTO $table  ". "VALUES ('$email')";

    // Return error if unable to run query
    mysqli_query($dbc, $query)
    or die("Error querying database");

    // Successfully saved the email address to DB
    echo 'Your email address "' . $email . '" has been successfully added to the mailing list.';
}

// End connection to DB
mysqli_close($dbc);
