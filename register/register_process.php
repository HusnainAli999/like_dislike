<?php
include "../config.php";
include "../css.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt = mysqli_prepare($conn, "INSERT INTO registration_table (name, email, password)  VALUES (?, ?, ?) ");
    $stmt->bind_param("sss", $_POST['name'], $_POST['email'], $password);
    if ($stmt->execute()) {
        echo "<h1 class='alert_h1'> Data Inserted Succesfully You Register Succesfully
        <script>
        setTimeout(function() {
          window.location.href='../login.php';
        }, 3000);
      </script>
        </h1>";
    } else {
        echo "<h1 class='alert_h1'>Failed to register /h1>";
        exit;
    }
}
