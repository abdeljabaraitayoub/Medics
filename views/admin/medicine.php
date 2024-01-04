<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

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
          <h3><i class="fa fa-medkit"></i> Medicine</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>List of Medicines</h2>
              <ul class="nav navbar-right panel_toolbox">
              <a href="#addMedModal" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-plus"></i> Add Sales</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Quantité</th>

                    <th>Action</th>
                  </tr>
                </thead>


                <tbody>
                  <?php foreach ($meds as $med) : ?>
                    <tr>
                      <td><?php echo $med['name']; ?></td>
                      <td><?php echo $med['description']; ?></td>
                      <td><?php echo $med['prix'] . " $"; ?></td>
                      <td><?php echo $med['quantite']; ?></td>

                      <td>
                        <a href="/editMed?id=<?php echo $med['id']; ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                        <!-- <a class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> details</a> -->
                        <!-- <a class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a> -->
                        <a href="/deleteMed?id=<?php echo $med['id']; ?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <div id="addMedModal" class="modal">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form id="employeeForm" method="post" action="/add-medicine">
          <div class="modal-header">
            <h4 class="modal-title">Ajouter un Medicament</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Le nom du medicament</label>
              <input type="text" name="Med_Name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>La description du medicament</label>
              <input type="text" name="Med_Desc" class="form-control" required>
            </div>
            <div class="form-group">
              <label>La prix du medicament</label>
              <input type="text" name="Med_Prix" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-success" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'include/footer.php'; ?>
</body>

</html>