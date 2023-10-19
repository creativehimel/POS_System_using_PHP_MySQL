<?php include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Admins/Staff
                <a href="admins-create.php" class="btn btn-primary float-end">Add Admin</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $admins = getAll("admins"); 
                        if(mysqli_num_rows($admins) > 0){
                            foreach($admins as $admin){
                                ?>
                        <tr>
                            <td><?php echo $admin['id']; ?></td>
                            <td><?php echo $admin['name']; ?></td>
                            <td><?php echo $admin['email']; ?></td>
                            <td>
                                <a href="admins-edit.php?id=<?php echo $admin['id']; ?>"
                                    class="btn btn-success">Edit</a>
                                <a href="admins-delete.php?id=<?php echo $admin['id']; ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        }else{
                            echo "<tr><td colspan='4' class='text-center'>No data found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>