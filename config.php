<?php
$conn = new mysqli("localhost", "root", "", "like_dislike_database");

if (!$conn) {
    echo "Connection failed";
    exit;
}
