<?php
include "config.php";
session_start();
include "css.php";

if (!isset($_SESSION['logins'])) {
    echo "<script> window.location.href='login/login.html'; </script>";
    exit;
}

echo "<h2> Welcome [" . $_SESSION['logins_name'] . "] <a href='login/login.html'>Login</a> <a href='register/reister.html'>Register</a> </h2>";

$stmt = mysqli_prepare($conn, "SELECT * FROM sampe_products");
$stmt->execute();
$result = $stmt->get_result();

echo "<div class='handler_div'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='product_main_div'>";
    echo "<p> Product ID: " . $row['id'] . " </p>";
    echo "<p> Title: " . $row['title'] . " </p>";
    echo "<p> Price: " . $row['price'] . " </p>";
    echo "<div class='like_dislike_handler_main_div'>";

    $userLikeStmt = mysqli_prepare($conn, "SELECT * FROM like_dislike_table WHERE user_id = ? AND is_like = ? AND product_id = ?");
    $likeValue = 1;
    $userLikeStmt->bind_param("iii", $_SESSION['logins'], $likeValue, $row['id']);
    $userLikeStmt->execute();
    $userLikeResult = $userLikeStmt->get_result();

    if ($userLikeResult->num_rows > 0) {
        echo "<a href='like_dislike_process.php?like=1&pro_id=" . $row['id'] . "'> <img src='images/like.png' class='un_like'> </a>";
    } else {
        echo "<a href='like_dislike_process.php?like=1&pro_id=" . $row['id'] . "'> <img src='images/un_like.png' class='un_like'> </a>";
    }

    $userLikeStmt->close();


    $userDislike = mysqli_prepare($conn, "SELECT * FROM like_dislike_table WHERE user_id = ? AND is_like = ? AND product_id = ?");
    $dislikeValue = 0;
    $userDislike->bind_param("iii", $_SESSION['logins'], $dislikeValue, $row['id']);
    $userDislike->execute();
    $userDislikeResult = $userDislike->get_result();

    if (mysqli_num_rows($userDislikeResult) > 0) {
        echo "<a href='like_dislike_process.php?dislike=0&pro_id=" . $row['id'] . "'> <img src='images/disgusted.png' class='un_dislike'></a>";
    } else {
        echo "<a href='like_dislike_process.php?dislike=0&pro_id=" . $row['id'] . "'> <img src='images/un_dislike.png' class='un_dislike'></a>";
    }

    echo "</div>";
    echo "</div>";
}
echo "</div>";
