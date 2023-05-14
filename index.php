<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bing Maps Api</title>
    <!--Bootstrap-->    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--Style for my-->
    <link rel="stylesheet" href="estilo.css">
    <!--Datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
</head>
<body>
    <header>
        <div class="container">
            <h3>Maps Api</h3>
        </div>
    </header>
    <div>
        <main>
            <div class="shadow-lg p-3 mb-5 bg-white rounded options">
                <input  class="form-control search_input1" placeholder="Ingrese por favor el texto a buscar">
                <button type="button" class="btn btn-primary btn-lg btn-block search_btn1">Buscar</button>

                <form id="formHistorial">
                    <input type="hidden" id="latitude" name="latitude" value="">
                    <input type="hidden" id="longitude" name="longitude" value="">
                    <button type="submit" class="btn btn-danger btn-lg btn-block search_btn1">Historial</button>    
                </form>

            </div>
            <div class="container" id="capatemporal"></div>
            <div class="shadow-lg p-3 mb-5 bg-white rounded" id="map"></div>  
        </main>              
    </div>
        <footer>
            <div class="container">
            <p class="copyright">2023 Ariel González </p>
            </div>
        </footer>
    <!--Api Bing Map-->
    <script src="http://www.bing.com/api/maps/mapcontrol?callback=GetMap" async defer></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!--Pooper-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <!--Code for my-->
    <script src="maps.js"></script>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!--Sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Datatables-->
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