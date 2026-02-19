<?php
include 'dbcon.php';

if (isset($_POST['add_student'])) {

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age   = $_POST['age'];

    if (empty($fname) || empty($lname) || empty($age)) {
        header("Location: index.php?message=All fields are required");
        exit();
    }

    $query = "INSERT INTO student (First_name, Last_name, Age)
              VALUES ('$fname', '$lname', '$age')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    }

    header("Location: index.php?insert_msg=Data added successfully");
    exit();
}
?>
