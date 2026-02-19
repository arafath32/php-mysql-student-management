<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
$row = null; // IMPORTANT

if (isset($_GET['ID'])) {
    $id = mysqli_real_escape_string($connection, $_GET['ID']);

    $query = "SELECT * FROM student WHERE ID = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

	<?php
		if (isset($_POST['update_students'])) {
			if(isset($_GET['id_new'])){
				$idnew = $_GET['id_new'];
			}




			$fname = $_POST['f_name'];
			$lname = $_POST['l_name'];
			$age = $_POST['age'];

			$query = "UPDATE `student`
            SET `First_name` = '$fname',
              `Last_name` = '$lname',
              `Age` = '$age'
            WHERE `ID` = '$idnew'";


			$result = mysqli_query($connection, $query);

		    if (!$result) {
		        die("Query Failed: " . mysqli_error($connection));
		    }

		    else{
		    	header('Location:index.php?update_msg=You have successfully updateed the data.');
		    }

			
		}
		?>




<form action="update_page_1.php?id_new=<?php echo $id; ?>"  method="POST">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="f_name" class="form-control"
               value="<?php echo isset($row['First_name']) ? $row['First_name'] : ''; ?>">
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="l_name" class="form-control"
               value="<?php echo isset($row['Last_name']) ? $row['Last_name'] : ''; ?>">
    </div>

    <div class="form-group">
        <label>Age</label>
        <input type="text" name="age" class="form-control"
               value="<?php echo isset($row['Age']) ? $row['Age'] : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">

</form>

<?php include('footer.php'); ?>
