<?php 
    include "./includes/header.php";
    include './db/config.php';
?>

    <div class="container mt-3">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary d-flex justify-content-between">
                        <h5 class="text-center text-light text-uppercase m-0">Student List</h5>
                        <a href="create.php" class="btn btn-primary btn-sm">Create Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $student = index();
                                    $sl = 1;
                                    if ($student->num_rows > 0) {
                                        while ($data = $student->fetch_assoc()) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $sl++; ?></th>
                                                <td><?php echo $data['name'] ?></td>
                                                <td><?php echo $data['email'] ?></td>
                                                <td><?php echo $data['phone'] ?></td>
                                                <td>
                                                    <?php echo $data['department'] == 1 ? "Computer Science" : "" ?>
                                                    <?php echo $data['department'] == 2 ? "Nautical Science" : "" ?>
                                                    <?php echo $data['department'] == 3 ? "Microbiology" : "" ?>
                                                    <?php echo $data['department'] == 4 ? "Visual Communication" : "" ?>
                                                </td>
                                                <td><?php echo $data['address'] ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-dark"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="edit.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-user-pen"></i></a>
                                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php @include "./includes/footer.php"; ?>