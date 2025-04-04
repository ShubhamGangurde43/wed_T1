

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>

    <h2>Registration Form</h2>
    <form method="post">
        <label>Roll No:</label>
        <input type="text" name="t1" required><br><br>
        
        <label>Name:</label>
        <input type="text" name="t2"><br><br>
        
        <label>Email:</label>
        <input type="email" name="t3"><br><br>
        
        <label>Mobile:</label>
        <input type="text" name="t4"><br><br>
        
        <label>Address:</label>
        <input type="text" name="t5"><br><br>
        
        <input type="submit" name="add" value="Add">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="view" value="View">
    </form>

    <?php
  
    $con = mysqli_connect("localhost", "root", "", "TYA");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    if (isset($_POST['add'])) {
        $roll_no = $_POST['t1'];
        $name = $_POST['t2'];
        $email = $_POST['t3'];
        $mob = $_POST['t4'];
        $address = $_POST['t5'];

        $sql = "INSERT INTO student (roll_no, name, email, mob, address) 
                VALUES ('$roll_no', '$name', '$email', '$mob', '$address')";

        if (mysqli_query($con, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

   
    if (isset($_POST['update'])) {
        $roll_no = $_POST['t1'];
        $name = $_POST['t2'];
        $email = $_POST['t3'];
        $mob = $_POST['t4'];
        $address = $_POST['t5'];

        $sql = "UPDATE student SET name='$name', email='$email', mob='$mob', address='$address' WHERE roll_no='$roll_no'";

        if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

  
    if (isset($_POST['delete'])) {
        $roll_no = $_POST['t1'];

        $sql = "DELETE FROM student WHERE roll_no='$roll_no'";

        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }


    if (isset($_POST['view'])) {
        $sql = "SELECT * FROM student";
        $rs = mysqli_query($con, $sql);

        echo "<h2>Student Records</h2>";
        echo "<table border=1>";
        echo "<tr><th>Roll No</th><th>Name</th><th>Email</th><th>Mobile No.</th><th>Address</th></tr>";

        if (mysqli_num_rows($rs) > 0) {
            while ($row = mysqli_fetch_assoc($rs)) {
                echo "<tr>";
                echo "<td>".$row['roll_no']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['mob']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }

        echo "</table>";
    }

    mysqli_close($con);
    ?>

</body>
</html>
