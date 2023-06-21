<?php
// Get the search query from the client-side code
$searchQuery = $_GET['searchQuery'];

// Set up the URL for the Edamam API request
$url = "https://api.edamam.com/api/recipes/v2?type=public&q=${searchQuery}&app_id=5d7d4959&app_key=b4d4160b0506d6df4049a27f37675909";

// Make the request to the Edamam API
$response = @file_get_contents($url);

if ($response === false) {
  // An error occurred while making the API request
  $error = error_get_last();
  $errorMessage = $error['message'];

  // Send an error response back to the client-side code
  header('Content-Type: application/json');
  http_response_code(500);
  echo json_encode(['error' => $errorMessage]);
} else {
  // Forward the response back to the client-side code
  header('Content-Type: application/json');
  echo $response;
}
?>