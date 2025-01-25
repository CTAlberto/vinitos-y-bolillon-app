<!-- filepath: /c:/Users/jrubi/Documents/DAW/PHP/vinitos-y-bolillon-app/resources/views/components/map.blade.php -->
<div id="map" style="height: 300px;"></div>

<div class="mt-2">
    <input type="text" id="search-input" class="form-control" placeholder="Buscar dirección">
    <button id="search-button" class="btn btn-primary mt-2">Buscar</button>
</div>

<input style="--col-span-default: span 1 / span 1;" type="text" name="latitude" id="latitude"class="col-[--col-span-default]" placeholder="Latitud" wire:key="zStXxlqafTw3Jl8WwRft.data.price.Filament\Forms\Components\TextInput">
<input style="--col-span-default: span 1 / span 1;" type="text" name="longitude" id="longitude" class="col-[--col-span-default]" placeholder="Longitud" wire:key="zStXxlqafTw3Jl8WwRft.data.price.Filament\Forms\Components\TextInput">

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

                        // Actualizar latitud y longitud en los inputs visibles y en los campos del formulario
                        document.getElementById('latitude').value = y.toFixed(8);
                        document.getElementById('longitude').value = x.toFixed(8);

                        // También podemos actualizar los campos de Filament en el formulario si es necesario
                        document.querySelector('input[name="latitude"]').value = y.toFixed(8);
                        document.querySelector('input[name="longitude"]').value = x.toFixed(8);

                        // Verificar los valores actualizados
                        console.log('Latitud:', y.toFixed(8));
                        console.log('Longitud:', x.toFixed(8));
                    }
                });
            });

            // Actualizar latitud y longitud cuando el marcador es arrastrado
            marker.on('dragend', function (e) {
                const latLng = e.target.getLatLng();

                // Actualizar latitud y longitud en los inputs visibles y en los campos del formulario
                document.getElementById('latitude').value = latLng.lat.toFixed(8);
                document.getElementById('longitude').value = latLng.lng.toFixed(8);

                // Actualizar los campos de Filament
                document.querySelector('input[name="latitude"]').value = latLng.lat.toFixed(8);
                document.querySelector('input[name="longitude"]').value = latLng.lng.toFixed(8);

                // Verificar los valores actualizados
                console.log('Latitud:', latLng.lat.toFixed(8));
                console.log('Longitud:', latLng.lng.toFixed(8));
            });
        });
    </script>
@endpush