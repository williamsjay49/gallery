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
                            PHOTOS
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-12">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Id</th>
                                        <th>File name</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                    </tr>
                                    <tbody>
                                        <?php $photos = Photo::find_all(); ?>
                                        <?php foreach ($photos as $photo) : ?>
                                            
                                        <tr>
                                            <td><img class="img-fluid"> src="<?php echo $photo->picture_path(); ?>" alt=""></td>
                                            <td><?php echo $photo->photo_id; ?></td>
                                            <td><?php echo $photo->filename; ?></td>
                                            <td><?php echo $photo->title; ?></td>
                                            <td><?php echo $photo->size; ?></td>
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