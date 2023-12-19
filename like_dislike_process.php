<?php
include "config.php";
session_start();
include "css.php";

if (!isset($_SESSION['logins'])) {
    echo "<h1 class='alert_h1'> You are not logged in </h1>";
    exit;
}

if (isset($_GET['like']) || isset($_GET['dislike'])) {
    $action = (isset($_GET['like'])) ? 1 : 0; // 1 for like, 0 for dislike

    $userActionStmt = mysqli_prepare($conn, "SELECT * FROM like_dislike_table WHERE user_id = ? AND product_id = ?");
    $userActionStmt->bind_param("ii", $_SESSION['logins'], $_GET['pro_id']);
    $userActionStmt->execute();
    $userActionResult = $userActionStmt->get_result();

    if ($userActionResult->num_rows > 0) {
        // User has already liked or disliked
        $row = $userActionResult->fetch_assoc();
        $existingAction = $row['is_like'];

        // If the existing action is the opposite of the current action, update the record
        if ($existingAction != $action) {
            $updateStmt = mysqli_prepare($conn, "UPDATE like_dislike_table SET is_like = ? WHERE user_id = ? AND product_id = ?");
            $updateStmt->bind_param("iii", $action, $_SESSION['logins'], $_GET['pro_id']);
            if($updateStmt->execute()) {
                echo "<script> window.location.href='index.php'; </script>";
            }
        } else {
            // If the existing action is the same as the current action, delete the record
            $deleteStmt = mysqli_prepare($conn, "DELETE FROM like_dislike_table WHERE user_id = ? AND product_id = ?");
            $deleteStmt->bind_param("ii", $_SESSION['logins'], $_GET['pro_id']);
            if($deleteStmt->execute()) {
                echo "<script> window.location.href='index.php'; </script>";
            }
        }
    } else {
        // User has not liked or disliked, so insert the record
        $insertStmt = mysqli_prepare($conn, "INSERT INTO like_dislike_table (user_id, product_id, is_like) VALUES (?, ?, ?)");
        $insertStmt->bind_param("iii", $_SESSION['logins'], $_GET['pro_id'], $action);
        if($insertStmt->execute()) {
            echo "<script> window.location.href='index.php'; </script>";
        }
    }

    // Close prepared statements
    $userActionStmt->close();
    if (isset($updateStmt)) $updateStmt->close();
    if (isset($deleteStmt)) $deleteStmt->close();
    if (isset($insertStmt)) $insertStmt->close();
}
?>
