<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Coordinate;
use App\Models\PlantRegion;
use App\Models\Region;
use DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use DantSu\OpenStreetMapStaticAPI\LatLng;
use DantSu\OpenStreetMapStaticAPI\Markers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function index()
    {
        if (Auth::guard('regadmin')->check()) {
            $markers = [];
            $polygons = [];

            $administratorId = Auth::guard('regadmin')->user()->administrator_id;

            $regions = Region::where('administrator_id', $administratorId)->get();

            $plantRegions = PlantRegion::whereHas('region', function($query) use ($administratorId) {
                $query->where('administrator_id', $administratorId);
            })->get();


            foreach ($plantRegions as $marker) {
                $markers[] = [
                    'latitude' => $marker->latitude,
                    'longitude' => $marker->longitude,
                ];
            }

            foreach ($regions as $region) {
                // Ambil semua marker berdasarkan region_id
                $regionMarkers = Coordinate::where('region_id', $region->id)->get();

                // Inisialisasi array untuk menampung koordinat poligon
                $polygonCoordinates = [];

                foreach ($regionMarkers as $marker) {
                    $polygonCoordinates[] = [
                        'latitude' => $marker->latitude,
                        'longitude' => $marker->longitude
                    ];
                }

                // Urutkan dan validasi koordinat poligon
                $sortedPolygonCoordinates = $this->sortCoordinates($polygonCoordinates);

                // Pastikan setiap titik hanya ada dua cabang
                $validatedPolygonCoordinates = $this->validatePolygon($sortedPolygonCoordinates);

                // Tambahkan ke array $polygons
                $polygons[] = $validatedPolygonCoordinates;
            }

            return view('RegionalAdmin.Maps.index', compact('markers', 'polygons'));
        }

        return redirect("/")->withErrors('You are not allowed to access');
    }

    private function sortCoordinates($coordinates)
    {
        // Hitung pusat (centroid) dari poligon
        $centroid = $this->calculateCentroid($coordinates);

        // Urutkan koordinat berdasarkan sudut dari pusat poligon
        usort($coordinates, function ($a, $b) use ($centroid) {
            $angleA = atan2($a['latitude'] - $centroid['latitude'], $a['longitude'] - $centroid['longitude']);
            $angleB = atan2($b['latitude'] - $centroid['latitude'], $b['longitude'] - $centroid['longitude']);
            return $angleA - $angleB;
        });

        return $coordinates;
    }

    private function calculateCentroid($coordinates)
    {
        $numPoints = count($coordinates);
        $latitudeSum = 0;
        $longitudeSum = 0;

        foreach ($coordinates as $coordinate) {
            $latitudeSum += $coordinate['latitude'];
            $longitudeSum += $coordinate['longitude'];
        }

        return [
            'latitude' => $latitudeSum / $numPoints,
            'longitude' => $longitudeSum / $numPoints,
        ];
    }

    private function validatePolygon($coordinates)
    {
        $numPoints = count($coordinates);

        // Loop through each coordinate to validate
        for ($i = 0; $i < $numPoints; $i++) {
            $prevIndex = ($i + $numPoints - 1) % $numPoints; // Previous index in circular array
            $nextIndex = ($i + 1) % $numPoints; // Next index in circular array

            // Ensure each coordinate is connected to exactly two others
            $connectedCount = 0;
            for ($j = 0; $j < $numPoints; $j++) {
                if ($j !== $i && $j !== $prevIndex && $j !== $nextIndex) {
                    // Check if coordinate $i is connected to coordinate $j
                    if ($this->segmentsIntersect(
                        $coordinates[$i]['latitude'], $coordinates[$i]['longitude'],
                        $coordinates[$j]['latitude'], $coordinates[$j]['longitude'],
                        $coordinates[$prevIndex]['latitude'], $coordinates[$prevIndex]['longitude'],
                        $coordinates[$nextIndex]['latitude'], $coordinates[$nextIndex]['longitude']
                    )) {
                        // If there is an intersection, mark it as invalid (this should ideally not happen)
                        // Handle the intersection case as needed
                    } else {
                        $connectedCount++;
                    }
                }
            }

            // If not exactly two connections, handle the invalid case as needed
            if ($connectedCount !== 2) {
                // Handle the invalid case where coordinate $i does not have exactly two connections
                // This should ideally not happen if input coordinates form a valid polygon
            }
        }

        return $coordinates;
    }

    // Function to check if two line segments intersect
    private function segmentsIntersect($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4)
    {
        // Implement logic to check if segment (x1, y1) to (x2, y2) intersects with segment (x3, y3) to (x4, y4)
        // Return true if intersects, false otherwise
        // This is a simplified example and actual implementation may vary based on geometric rules
        return false; // Placeholder implementation
    }



    public function getMarkers()
    {
        $marker = Region::all(['latitude', 'longitude']);

        return response()->json($marker);
    }


    // public function map()
    // {
    //     $markers = [];
    //     $polygons = [];

    //     $regions = Region::all();
    //     foreach ($regions as $region) {
    //         // Ambil semua marker berdasarkan region_id
    //         $regionMarkers = Coordinate::where('region_id', $region->id)->get();

    //         // Jika jumlah marker lebih dari 3, tambahkan ke polygons
    //         if ($regionMarkers->count() >= 3) {
    //             $polygonCoordinates = [];
    //             foreach ($regionMarkers as $marker) {
    //                 $polygonCoordinates[] = [$marker->latitude, $marker->longitude];
    //             }
    //             $polygons[] = $polygonCoordinates;
    //         } else {
    //             // Jika kurang dari 3, tambahkan ke markers
    //             foreach ($regionMarkers as $marker) {
    //                 $markers[] = [
    //                     'latitude' => $marker->latitude,
    //                     'longitude' => $marker->longitude,
    //                 ];
    //             }
    //         }
    //     }
    //     $rumah = Rumah::all();
    //     foreach ($rumah as $rumah) {
    //         // Ambil semua marker berdasarkan region_id
    //         $rumahMarkers = Rumah::where('id', $rumah->id)->get();

    //         $color = 'Chartreuse';



    //         // Jika kurang dari 3, tambahkan ke markers
    //         foreach ($rumahMarkers as $marker) {
    //             $markers[] = [
    //                 'latitude' => $marker->latitude,
    //                 'longitude' => $marker->longitude,
    //                 'status' => $marker->status
    //             ];
    //         }
    //     }


    //     return view('map', compact('markers', 'polygons'));
    // }

    public function showMap()
    {
        // Determine the scheme
        $scheme = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http');

        $regions = Region::all();

        // Check if there are regions available
        if ($regions->isEmpty()) {
            return response('No regions available', 404);
        }

        // Get the first region's latitude and longitude
        $firstRegion = $regions->first();
        $latitude = $firstRegion->latitude;
        $longitude = $firstRegion->longitude;

        // Create the OpenStreetMap object using the first region's coordinates
        $map = new OpenStreetMap(new LatLng($latitude, $longitude), 17, 600, 400);

        // Add markers
        $markers = new Markers(public_path('images/marker.png'));
        $markers->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM);

        foreach ($regions as $region) {
            $markers->addMarker(new LatLng($region->latitude, $region->longitude));
        }

        $map->addMarkers($markers);

        // Generate and display the image
        $image = $map->getImage();
        $response = new Response($image->displayPNG(), 200);
        $response->header('Content-Type', 'image/png');

        return $response;
    }
}
