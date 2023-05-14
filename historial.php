<?php
//firebase Realtime
include("database/firebaseRDB.php");
include("database/config.php");

$db = new firebaseRDB($databaseURL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <style>
        table.dataTable thead{
            background-color: #7952b3;
            color: aliceblue;
        }
    </style>
</head>
<body>  
<div class="container">
<div class="row shadow-lg p-3 mb-5">
<table id="tablaMapa" class="display responsive nowrap" style="width: 100%;">
<thead>
   <tr>
      <th>País</th>
      <th>Ciudad</th>
      <th>longitude</th>
      <th>latitude</th>
      <th>Humedad</th>
      <th>Fecha</th>
</tr>
</thead>
   <?php
   $data = $db->retrieve("mapa");
   $data = json_decode($data, 1);
   
   if(is_array($data)){
      foreach($data as $id => $mapa){
         echo "<tr>
         <td>{$mapa['pais']}</td>
         <td>{$mapa['ciudad']}</td>
         <td>{$mapa['longitude']}</td>
         <td>{$mapa['latitude']}</td>
         <td>{$mapa['humedad']}</td>
         <td>{$mapa['fecha']}</td>
      </tr>";
      }
   }
   ?>
</table>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#tablaMapa').DataTable({
            responsive:true
        });
        });
    </script>
</body>
</html>