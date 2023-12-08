$(document).ready(function () {

    function initMap(latitude, longitude) {
        const initialLocation = { lat: latitude, lng: longitude };

        const map = new google.maps.Map(document.getElementById('map'), {
            center: initialLocation,
            zoom: 15
        });

        const iconSize = {
            width: 32,
            height: 32
        };

        //dot biru
        const userMarker = new google.maps.Marker({
            position: initialLocation,
            map: map,
            icon: {
                url: '../assets/images/dot-map.png',
                scaledSize: new google.maps.Size(iconSize.width, iconSize.height),
            },
            title: 'You are here!'
        });

        const lokasiKelompokKKN = document.getElementById('lokasiKelompokKKN').value || '';
        const alamatKelompokKKN = document.getElementById('alamatKelompokKKN').value || '';

        const searchLocation = `${lokasiKelompokKKN}, ${alamatKelompokKKN}`;
        const request = {
            query: searchLocation,
            fields: ['name', 'geometry', 'formatted_address']
        };
        const service = new google.maps.places.PlacesService(map);

        function getDirections(lat, lng) {
            const url = `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}`;
            window.open(url, '_blank');
        }

        function performTextSearch(request, map) {
            service.textSearch(request, (results, status, pagination) => {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    const result = results[0]
                    const location = result.geometry.location;
                    const name = result.name;
                    const address = result.formatted_address;

                    map.setCenter(location);

                    const marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        title: name
                    });

                    const infoWindow = new google.maps.InfoWindow({
                        content: `<h3 style="font-size:12pt; font-weight:bold;">${result.name}</h3><p style="font-size:8pt;">${result.formatted_address}</p><button class="btn btn-outline-dark petunjuk" data-lat="${location.lat()}" data-lng="${location.lng()}">Petunjuk Arah</button>`,
                        maxWidth: 300
                    });

                    marker.addListener('click', function () {
                        infoWindow.open(map, marker);
                    });

                    google.maps.event.addListener(infoWindow, 'domready', function () {
                        const selectButton = document.querySelector('.petunjuk');
                        selectButton.addEventListener('click', function (event) {
                            event.preventDefault();
                            const lat = selectButton.getAttribute('data-lat');
                            const lng = selectButton.getAttribute('data-lng');

                            const url = `https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}`;
                            window.open(url, '_blank');
                        })
                    })
                }
            });
        }
        performTextSearch(request, map);
    }

    // Fungsi untuk mendapatkan geolokasi pengguna
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    initMap(latitude, longitude);
                },
                (error) => {
                    console.error('Error getting geolocation:', error);
                    initMap(0, 0);
                }
            );
        } else {
            // Geolokasi tidak didukung oleh browser
            console.error('Geolocation is not supported by your browser.');
        }
    }

    // Panggil fungsi untuk mendapatkan geolokasi dan inisialisasi peta
    getLocation();
});