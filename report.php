<?php include 'views/header.php'; ?>
    <table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>Total registered Students</th>
        <th>Students with grade A</th>
        <th>Students with grade B</th>
        <th>Students with grade C</th>
        <th>Students with grade D</th>
        <th>Students with grade E</th>
        <th>Students with grade F</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include("routes/connect.php");
    $sql = "SELECT name FROM student";
    $result = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($result);

    $sql = "SELECT * FROM student WHERE grade = 'A' ";
    $grade = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($grade);

    $sql = "SELECT * FROM student WHERE grade = 'C' ";
    $grade2 = mysqli_query($conn, $sql);
    $count2 = mysqli_num_rows($grade2);

    $sql = "SELECT * FROM student WHERE grade = 'D' ";
    $grade3 = mysqli_query($conn, $sql);
    $count3 = mysqli_num_rows($grade3);

    $sql = "SELECT * FROM student WHERE grade = 'E' ";
    $grade4 = mysqli_query($conn, $sql);
    $count4 = mysqli_num_rows($grade4);

    $sql = "SELECT * FROM student WHERE grade = 'F' ";
    $grade5 = mysqli_query($conn, $sql);
    $count5 = mysqli_num_rows($grade5);

    $sql = "SELECT * FROM student WHERE grade = 'F' ";
    $grade6 = mysqli_query($conn, $sql);
    $count6 = mysqli_num_rows($grade6);
//    $sqlString = "SELECT count(*) AS cnt, grade FROM student GROUP BY grade";
//    $statistics = mysqli_query($conn, $sqlString);
//    $statisticsData = mysqli_fetch_all($statistics, MYSQLI_ASSOC);



//    $count = 0;
//    foreach (array($bestStudents) as $best){
//        if($bestStudents == 'A'){
//            $count += 1;
//        }
//    }
        ?>
        <tr>
            <td><?php echo $total; ?></td>
            <td><?php echo $count; ?></td>
            <td><?php echo $count2; ?></td>
            <td><?php echo $count3; ?></td>
            <td><?php echo $count4; ?></td>
            <td><?php echo $count5; ?></td>
            <td><?php echo $count6; ?></td>
        </tr>
        <?php

    ?>
    </tbody>
    </table>
    <div class="container text-center my-4">
        <h2><a href="index.php" class="btn btn-danger">close</a></h2>
    </div>

<?php include 'views/footer.php'; ?>