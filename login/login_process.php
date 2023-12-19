<?php
include "../config.php";
session_start();
include "../css.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = mysqli_prepare($conn, "SELECT * FROM registration_table WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['logins'] = $row['id'];
            $_SESSION['logins_name'] = $row['name'];
            echo "<h1 class='alert_h1'> You are logged in successfully
            <script>
              setTimeout(function() {
                window.location.href='../index.php';
              }, 3000);
            </script>
            </h1>";
            
        } else {
            echo "<h1 class='alert_h1'> Password incorrect </h1>";
            exit;
        }
    } else {
        echo "<h1 class='alert_h1'> Email incorrect </h1>";
        exit;
    }
}
