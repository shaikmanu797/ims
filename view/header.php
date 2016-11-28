<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body::-webkit-scrollbar { width: 0 !important }
        body {
            margin:0;
        }

        .header {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed; /* Set the navbar to fixed position */
            top: 0; /* Position the navbar at the top of the page */
            width: 100%; /* Full width */
        }

        li {
            float: left;
        }

        th a {
            display: block;
            color: white;
            padding: 13px;
            text-decoration: none;
            font-size: 17px;
        }

        .main {
            border: 2px solid lightgrey;
            padding: 16px;
            margin: 100px;

        }

    </style>
    <title>IMS</title>
</head>
<body>
<table class="header">
    <thead>
    <th width="50%" align="left"><a href="#home" style="font-size: 20px;">Inventory Management System</a></th>
    <th width="20%" align="left"><a href="#news">News</a></th>
    <th width="20%" align="left"><a href="#contact">Contact</a></th>
    <th width="20%" align="right"><a href="logout.php">Logout!</a></th>
    </thead>
</table>
<div class="main">
