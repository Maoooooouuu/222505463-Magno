<?php

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contacts WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Contact successfully deleted.";
    } else {
        echo "Error deleting record. " . $conn->error;
    }
}


echo "<script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 1000);
      </script>";

?>
