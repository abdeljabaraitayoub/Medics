<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

<body class="nav-md">
    <?php include 'include/sidebar.php'; ?>
    <?php include 'include/menufooter.php'; ?>
    </div>
    </div>
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
                        <form method="post" action="/editVente">
    <div class="modal-header">
        <h4 class="modal-title">Edit Sale</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Patient name</label>
            <select class="form-control" name="patient_id">
                <?php foreach ($users as $user) :
                    $selected = ($user['id'] == $results[0]['id_patient']) ? 'selected' : '';
                ?>
                    <option value="<?php echo $user['id']; ?>" <?php echo $selected; ?>>
                        <?php echo $user['username']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Drug name</label>
            <select class="form-control" name="drug_id">
                <?php foreach ($drugs as $drug) :
                    $selected = ($drug['id'] == $results[0]['id_medicament']) ? 'selected' : '';
                ?>
                    <option value="<?php echo $drug['id']; ?>" <?php echo $selected; ?>>
                        <?php echo $drug['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="hidden" name="id" value="<?php echo $results[0]['id']; ?>">
    </div>
    <div class="modal-footer">
        <a href="/sales"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
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
    <?php include 'include/topnav.php'; ?>

    <?php include 'include/footer.php'; ?>
</body>

</html>