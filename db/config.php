<?php
    $db_con = new mysqli("localhost", "khayrul", "Password", "student_curd");

    // Student Registration
    function create($name, $email, $phone, $address, $department) {
        global $db_con;

        $commend = "INSERT INTO student(name, email, phone, address, department) VALUES('$name', '$email', '$phone', '$address', '$department')";
        $query = $db_con->query($commend);
        if ($query) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class="text-success">Congratulations!</strong> Student has successfully Registration.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class="text-danger">Failure!</strong> <?php echo $db_con->error ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
        
    }

    // Get All Student Details
    function index(){
        global $db_con;

        $commend = "SELECT * FROM student";
        $get_students = $db_con->query($commend);
        return $get_students;
    }

    // Student Edit
    function edit($id){
        global $db_con;
        $commend = "SELECT * FROM student WHERE id = '$id'";
        $student = $db_con->query($commend);
        return $student;
    }

     // Student Update
    function update($name, $email, $phone, $address, $department, $id) {
        global $db_con;

        $commend = "UPDATE student SET name='$name', email='$email', phone='$phone', department='$department', address='$address' WHERE id='$id'";
        $query = $db_con->query($commend);
        if ($query) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class="text-success">Congratulations!</strong> Student has successfully Updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class="text-danger">Failure!</strong> <?php echo $db_con->error ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
        
    }

    // Student Delete
    function destroy($id){
        global $db_con;
        $command="DELETE FROM student WHERE id='$id'";
        $query=$db_con->query($command);
        if ($query) {
            header("location: index.php");
        }
    }