<?php require 'views/header.php';?>

<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Student List</h1>
        <div>
            <a href="report.php" class="btn btn-secondary text-white">View Report</a>
        </div>
        <div>
            <a href="controllers/create.php" class="btn btn-primary text-white">Add Student</a>
        </div>
    </header>
    <?php
        session_start();
        if(isset($_SESSION['create'])){
            ?>
            <div class="alert alert-success">
                <?php
                    echo $_SESSION['create'];
                    unset($_SESSION['create']);
                ?>
            </div>
            <?php
        }
    ?>
    <?php
    if(isset($_SESSION['edit'])){
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['edit'];
            unset($_SESSION['edit']);
            ?>
        </div>
        <?php
    }
    ?>
    <?php
    if(isset($_SESSION['delete'])){
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
            ?>
        </div>
        <?php
    }
    ?>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Registration</th>
                <th>Class</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include("routes/connect.php");
                $sql = "SELECT * FROM student";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['registration']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                            <td><?php echo $row['grade']; ?></td>
                            <td>
                                <a href="views/view.php?id=<?php echo $row['id'];?>" class="btn btn-info">View</a>
                                <a href="controllers/edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning">Update</a>
                                <a href="controllers/delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>

<?php require 'views/footer.php';?>
