<?php
        //Value for query    
        $lat = $_POST["lat"];
        $lon = $_POST["lon"];
        $pais = $_POST["pais"];
        
        //Api Openweathermap
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=02b1cc90d7ea5779fdd49557992c373f";
        
        //echo "API->". $url."<br>";
        
        //Json result API -> Php
        $json = file_get_contents($url);
        $datos = json_decode($json, true);
        
        //Array Json->Php - API
        $datos = [
            "humedad" => $datos["main"]["humidity"],
            "ciudad" => $datos["name"],
            "pais" => $pais,
            "latitude" => $datos["coord"]["lat"],
            "longitude" => $datos["coord"]["lon"],
        ];
            
        //Insert firebase
        include("database/firebaseRDB.php");
        include("database/config.php");
        
        $db = new firebaseRDB($databaseURL);

        $insert = $db->insert("mapa", [
            "latitude"  => $datos['latitude'],
            "longitude" => $datos['longitude'],
            "humedad"   => $datos['humedad'],
            "pais"      => $datos['pais'],
            "ciudad"    => $datos['ciudad'],
            "fecha"     => date("Y-m-d H:i:s")
        ]);
        
        //result sent index
        echo json_encode($datos);
        //var_dump($datos)."=><br>";
?>
