<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['username'])) {
        echo "Authentication failed: no user is logged in.<br>";
        header("Location: index.html");
        exit();
    } else {
        echo "User is logged in as " . $_SESSION['username'] . ".<br>";
    }
}

function checkRole($role) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != $role) {
        echo "Role check failed: required role is $role but user role is " . $_SESSION['role'] . ".<br>";
        header("Location: index.html");
        exit();
    } else {
        echo "Role check passed: user role is " . $_SESSION['role'] . ".<br>";
    }
}
?>
