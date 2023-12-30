<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventory Table</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .table-container {
      width: 60%;
      margin: auto;
      border-collapse: collapse;
    }

    table {
      margin-top: 40px;
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .header-logo {
      text-align: center;
    }

    .header-logo img {
      width: 100px;
      /* Adjust as necessary */
    }

    h1 {
      text-align: center;
      margin-top: 20px;
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 0.9em;
      color: #666;
    }
  </style>
</head>

<body>
  <div class="header-logo">
    <?php
    // $baseurl = "https://i.ibb.co";
    //echo '<img src="' . $baseurl . 'tB3YyZ8/DALL-E-2023-12-27-10-43-06-A-professional-and-centered-logo-for-a-company-named-Medics-The-logo-is-p.png">';

    ?>
    <!-- <img src="https://i.ibb.co/tB3YyZ8/DALL-E-2023-12-27-10-43-06-A-professional-and-centered-logo-for-a-company-named-Medics-The-logo-is-p.png"> -->
    <!-- <img src="/public/build/images/logo.png"> -->
    <!-- <img src="https://i.ibb.co/tB3YyZ8/DALL-E-2023-12-27-10-43-06-A-professional-and-centered-logo-for-a-company-named-Medics-The-logo-is-p.png" border="0"> -->
  </div>

  <div class="table-container">
    <h1>rapport de vente</h1>

    <table>
      <thead>
        <tr>
          <!-- <th>id</th> -->
          <th>medicament</th>
          <th>patient</th>
          <th>price</th>
          <th>type</th>
          <th>date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $item) :; ?>
          <tr>

            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['username']; ?></td>
            <td><?php echo $item['prix']; ?></td>
            <td><?php echo $item['type']; ?></td>
            <td><?php echo $item['date']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="footer">
    Current Date: <?php echo date('Y-m-d'); ?>
  </div>
</body>

</html>