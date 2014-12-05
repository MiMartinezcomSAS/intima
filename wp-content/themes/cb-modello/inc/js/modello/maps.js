var map;
jQuery(document).ready(function($){

    var ciudad = $('#ciudadGetCi').val() != ''? $('#ciudadGetCi').val() : 'bogota' ;
    var la = $('#ciudadGetLa').val() != ''? $('#ciudadGetLa').val() : '4.598056000000001' ;
    var lo = $('#ciudadGetLo').val() != ''? $('#ciudadGetLo').val() : '-74.07583299999999' ;
    $('#ciudades > li').addClass('hideLi');
    console.log($('#ciudadGetCi').val())
    $('#'+ciudad).removeClass('hideLi');
    //Parametros de google
    var $latitude = la,
        $longitude = lo,
        $map_zoom = 10;

    //google map custom marker icon - .png fallback for IE11
    var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
    var $marker_url = 'http://lilipink.com/wp-content/uploads/2014/10/cd-icon-location_1.png';

    //define the basic color of your map, plus a value for saturation and brightness


    //we define here the style of the map
    var style= [
        {
            "featureType": "landscape",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 65
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "poi",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 51
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 30
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road.local",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 40
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "transit",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "administrative.province",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "lightness": -25
                },
                {
                    "saturation": -100
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#ffff00"
                },
                {
                    "lightness": -25
                },
                {
                    "saturation": -97
                }
            ]
        }
    ];

    //set google map options
    var map_options = {
        center: new google.maps.LatLng($latitude, $longitude),
        zoom: $map_zoom,
        panControl: false,
        zoomControl: false,
        mapTypeControl: false,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        styles: style,
    }
    //inizialize the map
    map = new google.maps.Map(document.getElementById('google-container'), map_options);
    //add a custom marker to the map


    //add custom buttons for the zoom-in/zoom-out on the map
    function CustomZoomControl(controlDiv, map) {
        //grap the zoom elements from the DOM and insert them in the map
        var controlUIzoomIn= document.getElementById('cd-zoom-in'),
            controlUIzoomOut= document.getElementById('cd-zoom-out');
        controlDiv.appendChild(controlUIzoomIn);
        controlDiv.appendChild(controlUIzoomOut);

        // Setup the click event listeners and zoom-in or out according to the clicked element
        google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
            map.setZoom(map.getZoom()+1)
        });
        google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
            map.setZoom(map.getZoom()-1)
        });
    }

    var zoomControlDiv = document.createElement('div');
    var zoomControl = new CustomZoomControl(zoomControlDiv, map);

    //insert the zoom div on the top left of the map
    map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);


    $("#select").click(function() {
        var coordenadas = $("#select").val().split(",");
        console.log($("#select"))
        $('#ciudades > li').addClass('hideLi');
        $('#'+coordenadas[2]).removeClass('hideLi');
        map.setCenter(new google.maps.LatLng(coordenadas[0], coordenadas[1]));
        console.log(this.options[this.selectedIndex].value);
        map.setZoom(10);
        $('html, body').stop().animate({
            scrollTop: 250
        }, 500);

    });

    var $coordenadas = $(".coordenadas");
    $coordenadas.each(function() {
        var coordenadas = $(this).data('coor').split(",");
        $(this).on('click',function(){

            map.setCenter(new google.maps.LatLng(coordenadas[0], coordenadas[1]))
            map.setZoom(17);
            $('html, body').stop().animate({
                scrollTop: 0
            }, 500);
        });
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(coordenadas[0], coordenadas[1]),
            map: map,
            visible: true,
            animation: google.maps.Animation.DROP,
            icon: $marker_url
        });
    });

});
function myFunction(elmnt,clr) {
    alert(elmnt );
}
