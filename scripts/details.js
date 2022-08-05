

$(document).ready(function () {
    if ($('#slider').length > 0) {

        $(".regular").slick({
            infinite: true,
            variableWidth: true,
            centerMode: true,

            responsive: [{

                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: true
                }

            }, {

                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    dots: true
                }

            }, {

                breakpoint: 300,
                settings: "unslick" // destroys slick

            }],
        });
    }

    if ($('#similarListing').length > 0) {

        $(".similarListing").slick({
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{

                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: true
                }

            }, {

                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    dots: true
                }

            }, {

                breakpoint: 300,
                settings: "unslick" // destroys slick

            }],


        });
    }
});

let map;
let markers = [];
let store_places = [];

let markersImg = new Array();
markersImg['all'] = 'https://files.hutbay.com/images/marker-dot-green.png';

$(document).ready(function () {

    let latLng;
    let latitude = $("#inLat").val();
    let longitude = $("#inLong").val();


    latLng = new google.maps.LatLng(latitude, longitude);

    if (latitude !== undefined && latitude !== "") {

        initializeMap(latLng);
    }
    
    function initializeMap(loc) {
        let mapOptions = {
            zoom: 15,
            center: loc,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);

        let marker = new google.maps.Marker({
            position: loc,
            icon: 'https://files.hutbay.com/images/marker_main.png',
            map: map,
            title: 'Approximate Property Location'
        });
        
        ////load the first place details when map id done
        //google.maps.event.addListenerOnce(map, 'idle', function () {
        //    setTimeout(function() {
        //       $('#places-filter span:first-child').click();
        //    }, 3000)
        //});
    }

    let infoWindow = new google.maps.InfoWindow();
    let tempArray = [];

    function createMarker(place) {

        //clear tempArray
        tempArray = [];

        let placeMarker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            icon: markersImg['all']
        });

        tempArray.push(placeMarker);

        google.maps.event.addListener(placeMarker, 'click', function () {
            infoWindow.setContent('<div><strong>' + place.name + '</strong><br>' + place.vicinity + '</div>');
            infoWindow.open(map, this);
        });
    }


    $('#places-filter span').click(function (e) {

        let self = $(this);
        let type = self.attr('ptype');
        let data = self.attr('data');

        //if (self.hasClass('active')) {
        //    self.removeClass('active')

        //    if (store_marker[type] !== undefined) {
        //        removeMarkers(store_marker[type])
        //    }

        //    return;
        //}

        self.toggleClass('active')

        let request = {
            location: latLng,
            radius: 2300,
            types: data.split(',')
        };

        let service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                setMarker(results);
            }
        }

        function setMarker(results) {
            if (results.length > 0) {
                map.setZoom(14);

                for (let i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }

                markers[type] = tempArray;
            }
        }

        google.maps.event.addDomListener(window, 'load', initializeMap);
    });

    $('#mapNearby').on('click', '.marker-link', function () {
        let sclick = $(this);
        let first = sclick.attr('ptype');
        let sec = sclick.attr('marker-id')
        let mm = store_marker[first][0];
        google.maps.event.trigger(mm, 'click');
    });

    function removeMarkers(_markers) {
        _markers.forEach(function (entry) {
            entry.setMap(null);
        });
    }
})
