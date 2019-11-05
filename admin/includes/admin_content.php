 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>



                    <?php 

                    /*
                    $user = new User();
                    $user->username = "indonesia";
                    $user->password = "germany";
                    $user->first_name = "kikelomo";
                    $user->last_name = "bashiru";
                    $user->last_name = "gbadebo";

                    $user->create();
                    */


                    $user = new User();
                    $user->username = "company";

                    $user->save();

                    /*
                    $user->delete();

                    */
                    ?>


                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->