<?php

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Execute the SELECT query and check for errors
    $sql = "SELECT * FROM contacts WHERE id=$id"; 
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
    } else {
        echo "No contacts found with that id";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];

    if (!empty($name) && !empty($phone)) {
        $sql = "UPDATE contacts SET name='$name', phone='$phone' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Contact Successfully Updated.";
        } else {
            echo "Error Editing Record: " . $conn->error;
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
    <title>Edit Contact</title>
</head>
<body>
    <h2>Edit Contact</h2>

    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        Name: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>"><br><br>
        Phone: <input type="text" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>"><br><br>
        <input type="submit" value="Update Contact">
    </form>

    <a href="index.php">Back to Phonebook</a>
</body>
</html>
