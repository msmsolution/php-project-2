<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .student-details {
            background: #f5f5f5;
            padding: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Student Details</h1>
        <div>
            <a href="../index.php" class="btn btn-primary text-white">Back</a>
        </div>
    </header>
    <div class="student-details mt-4 <?php require '../detail.css'; ?>">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                include('../routes/connect.php');
                $sql = "SELECT * FROM student WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                ?>
                <h2>Student Name</h2>
                <p><?php echo $row['name']; ?></p>
                <h2>Registration</h2>
                <p><?php echo $row['registration']; ?></p>
                <h2>Class</h2>
                <p><?php echo $row['class']; ?></p>
                <h2>Grade</h2>
                <p><?php echo $row['grade']; ?></p>
                <?php
            }
        ?>
    </div>
</div>
<?php require 'footer.php'; ?>