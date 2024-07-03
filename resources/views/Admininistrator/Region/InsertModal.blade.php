<div id="insertModal" class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center items-center ">
    <div class="bg-gray-800 rounded-lg w-1/2">
        <form method="POST" action="insert-region" class=" w-5/6 mx-auto my-5">
            @csrf
            <h2 class=" text-center font-semibold text-lg text-white">Insert Region</h2><br>

            <div class=" basis-1/2 mb-5">
                <label for="name" class="block mb-2 text-sm font-medium  text-white">Name</label>
                <input name="name" type="text" id="name"
                    class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class=" basis-1/2 mb-5">
                <label for="location" class="block mb-2 text-sm font-medium  text-white">Location</label>
                <input name="location" type="text" id="location"
                    class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class=" basis-1/2 mb-5">
                <label for="area" class="block mb-2 text-sm font-medium  text-white">Area</label>
                <input name="area" type="text" id="area"
                    class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div id="coordinate" class="flex flex-col gap-2 h-20 overflow-y-scroll">
                <div class="flex flex-row gap-2">
                    <div class=" basis-1/2 mb-5">
                        <label for="latitude" class="block mb-2 text-sm font-medium  text-white">Latitude</label>
                        <input name="latitude[]" type="text" id="latitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class=" basis-1/2 mb-5">
                        <label for="longitude" class="block mb-2 text-sm font-medium  text-white">Longitude</label>
                        <input name="longitude[]" type="text" id="longitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class=" basis-1/2 mb-5">
                        <label for="latitude" class="block mb-2 text-sm font-medium  text-white">Latitude</label>
                        <input name="latitude[]" type="text" id="latitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class=" basis-1/2 mb-5">
                        <label for="longitude" class="block mb-2 text-sm font-medium  text-white">Longitude</label>
                        <input name="longitude[]" type="text" id="longitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
                <div class="flex flex-row gap-2">
                    <div class=" basis-1/2 mb-5">
                        <label for="latitude" class="block mb-2 text-sm font-medium  text-white">Latitude</label>
                        <input name="latitude[]" type="text" id="latitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class=" basis-1/2 mb-5">
                        <label for="longitude" class="block mb-2 text-sm font-medium  text-white">Longitude</label>
                        <input name="longitude[]" type="text" id="longitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
            </div>
            <button type="button" id="add-coordinate-btn"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Add
                Coordinate</button>

            <div class=" basis-1/2 mb-5">
                <label for="status" class="block mb-2 text-sm font-medium  text-white">status</label>
                <input name="status" type="text" id="status"
                    class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="flex flex-row gap-3">
                <button type="submit"
                    class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 mb-5">Submit</button>
                <button type="button" onclick="closeInsertModal()"
                    class="text-blue-600  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600 mb-5">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-coordinate-btn').addEventListener('click', function() {
        var coordinateDiv = document.getElementById('coordinate');

        // Create a new set of input elements
        var newCoordinate = document.createElement('div');
        newCoordinate.className = 'flex flex-row gap-2';
        newCoordinate.innerHTML = `
                <div class="flex flex-row gap-2 w-full">
                    <div class=" basis-1/2 mb-5">
                        <label for="latitude" class="block mb-2 text-sm font-medium  text-white">Latitude</label>
                        <input name="latitude[]" type="text" id="latitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class=" basis-1/2 mb-5">
                        <label for="longitude" class="block mb-2 text-sm font-medium  text-white">Longitude</label>
                        <input name="longitude[]" type="text" id="longitude"
                            class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
        `;

        // Append the new coordinate inputs to the coordinate div
        coordinateDiv.appendChild(newCoordinate);
    });
</script>
