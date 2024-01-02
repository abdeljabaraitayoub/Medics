<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php';
use App\Models\MedCrud;
?>

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
              <a href="add-medicine" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Medicine</a>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Medicine Code</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Purchase Price</th>
                  <th>Retail Price</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                // Include the necessary models
                // require_once 'path/to/medicine_model.php';

                // Retrieve the data from the database
                new MedCrud();
                $medicines = MedCrud->getAllUsers();

                // Iterate over the retrieved data and display it in the table
                foreach ($medicines as $medicine) {
                  echo '<tr>';
                  echo '<td>' . $medicine['medicine_code'] . '</td>';
                  echo '<td><img src="' . $medicine['image'] . '" width="50" style="border-radius:10px" alt="Image"></td>';
                  echo '<td>' . $medicine['name'] . '</td>';
                  echo '<td>' . $medicine['purchase_price'] . '</td>';
                  echo '<td>' . $medicine['retail_price'] . '</td>';
                  echo '<td>' . $medicine['quantity'] . '</td>';
                  echo '<td>' . $medicine['unit'] . '</td>';
                  echo '<td>';
                  echo '<a class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> details</a>';
                  echo '<a class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>';
                  echo '<a class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>';
                  echo '</td>';
                  echo '</tr>';
                }
                ?>
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

<?php include 'include/footer.php';?>
</body>

</html>
