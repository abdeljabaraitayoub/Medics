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
          <h3><i class="fa fa-shopping-cart"></i> Daily Sales Details</h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2><strong>SLS-101-21</strong> <small class="text-success">Nov 5, 2021</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="/stock" class="btn btn-sm btn-dark text-white">Stock PDF</a>
                <a href="/vente" class="btn btn-sm btn-dark text-white">Sales PDF</a>
                <a href="#addEmployeeModal" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-plus"></i> Add Sales</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Patient name</th>
                    <th>drug name</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($results as $sale) : ?>
                    <tr>
                      <td><?php echo $sale['username']; ?></td>
                      <td><?php echo $sale['name']; ?></td>
                      <td><?php echo $sale['prix']; ?> dh</td>
                      <td>
                        <a href="/accepter?id=<?php echo $sale['id']; ?>" class="btn btn-sm btn-primary text-white"><i class="fa fa-edit"></i> Accepter</a>
                        <a href="/edit?id=<?php echo $sale['id']; ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                        <a href="/delete?id=<?php echo $sale['id']; ?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>

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
  <div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <form id="employeeForm" method="post" action="/add">
          <div class="modal-header">
            <h4 class="modal-title">Add Sale</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Patient name</label>
              <select class="form-control" name="patient_id">
                <?php foreach ($users as $user) : ?>
                  <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Drug name</label>
              <select class="form-control" name="drug_id">
                <?php foreach ($drugs as $drug) : ?>
                  <option value="<?php echo $drug['id']; ?>"><?php echo $drug['name']; ?></option>
                <?php endforeach; ?>
              </select>
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