<?php require '../views/header.php'; ?>
    <div class="container p-2 my-2 ">

        <?php
        session_start();
        if(isset($_SESSION['create'])){
            ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['create'];
                unset($_SESSION['create']);
                ?>
            </div>
            <?php
        }
        ?>

        <header class="d-flex justify-content-between my-4">
            <h1>Add Student</h1>
            <div>
                <a href="../index.php" class="btn btn-primary text-white">Back</a>
            </div>
        </header>
        <form action="../process.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="name" required placeholder="Enter Student Name: ">
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="registration" required placeholder="Enter Student Registration: ">
            </div>
            <div class="form-element my-4">
                <label for="description" class="bg-secondary text-white">
                    <span>Select Student Class</span>
                    <select name="class" required>
                        <option value="">Choose option</option>
                        <option value="PHP">PHP</option>
                        <option value="PYTHON">PYTHON</option>
                        <option value="SQL">SQL</option>
                        <option value="JAVA">JAVA</option>
                        <option value="C++">C++</option>
                        <option value="JAVASCRIPT">JAVASCRIPT</option>
                    </select>
                </label>
            </div>
            <div class="form-element my-4">
                <label for="description" class="bg-secondary text-white">
                    <span>Select Student Grade</span>
                    <select name="grade" required>
                        <option value="">Choose option</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                    </select>
                </label>
            </div>
            <div class="form-element my-4">
                <input type="submit" class="btn btn-success" name="create" value="Add Student">
            </div>
        </form>
    </div>
<?php require '../views/footer.php';?>