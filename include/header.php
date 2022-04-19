<?php
session_start();

if (isset($_SESSION['user_username']))
    $session_user = $_SESSION["user_username"];
else
    $session_user = "";

$Header = <<< Head
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> Contact List </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="vh-100">
    <nav class="navbar navbar-light bg-dark px-2">
        <div class="container-fluid">
            <a class="navbar-brand text-white">Contacts list</a>
            <div class = "d-flex">
            <a href="authenticate.php" class="btn text-secondary $log">login</a>
            <a href="profile.php" class="btn text-secondary $display">$session_user</a>
            <a href="contact.php" class="btn text-secondary $display">Contacts</a>
            <a href="logout.php" class="btn text-secondary $display">logout</a>
            </div>
        </div>
    </nav>
Head;
echo $Header;
