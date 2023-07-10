<?php
include('routes/connect.php');

//Check if add student button is clicked, then add student details to database
if(isset($_POST['create'])){
    //Using th mysqli escape string function in event of wrong user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $registration = mysqli_real_escape_string($conn, $_POST['registration']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);

    $sql="INSERT INTO student (name, registration, class, grade) VALUES ('$name', '$registration', '$class', '$grade')";

    //Check user registratin number if it exist
    $checkDuplicate = "SELECT registration FROM student WHERE registration = '$registration'  ";
    $result = mysqli_query($conn, $checkDuplicate);
    $count = mysqli_num_rows($result);

    // Validate and prevent double entry of student registion number
    if($count > 0 || $registration === strtolower($registration)){
        session_start();
        $_SESSION["create"] = 'Registration number already exist, no duplicates allowed!';
        header("Location: controllers/create.php");
    }else{
        if(mysqli_query($conn, $sql)){
            session_start();
            $_SESSION["create"] = 'Student added successfully';
            header("Location: index.php");
        }else{
            die("Something went wrong");
        }

    }

}
if(isset($_POST['edit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $registration = mysqli_real_escape_string($conn, $_POST['registration']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);

    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql="UPDATE student SET name = '$name', registration = '$registration', class = '$class', grade = '$grade' WHERE id=$id";

    //Check if registration edited is same as already in the database
    if($count > 0 && $registration === strtolower($registration)){
        session_start();
        $_SESSION["edit"] = 'Registration number already exist, no duplicates allowed!';
        header("Location: edit.php");
    }else {
        if(mysqli_query($conn, $sql)){
            session_start();
            $_SESSION["edit"] = 'Student updated successfully';
            header("Location: index.php");
        }else{
            die("Something went wrong");
        }
    }
}
