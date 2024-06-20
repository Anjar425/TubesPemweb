@extends('Layout.dashboard')

@section('Title')
    PLANT CLASSES
@endsection

@section('navigation')
    @include('RegionalAdmin.LinkDashboard')
@endsection

@section('table')
    <div id="peta" class="h-96"></div>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi provider untuk pencarian lokasi
            const providerOSM = new GeoSearch.OpenStreetMapProvider();

            // Inisialisasi peta Leaflet dengan zoom ke wilayah Indonesia
            var leafletMap = L.map('peta', {
                fullscreenControl: true,
                minZoom: 2
            }).setView([-2.5489, 118.0149], 5); // Koordinat tengah Indonesia

            // Menambahkan tile layer ke peta
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(leafletMap);

            // Function untuk menambahkan marker ke peta
            function addMarkers(markers) {
                markers.forEach(marker => {
                    L.marker([marker.latitude, marker.longitude]).addTo(leafletMap);
                });
            }

            // Ambil data marker dari server saat halaman dimuat
            fetch('/markers')
                .then(response => response.json())
                .then(data => {
                    addMarkers(data); // Tambahkan marker ke peta
                })
                .catch(error => console.error('Error fetching markers:', error));

            // Menambahkan kontrol pencarian lokasi ke peta
            const search = new GeoSearch.GeoSearchControl({
                provider: providerOSM,
                style: 'icon',
                searchLabel: 'Klik Pencarian Lokasi',
            });
            leafletMap.addControl(search);
        });
    </script>
@endsection
