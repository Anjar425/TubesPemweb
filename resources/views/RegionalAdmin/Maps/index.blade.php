<!DOCTYPE html>
<html class="">

<head>
    <title>DATABASE PROJECT</title>
    @vite('resources/css/app.css')
    <!-- CSS Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <!-- Leaflet.js -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <!-- Leaflet Geosearch -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css">
    <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>

    <!-- Leaflet Geosearch Providers -->
    <script src="https://unpkg.com/geosearch/src/js/l.control.geosearch.js"></script>
    <script src="https://unpkg.com/geosearch/src/js/l.geosearch.provider.google.js"></script>

</head>

<body class=" min-h-screen bg-gradient-to-tr from-gray-950 from-60% to-gray-800 ">
    {{-- @include('Layout.navbar') --}}

    <div class='min-h-screen flex flex-row overflow-hidden max-h-screen'>
        <aside class='h-screen w-72 bg-gray-900 overflow-y-hidden flex flex-col lg:static'>
            <div class='flex flex-row items-center justify-center h-20 text-white'>
                <img src='' />
                <h1 class='font-bold text-2xl '>DASHBOARD</h1>
            </div>
            <div class='text-gray-300 px-8 py-8 flex-1'>
                @include('RegionalAdmin.LinkDashboard')
            </div>

            <div class=' justify-self-end items-center py-10 justify-center flex'>
                <form action="/logout" method="POST" class='flex flex-row justify-center items-center'>
                    @csrf
                    <button type="submit" class='text-white font-semibold text-lg'>LOG OUT</button>
                </form>

            </div>
        </aside>
        <div class='w-full min-h-screen max-h-screen flex flex-col h-20 px-10 overflow-hidden overflow-y-auto'>
            <div class="w-full flex flex-col justify-center items-center h-screen">
                <h1 class="text-center text-xl font-bold my-3 text-white ">MAPS</h1>
                <div
                    class=" mb-20 flex flex-col w-11/12 rounded-xl items-center place-content-center bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent h-full">
                    <div class="w-11/12 overflow-x-scroll overscroll-x-auto h-full my-10">
                        <div id="peta" class=" h-full"></div>

                        <!-- CSRF Token -->
                        <meta name="csrf-token" content="{{ csrf_token() }}">


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const providerOSM = new GeoSearch.OpenStreetMapProvider();

            var leafletMap = L.map('peta', {
                fullscreenControl: true,
                minZoom: 2
            }).setView([-2.5489, 118.0149], 5);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(leafletMap);

            // Tampilkan marker
            @foreach ($markers as $marker)
                L.marker([{{ $marker['latitude'] }}, {{ $marker['longitude'] }}]).addTo(leafletMap);
            @endforeach


            // Fungsi untuk validasi poligon
            function isValidPolygon(coordinates) {
                return coordinates.length >= 3;
            }

            // Tampilkan polygon
            @foreach ($polygons as $polygon)
                var polygonCoordinates = @json($polygon);
                if (isValidPolygon(polygonCoordinates)) {
                    var polygon = L.polygon(polygonCoordinates.map(c => [c.latitude, c.longitude]), {
                        color: 'red'
                    }).addTo(leafletMap);
                } else {
                    console.error("Invalid polygon coordinates:", polygonCoordinates);
                }
            @endforeach
        });
    </script>
</body>

</html>
