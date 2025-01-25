<div id="map" style="height: 300px;"></div>

<div class="mt-2">
    <input type="text" id="search-input" class="form-control" placeholder="Buscar dirección">
    <button id="search-button" class="btn btn-primary mt-2">Buscar</button>
</div>

@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const map = L.map('map').setView([37.39118345901626, -6.000890322464233], 13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            const marker = L.marker([37.39118345901626, -6.000890322464233], { draggable: true }).addTo(map);

            marker.on('dragend', function (e) {
                const latLng = e.target.getLatLng();
                document.querySelector('input[name="latitude"]').value = latLng.lat;
                document.querySelector('input[name="longitude"]').value = latLng.lng;
            });

            const provider = new window.GeoSearch.OpenStreetMapProvider();

            document.getElementById('search-button').addEventListener('click', function () {
                const query = document.getElementById('search-input').value;
                provider.search({ query: query }).then(function (result) {
                    if (result && result.length > 0) {
                        const { x, y } = result[0];
                        marker.setLatLng([y, x]);
                        map.setView([y, x], 13);
                        document.querySelector('input[name="latitude"]').value = y;
                        document.querySelector('input[name="longitude"]').value = x;
                    }
                });
            });
        });
    </script>
@endpush