<?php

session_start();

#Conneting to database

$db = mysqli_connect('localhost', 'root', '', 'users_db');


$name = "";
$address = "";
$id = 0;
$update = false;


# Get all method

$results = mysqli_query($db, "SELECT * FROM users");


# Get by id method

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");



    if ( isset($record) ) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $address = $n['address'];
    }
}

# Save method

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];

    mysqli_query($db, "INSERT INTO users (name, address) VALUES ('$name', '$address')");
    $_SESSION['message'] = "User saved";
    header('location: index.php');
}

# Update method

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    mysqli_query($db, "UPDATE users SET name='$name', address='$address' WHERE id=$id");
    $_SESSION['message'] = "User updated";
    header('location: index.php');
}


# Delete method

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM users WHERE id=$id");
    $_SESSION['message'] = "User deleted";
    header('location: index.php');
}