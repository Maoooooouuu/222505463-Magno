<?php
include "db.php";
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff; /* White background for table */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Slight shadow for table */
        }

        table, th, td {
            border: 1px solid #dee2e6; /* Light gray border */
        }

        th, td {
            padding: 12px; /* More padding for better spacing */
            text-align: left;
        }

        th {
            background-color: #007BFF; /* Blue background for headers */
            color: white; /* White text color for headers */
        }

        tr:nth-child(even) {
            background-color: #f8f9fa; /* Slightly darker background for even rows */
        }

        tr:hover {
            background-color: #f1f1f1; /* Light hover effect */
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
    <h2>Student Registration</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No Students</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="add.php">Add New Student</a>
</body>
</html>
