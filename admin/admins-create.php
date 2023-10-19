<?php include("includes/header.php"); ?>


<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Add Admin
                <a href="admins.php" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>
            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="number" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="is_ban">Is Ban</label>
                        <input type="checkbox" id="is_ban" name="is_ban" style="width: 20px; height: 20px;">
                    </div>
                    <div class="col-md-3 mb-3 text-end">
                        <button class="btn btn-primary" type="submit" name="saveAdmin">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>