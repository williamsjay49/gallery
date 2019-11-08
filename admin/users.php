<?php include("includes/header.php"); ?>

        <!-- Navigation -->
        <?php include("includes/top_nav.php"); ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include("includes/side_nav.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            <small>Subheading</small>
                        </h1>

                        <a href="add_user.php" class="btn btn-primary">Add user</a>
                        <div class="col-md-12">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Username</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                    </tr>
                                    <tbody>
                                        <?php $users = User::find_all(); ?>
                                        <?php foreach ($users as $user) : ?>
                                            
                                        <tr>
                                            <td><?php echo $user->id; ?></td>

                                            <td><img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                                            </td>
                                            <td><?php echo $user->username; ?>
                                                <div class="action_link">

                                                <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                                <a href="edit_users.php?id=<?php echo $user->id; ?>">Edit</a>
                                                <a href="">View</a>
                                            </div>
                                            </td>
                                            <td><?php echo $user->first_name; ?></td>
                                            <td><?php echo $user->last_name; ?></td>
                                        </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </thead>
                            </table> <!-- End of Table -->
                        </div>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>