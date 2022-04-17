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
                            <!-- Delete Student -->
                            <?php
                                if (isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $destroy = destroy($id);
                                }
                            ?>
                            <!-- Get All Student -->
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
                                    <a href="edit.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-user-pen"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?php echo $data['id'] ?>"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="delete<?php echo $data['id'] ?>" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Student Data ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Deleting this student will permanently
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                                <a name="delete" href="index.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Confirm</a>
                                            <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<?php include "./includes/footer.php"; ?>