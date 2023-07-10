<?php require '../views/header.php'; ?>
<div class="container p-3 my-3">
    <?php
        session_start();
        if(isset($_SESSION['edit'])){
            ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['edit'];
                unset($_SESSION['edit']);
                ?>
            </div>
            <?php
        }
    ?>
    <header class="d-flex justify-content-between my-4">
        <h1>Edit Student</h1>
        <div>
            <a href="../index.php" class="btn btn-primary text-white">Back</a>
        </div>
    </header>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include('../routes/connect.php');
        $sql = "SELECT * FROM student WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>
        <form action="../process.php" method="post">
            <?php require '../process.php'; ?>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="name" required value="<?php echo $row['name']; ?>" placeholder="Enter Student Name: ">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="registration" required value="<?php echo $row['registration']; ?>" placeholder="Enter Student Registration: ">
            </div>
            <div class="form-element my-4">
                <label for="description" class="bg-secondary text-white">
                    <span>Select Student Class</span>
                    <select name="class" required>
                        <option value=""></option>
                        <option value="PHP" <?php if($row['class'] == 'PHP') {echo 'Selected';}?>>PHP</option>
                        <option value="PYTHON" <?php if($row['class'] == 'PYTHON') {echo 'Selected';}?>>PYTHON</option>
                        <option value="SQL" <?php if($row['class'] == 'SQL') {echo 'Selected';}?>>SQL</option>
                        <option value="JAVA" <?php if($row['class'] == 'JAVA') {echo 'Selected';}?>>JAVA</option>
                        <option value="C++" <?php if($row['class'] == 'C++') {echo 'Selected';}?>>C++</option>
                        <option value="JAVASCRIPT" <?php if($row['class'] == 'JAVASCRIPT') {echo 'Selected';}?>>JAVASCRIPT</option>
                    </select>
                </label>
            </div>
            <div class="form-element my-4">
                <label for="description" class="bg-secondary text-white">
                    <span>Select Student Grade</span>
                    <select name="grade" required>
                        <option value=""></option>
                        <option value="A" <?php if($row['grade'] == 'A') {echo 'Selected';}?>>A</option>
                        <option value="B" <?php if($row['grade'] == 'B') {echo 'Selected';}?>>B</option>
                        <option value="C" <?php if($row['grade'] == 'C') {echo 'Selected';}?>>C</option>
                        <option value="D" <?php if($row['grade'] == 'D') {echo 'Selected';}?>>D</option>
                        <option value="E" <?php if($row['grade'] == 'E') {echo 'Selected';}?>>E</option>
                        <option value="F" <?php if($row['grade'] == 'F') {echo 'Selected';}?>>F</option>
                    </select>
                </label>
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="form-element my-4">
                <input type="submit" class="btn btn-success" name="edit" value="Edit Student">
            </div>
        </form>
        <?php
    }
    ?>

</div>
<?php require '../views/footer.php';?>
