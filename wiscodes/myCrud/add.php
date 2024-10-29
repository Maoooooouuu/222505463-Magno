<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    if (!empty($name) && !empty($age) && !empty($gender)) {
        $sql = "INSERT INTO students (name, age, gender) VALUES ('$name', '$age', '$gender')";
        if ($conn->query($sql) === TRUE) {
            echo "New student added successfully!";
        } else {
            echo "Failed to add new student: " . $conn->error;
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
    <title>New Student</title>
    <style>
        /* Include the same CSS styles as in index.php */
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
    <h2>Add New Student</h2>

    <form method="post" action="add.php">
        Name: <input type="text" name="name" required><br><br>
        Age: <input type="number" name="age" required><br><br>
        Gender: 
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        <input type="submit" value="Add Student">
    </form>

    <a href="index.php">Back to Student Registration</a>
</body>
</html>
