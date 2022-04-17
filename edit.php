<?php   
    include "./includes/header.php";        
    include './db/config.php';
?>
<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header bg-secondary d-flex justify-content-between">
                    <h5 class="text-light text-uppercase m-0">Student Edit</h5>
                    <a href="index.php" class="btn btn-primary btn-sm">All Student</a>
                </div>
                <div class="card-body">
                    <?php
                            if (isset($_POST['update'])) { ?>
                    <?php
                        // Get All Students Data
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $department = $_POST['department'];

                        // All Fields Validation
                        if (empty($name) ||empty($email) ||empty($phone)||empty($address) ||empty($department)) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="text-danger">Failed !</strong> Input filled Required.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php 
                        }else {
                            $id = $_GET["id"];
                            $notification = update($name, $email, $phone, $address, $department, $id) ;
							echo $notification;
                        }
                    }?>
                    <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $student = edit($id);
                            while ($data = $student->fetch_assoc()) {?>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" id="name" placeholder="Enter Full Name" class="form-control"
                                            value="<?php echo $data['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" placeholder="Enter Full Email"
                                            class="form-control" value="<?php echo  $data['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" placeholder="Enter Full Phone"
                                            class="form-control" value="<?php echo  $data['phone']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" class="form-control"
                                            placeholder="Address"> <?php echo  $data['address']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="0">Select Department</option>
                                            <option value="1"  <?php echo $data['department'] == 1 ? "selected" : "" ?> >Computer Science</option>
                                            <option value="2" <?php echo $data['department'] == 2 ? "selected" : "" ?> >Nautical Science</option>
                                            <option value="3" <?php echo $data['department'] == 3 ? "selected" : "" ?> >Microbiology</option>
                                            <option value="4" <?php echo $data['department'] == 4 ? "selected" : "" ?> >Visual Communication</option>
                                        </select>
                                    </div>
                                    <button name="update" type="submit" class="btn btn-primary btn-block">Update</button>
                                </form>
                            <?php }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php @include "./includes/footer.php"; ?>