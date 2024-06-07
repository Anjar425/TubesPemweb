<div id="insertModal" class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center items-center ">
    <div class="bg-gray-800 rounded-lg w-1/2">
        <form method="POST" action="insert-plants" class=" w-5/6 mx-auto my-5">
            @csrf
            <h2 class=" text-center font-semibold text-lg text-white">Insert Plant</h2><br>

            <div class=" basis-1/2 mb-5">
                <label for="name" class="block mb-2 text-sm font-medium  text-white">Name</label>
                <input name="name" type="text" id="name"
                    class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class=" basis-1/2 mb-5">
                <label for="image" class="block mb-2 text-sm font-medium  text-white">image</label>
                <input name="image" type="text" id="image"
                    class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex flex-row gap-2">
                <div class=" basis-1/2 mb-5">
                    <label for="leaf_width" class="block mb-2 text-sm font-medium  text-white">leaf_width</label>
                    <input name="leaf_width" type="text" id="leaf_width"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class=" basis-1/2 mb-5">
                    <label for="leaf_color" class="block mb-2 text-sm font-medium  text-white">leaf_color</label>
                    <input name="leaf_color" type="text" id="leaf_color"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="flex flex-row gap-2">
                <div class=" basis-1/4 mb-5">
                    <label for="class_id" class="block mb-2 text-sm font-medium  text-white">class_id</label>
                    <select name="class_id" type="text" id="class_id"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                        <option disabled selected>--Select Class ID--</option>
                        @foreach ($classes as $c)
                            <option value="{{ $c->id }}">{{ $c->id }} : {{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" basis-1/4 mb-5">
                    <label for="type" class="block mb-2 text-sm font-medium  text-white">type</label>
                    <input name="type" type="text" id="type"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class=" basis-1/4 mb-5">
                    <label for="height" class="block mb-2 text-sm font-medium  text-white">height</label>
                    <input name="height" type="text" id="height"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class=" basis-1/4 mb-5">
                    <label for="diameter" class="block mb-2 text-sm font-medium  text-white">diameter</label>
                    <input name="diameter" type="text" id="diameter"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="flex flex-row gap-2">
                <div class=" basis-1/2 mb-5">
                    <label for="watering_frequency"
                        class="block mb-2 text-sm font-medium  text-white">watering_frequency</label>
                    <input name="watering_frequency" type="text" id="watering_frequency"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class=" basis-1/2 mb-5">
                    <label for="light_intensity"
                        class="block mb-2 text-sm font-medium  text-white">light_intensity</label>
                    <input name="light_intensity" type="text" id="light_intensity"
                        class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
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
