@extends('Layout.dashboard')
@extends('Layout.notif')

@section('Title')
    PLANTS
@endsection

@section('navigation')
    @include('RegionalAdmin.LinkDashboard')
@endsection

@section('table')
    <div class="container mx-auto mt-10">
        <div class="shadow-md rounded-lg p-6">
            <h2 class="text-white text-2xl font-semibold mb-4">Plant Details</h2>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">ID:</label>
                <p class="text-gray-300">{{ $plant->id }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Name:</label>
                <p class="text-gray-300">{{ $plant->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Leaf Width:</label>
                <p class="text-gray-300">{{ $plant->leaf_width }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Image:</label>
                <img src="{{ asset($plant->image) }}" alt="{{ $plant->name }}" class="w-32 h-32 object-cover">
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Class:</label>
                <p class="text-gray-300">{{ $plant->class_id }}: {{ $plant->plantClass->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Type:</label>
                <p class="text-gray-300">{{ $plant->type }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Height:</label>
                <p class="text-gray-300">{{ $plant->height }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Diameter:</label>
                <p class="text-gray-300">{{ $plant->diameter }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Leaf Color:</label>
                <p class="text-gray-300">{{ $plant->leaf_color }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Watering Frequency:</label>
                <p class="text-gray-300">{{ $plant->watering_frequency }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-200 text-sm font-bold mb-2">Light Intensity:</label>
                <p class="text-gray-300">{{ $plant->light_intensity }}</p>
            </div>
            <div class="mt-6">
                <a href="/plants" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to
                    List</a>
            </div>
        </div>
    </div>
@endsection

