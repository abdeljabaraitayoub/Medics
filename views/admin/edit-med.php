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
                                    <select class="form-control" name="id">
                                        <?php foreach ($meds as $user) :
                                            $selected = ($user['id'] == $results[0]['id_patient']) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $user['id']; ?>" <?php echo $selected; ?>>
                                                <?php echo $user['id']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="form-group">
                                        <label>Le nom du médicament : </label>
                                        <select class="form-control" name="MedName">
                                            <?php foreach ($meds as $med) :
                                                $selected = ($med['id'] == $results[0]['id_patient']) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $med['name']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $med['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>La description: </label>
                                        <select class="form-control" name="MedDesc">
                                            <?php foreach ($meds as $med) :
                                                $selected = ($med['id'] == $results[0]['id_medicament']) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $med['prix']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $med['description']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Le prix : </label>
                                        <select class="form-control" name="MedPrix">
                                            <?php foreach ($meds as $drug) :
                                                $selected = ($drug['prix'] == $results[0]['prix']) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $drug['description']; ?>" <?php echo $selected; ?>>
                                                    <?php echo $drug['prix']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- <input type="hidden" name="id" value="<?php echo $results[0]['id']; ?>"> -->
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