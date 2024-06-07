@foreach ($plant as $plant)
    <div id="editModal{{ $plant->id }}" class="hidden fixed inset-0 bg-gray-400 bg-opacity-60 justify-center items-center">
        <div class="bg-gray-800 rounded-lg w-1/2">
            <form method="POST" action="{{ url('/' . $plant->id . '/update-plants') }}" class="w-5/6 mx-auto my-5">
                @csrf
                <h2 class="text-center font-semibold text-lg text-white">Edit Plant</h2><br>

                <div class="basis-1/2 mb-5">
                    <label for="name{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Name</label>
                    <input name="name" type="text" id="name{{ $plant->id }}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        value="{{ $plant->name }}" required>
                </div>

                <div class="basis-1/2 mb-5">
                    <label for="image{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Image</label>
                    <input name="image" type="text" id="image{{ $plant->id }}"
                        class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                        value="{{ $plant->image }}" required>
                </div>

                <div class="flex flex-row gap-2">
                    <div class="basis-1/2 mb-5">
                        <label for="leaf_width{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Leaf Width</label>
                        <input name="leaf_width" type="text" id="leaf_width{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->leaf_width }}" required>
                    </div>
                    <div class="basis-1/2 mb-5">
                        <label for="leaf_color{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Leaf Color</label>
                        <input name="leaf_color" type="text" id="leaf_color{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->leaf_color }}" required>
                    </div>
                </div>

                <div class="flex flex-row gap-2">
                    <div class="basis-1/4 mb-5">
                        <label for="class_id{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Class ID</label>
                        <input name="class_id" type="text" id="class_id{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->class_id }}" required>
                    </div>
                    <div class="basis-1/4 mb-5">
                        <label for="type{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Type</label>
                        <input name="type" type="text" id="type{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->type }}" required>
                    </div>
                    <div class="basis-1/4 mb-5">
                        <label for="height{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Height</label>
                        <input name="height" type="text" id="height{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->height }}" required>
                    </div>
                    <div class="basis-1/4 mb-5">
                        <label for="diameter{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Diameter</label>
                        <input name="diameter" type="text" id="diameter{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->diameter }}" required>
                    </div>
                </div> 

                <div class="flex flex-row gap-2">
                    <div class="basis-1/2 mb-5">
                        <label for="watering_frequency{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Watering Frequency</label>
                        <input name="watering_frequency" type="text" id="watering_frequency{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->watering_frequency }}" required>
                    </div>
                    <div class="basis-1/2 mb-5">
                        <label for="light_intensity{{ $plant->id }}" class="block mb-2 text-sm font-medium text-white">Light Intensity</label>
                        <input name="light_intensity" type="text" id="light_intensity{{ $plant->id }}"
                            class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            value="{{ $plant->light_intensity }}" required>
                    </div>
                </div>

                <div class="flex flex-row gap-3">
                    <button type="submit"
                        class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 mb-5">Submit</button>
                    <button type="button" onclick="closeEditModal('{{ $plant->id }}')"
                        class="text-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center bg-gray-100 hover:bg-gray-300 focus:ring-gray-600 mb-5">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endforeach