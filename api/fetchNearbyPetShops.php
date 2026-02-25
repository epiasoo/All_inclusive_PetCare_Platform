<?php

if (!isset($_GET['lat']) || !isset($_GET['lon'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid parameters']);
    exit;
}

$latitude = $_GET['lat'];
$longitude = $_GET['lon'];

$mapboxAccessToken = 'your_token';
$searchQuery = 'pet';

$url = "https://api.mapbox.com/search/searchbox/v1/category/pet_store?proximity=$longitude,$latitude&limit=10&access_token=$mapboxAccessToken";

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

    $category = $feature['properties']['feature_type'] ?? '';

    if (stripos($category, 'veterinary') !== false) {
        $feature['properties']['photo'] = 'images/veterinary.jpg';
    } elseif (stripos($category, 'pet') !== false) {
        $feature['properties']['photo'] = 'images/petshop2.jpg';
    } else {
        $feature['properties']['photo'] = 'images/default2.avif';
    }
}

echo json_encode(['petShops' => $results]);
