//  "use strict";
    //conts for query
    const searchInput = document.querySelector(".search_input1");
    const searchBtn = document.querySelector(".search_btn1");
    let map, searchManager;

    //Event click btn to call and to load map
    searchBtn.addEventListener("click", () => {
        $('#capatemporal').hide();
        $('#map').show();        
        map.entities.clear();
        //console.log(searchInput.value);
        geocodeQuery(searchInput.value);
    });

    //function for to load Map
    function GetMap(){
        map = new Microsoft.Maps.Map("#map", {
            credentials: 'AkCUnxaGjELpeoyUUtL2xnl-wWdsUQHeVIG6ek2_oe93ORuNcqT-LFiVLwyIC7eX',
        });
    };

    //function geolocation
    function geocodeQuery(query){
    if(!searchManager){
            Microsoft.Maps.loadModule("Microsoft.Maps.Search", function(){
                searchManager = new Microsoft.Maps.Search.SearchManager(map);
                geocodeQuery(query);
            });
        }else{
            let searchRequest = {
                where: query,
                callback: function(r){
                    if(r && r.results && r.results.length > 0){
                        //console.log(r);
                        //console.log(r.results[0].location.latitude);
                        //console.log(r.results[0].location.longitude);
                        var latitude = r.results[0].location.latitude;
                        var longitude = r.results[0].location.longitude;
                        var pais = r.results[0].address.countryRegion;

                        //Ajax 
                        $.ajax({
                        url: "mapa.php",
                        dataType: "json",
                        data: {lat:latitude, lon:longitude, pais:pais},
                        type: "POST",
                        success:function (data) {
                                $('#latitude').val(data.latitude);
                                $('#longitude').val(data.longitude);
                                //console.log(data);
                                Swal.fire(
                                 data.ciudad+ ', '+data.pais ,
                                'Sensación de humedad: '+data.humedad,
                                'success'
                                )                                    
                            }
                        });                         

                        var pin = new Microsoft.Maps.Pushpin(r.results[0].location);
                        map.entities.push(pin);

                        map.setView({bounds: r.results[0].bestView});
                    };
                },
                errorCallback: function(e){
                    //SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No hay datos!',
                    });
                }
            };
            searchManager.geocode(searchRequest);
        };
    };

    //function for to load history
    $('#formHistorial').submit(function(e){
        e.preventDefault();
            //Ajax
             $.ajax({
            url: "historial.php",
            dataType: "html",
            data: {},
            type: "GET",
            success:function (data) {
                console.log(data);
                $("#capatemporal").html(data);            
                }
            });    
            
            $('#map').hide();
            $('#capatemporal').show();
    });
    
    $('#capatemporal').hide();
    
    
    