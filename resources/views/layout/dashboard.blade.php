<!DOCTYPE html>
<html class="">

<head>
    <title>DATABASE PROJECT</title>
    @vite('resources/css/app.css')
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
                        <button onclick="openInsertModal()"
                            class="my-3 px-5 py-2.5 rounded-md place-self-start  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                            data-toggle="modal" data-target="#myModal">Insert</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('Insert Modal')
    @yield('Edit Modal')
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