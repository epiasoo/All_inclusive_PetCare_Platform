<?php

if (!isset($_GET['lat']) || !isset($_GET['lon'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid parameters']);
    exit;
}

$latitude = $_GET['lat'];
$longitude = $_GET['lon'];

$mapboxAccessToken = 'pk.eyJ1IjoiZXBpYXNvbyIsImEiOiJjbHdidWN0NjcwbnRxMmtzMjB6MHkybDFvIn0.Um_zq6CMzLAYc6gox59_uw';
$searchQuery = 'pet';

// Make request to Mapbox Places API
$url = "https://api.mapbox.com/geocoding/v5/mapbox.places/$searchQuery.json?proximity=$longitude,$latitude&access_token=$mapboxAccessToken";
$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(['error' => 'Failed to fetch data from Mapbox Places API']);
    exit;
}

$results = json_decode($response, true);

if ($results === null) {
    echo json_encode(['error' => 'Failed to decode JSON response']);
    exit;
}

foreach ($results['features'] as &$feature) {
    $categories = explode(", ", $feature['properties']['category']);
    if (in_array('veterinary', $categories)) {
        $feature['properties']['photo'] = 'images/veterinary.jpg';
    } elseif (in_array('pet stores', $categories)) {
        $feature['properties']['photo'] = 'images/petshop2.jpg';
    } else {
        $feature['properties']['photo'] = 'images/default2.avif'; // Default photo
    }
}

echo json_encode(['petShops' => $results]);
