<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php';


// echo "sssssssssssssssssss";

?>

<body class="nav-md">
    <?php include 'include/sidebar.php'; ?>
    <?php include 'include/menufooter.php'; ?>
    </div>
    </div>

    <?php include 'include/topnav.php'; ?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-cog"></i> Company Settings</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>System Configuration</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form method="post" action="/editMedDetails">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Sale</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Le nom du médicament : </label>
                                        <input class="form-control" name="MedName" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label>La description: </label>
                                        <input class="form-control" name="MedDesc" type="text">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label>Le prix : </label>
                                        <input class="form-control" name="MedPrix" type="text">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <a href="/medicine"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
                                    <input type="submit" class="btn btn-success" value="Edit">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php include 'include/footer.php'; ?>
</body>

</html>