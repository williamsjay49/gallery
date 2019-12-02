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
                            comments
                            <!-- <small>Subheading</small> -->
                        </h1>

                        <!-- <a href="add_comment.php" class="btn btn-primary">Add comment</a> -->
                        <div class="col-md-12">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                        
                                    </tr>
                                    <tbody>
                                        <?php $comments = Comment::find_all(); ?>
                                        <?php foreach ($comments as $comment) : ?>
                                            
                                        <tr>
                                            <td><?php echo $comment->id; ?></td>

                                            
                                            <td><?php echo $comment->author; ?>
                                                <div class="action_link">

                                                <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                                
                                            </div>
                                            </td>
                                            <td><?php echo $comment->body; ?></td>
                                            
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