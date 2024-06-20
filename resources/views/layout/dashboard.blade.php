<!DOCTYPE html>
<html class="">

<head>
    <title>DATABASE PROJECT</title>
    @vite('resources/css/app.css')
        <!-- CSS Leaflet -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>

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
                @yield('navigation')
            </div>

            <div class=' justify-self-end items-center py-10 justify-center flex'>
                <form action="/logout" method="POST" class='flex flex-row justify-center items-center'>
                    @csrf
                    <button type="submit" class='text-white font-semibold text-lg'>LOG OUT</button>
                </form>

            </div>
        </aside>
        <div class='w-full min-h-screen max-h-screen flex flex-col h-20 px-10 overflow-hidden overflow-y-auto'>
            <div class="w-full flex flex-col justify-center items-center">
                <h1 class="text-center text-xl font-bold my-3 text-white ">@yield('Title')</h1>
                <div
                    class=" mb-20 flex flex-col w-11/12 rounded-xl items-center place-content-center bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent">
                    <div class="w-11/12 overflow-x-scroll overscroll-x-auto">
                        @yield('table')
                    </div>
                    <div class="w-11/12">
                        @yield('button')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('Insert Modal')
    @yield('Edit Modal')
    @yield('Import Modal')
    @include('Layout.delete')

    <script>
        function openInsertModal() {
            var insertModal = document.getElementById('insertModal');
            insertModal.classList.remove('hidden');
            insertModal.classList.add('flex');
        }

        function closeInsertModal() {
            var insertModal = document.getElementById('insertModal');
            insertModal.classList.add('hidden');
            insertModal.classList.remove('flex');
        }

        function openImportModal() {
            var ImportModal = document.getElementById('ImportModal');
            ImportModal.classList.remove('hidden');
            ImportModal.classList.add('flex');
        }

        function closeImportModal() {
            var ImportModal = document.getElementById('ImportModal');
            ImportModal.classList.add('hidden');
            ImportModal.classList.remove('flex');
        }

        function openEditModal(x) {
            let id = "editModal"
            let result = id.concat(x)
            document.getElementById(result).classList.add('flex');
            document.getElementById(result).classList.remove('hidden');

        }

        function closeEditModal(x) {
            let id = "editModal"
            let result = id.concat(x)
            document.getElementById(result).classList.add('hidden');
            document.getElementById(result).classList.remove('flex');
        }

        function openDeleteModal(link) {
            document.getElementById('deleteModal').classList.add('flex');
            document.getElementById('deleteModal').classList.remove('hidden');

            var deleteButton = document.getElementById('delete-button');
            deleteButton.action = link;
        }

        // Fungsi untuk menutup modal
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('flex');
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Fungsi untuk menghapus data
        function deleteData(link) {
            // Tambahkan logika penghapusan data di sini
            window.location.href = link;

            // Setelah menghapus data, tutup modal
            closeDeleteModal();
        }


        window.addEventListener('click', function(event) {
            var insertModal = document.getElementById('insertModal');
            var deleteModal = document.getElementById('deleteModal');
            var editModalPrefix = "editModal";

            if (event.target === insertModal) {
                closeInsertModal();
            }

            if (event.target === deleteModal) {
                closeDeleteModal();
            }

            if (event.target.id.startsWith(editModalPrefix)) {
                var idNumber = event.target.id.substring(editModalPrefix.length);

                closeEditModal(idNumber);
            }
        });
    </script>
</body>

</html>
