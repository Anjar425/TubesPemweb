<div id="insertModal" class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center items-center ">
    <div class="bg-gray-800 rounded-lg w-1/2">
        <form method="POST" action="insert-vegetation" class=" w-5/6 mx-auto my-5">
            @csrf
            <h2 class=" text-center font-semibold text-lg text-white">Insert Vegetation Region</h2><br>

            <div class=" basis-1/2 mb-5">
                <label for="plant_id" class="block mb-2 text-sm font-medium  text-white">Plant ID</label>
                <select name="plant_id" type="text" id="plant_id"
                    class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option disabled selected>-- Select ID Plant --</option>
                    @foreach ($plant as $p)
                        <option value="{{ $p->id }}">{{ $p->id }} : {{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-row gap-2">
                <div class=" basis-1/2 mb-5">
                    <label for="latitude" class="block mb-2 text-sm font-medium  text-white">Latitude</label>
                    <input name="latitude" type="text" id="latitude"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class=" basis-1/2 mb-5">
                    <label for="longitude" class="block mb-2 text-sm font-medium  text-white">Longitude</label>
                    <input name="longitude" type="text" id="longitude"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
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
