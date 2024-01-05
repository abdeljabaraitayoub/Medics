<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php';?>

  <body class="nav-md">
            <?php include 'include/sidebar.php';?>
            <?php include 'include/menufooter.php';?>
          </div>
        </div>

        <?php include 'include/topnav.php';?>

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
                <a href="#addEmployeeModal" class="btn btn-sm btn-info text-white" data-toggle="modal"><i class="fa fa-plus"></i> Add user</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Patient name</th>
                    <th>Email</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($users as $user) : ?>
                    <tr>
                      <td><?php echo $user['username']; ?></td>
                      <td><?php echo $user['email']; ?></td>
                      <td>
                        <a href="/edituser?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                        <a href="/delete?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
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
        <form id="employeeForm" method="post" action="/addUser">
          <div class="modal-header">
            <h4 class="modal-title">Add user</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Fullname</label>
                <div class="item form-group">
                  <div>
                    <input type="text" name="Fullname" class="form-control " >
                    <span class="form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label>CIN</label>
                <div class="item form-group">
                  <div class="">
                    <input type="text" name="CIN" class="form-control ">
                    <span class="form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label>Phone</label>
                <div class="item form-group">
                  <div >
                    <input type="text" name="phone" class="form-control" >
                    <span class="form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label>Email</label>
                <div class="item form-group">
                  <div >
                    <input type="text" name="email" class="form-control" >
                    <span class="form-control-feedback left" aria-hidden="true"></span>
                  </div>
                </div>
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