<?php include('dbcon.php'); ?>

<?php
if (isset($_GET['ID'])) {

    $id = mysqli_real_escape_string($connection, $_GET['ID']);

    $query = "DELETE FROM `student` WHERE `ID` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('Location:index.php?delete_msg=You have deleted the record');
        exit();
    }
}
?>
