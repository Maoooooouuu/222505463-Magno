<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id=$id"; // Changed table to 'students'
    if ($conn->query($sql) === TRUE) {
        echo "Student successfully deleted."; // Updated message
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

echo "<script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 1000);
      </script>";
?>
