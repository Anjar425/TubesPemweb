<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Region;
use DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use DantSu\OpenStreetMapStaticAPI\LatLng;
use DantSu\OpenStreetMapStaticAPI\Markers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function index(){
        if (Auth::guard('regadmin')->check()) {            
            return view('RegionalAdmin.Maps.index');
        }
        
        return redirect("/")->withErrors('You are not allowed to access');    
    }
    public function getMarkers(){
        $marker = Region::all(['latitude', 'longitude']);

        return response()->json($marker);
    }
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
