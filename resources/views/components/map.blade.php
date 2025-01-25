<!-- filepath: /c:/Users/jrubi/Documents/DAW/PHP/vinitos-y-bolillon-app/resources/views/components/map.blade.php -->
<div id="map" style="height: 300px;"></div>

<div class="mt-2">
    <input type="text" id="search-input" class="form-control" placeholder="Buscar dirección">
    <button id="search-button" class="btn btn-primary mt-2">Buscar</button>
</div>

<input type="hidden" name="latitude" id="latitude" value="">
<input type="hidden" name="longitude" id="longitude" value="">

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

            // Inicializar el marcador
            const marker = L.marker([37.39118345901626, -6.000890322464233], { draggable: true }).addTo(map);

            // Proveedor de búsqueda
            const provider = new window.GeoSearch.OpenStreetMapProvider();

            // Buscar dirección
            document.getElementById('search-button').addEventListener('click', function () {
                const query = document.getElementById('search-input').value;
                provider.search({ query: query }).then(function (result) {
                    if (result && result.length > 0) {
                        const { x, y } = result[0];
                        marker.setLatLng([y, x]);
                        map.setView([y, x], 17);
                        document.getElementById('latitude').value = y.toFixed(8);
                        document.getElementById('longitude').value = x.toFixed(8);
                    }
                });
            });

            marker.on('dragend', function (e) {
                const latLng = e.target.getLatLng();
                document.getElementById('latitude').value = latLng.lat.toFixed(8);
                document.getElementById('longitude').value = latLng.lng.toFixed(8);
            });
        });
    </script>
@endpush