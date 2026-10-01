<?php

include "connection.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is integer

    // Use prepared statement for security
    $stmt = $mysqli->prepare("DELETE FROM add_admin WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirect back with success message
            header("Location: manage_users.php?msg=deleted");
            exit();
        } else {
            // Redirect back with error message
            header("Location: manage_users.php?msg=error");
            exit();
        }

        $stmt->close();
    } else {
        header("Location: manage_users.php?msg=db_error");
        exit();
    }
} else {
    header("Location: manage_users.php?msg=no_id");
    exit();
}

$mysqli->close();
?>
