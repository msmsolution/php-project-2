<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include('../routes/connect.php');

        $sql = "DELETE FROM student WHERE id=$id";

        if(mysqli_query($conn, $sql)){
            session_start();
            $_SESSION["delete"] = 'Student deleted successfully';
            header("Location: ../index.php");
        }

    }
?>