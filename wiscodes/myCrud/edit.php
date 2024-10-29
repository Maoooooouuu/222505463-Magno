<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id=$id"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $age = $row['age'];
        $gender = $row['gender'];
    } else {
        echo "No student found with that ID.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];

    if (!empty($name) && !empty($age) && !empty($gender)) {
        $sql = "UPDATE students SET name='$name', age='$age', gender='$gender' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Student information successfully updated.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef; /* Light gray background */
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #343a40; /* Dark gray color for headings */
            text-align: center; /* Center align headings */
        }

        input[type="text"],
        input[type="number"],
        select {
            width: calc(100% - 12px); /* 100% width minus padding */
            padding: 10px; /* More padding for inputs */
            margin: 4px 0;
            border: 1px solid #ced4da; /* Light gray border */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #28a745; /* Green background */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px; /* Increased font size for better readability */
        }

        input[type="submit"]:hover {
            background-color: #218838; /* Darker green on hover */
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007BFF; /* Blue color for links */
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Edit Student</h2>

    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required><br><br>
        Age: <input type="number" name="age" value="<?php echo htmlspecialchars($age); ?>" required><br><br>
        Gender: 
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?php echo ($gender == 'Other') ? 'selected' : ''; ?>>Other</option>
        </select><br><br>
        <input type="submit" value="Update Student">
    </form>

    <a href="index.php">Back to Student Registration</a>
</body>
</html>
