<?php
// Get the contents of the audio file
$audioContent = file_get_contents("/home/vol1_7/infinityfree.com/if0_35974593/htdocs/test.mp4");

// Convert audio content to base64
$base64Audio = base64_encode($audioContent);

// Prepare JSON data
$jsonData = array("audio_data" => $base64Audio);

// Encode JSON
$jsonString = json_encode($jsonData);

// Save JSON to file
file_put_contents("/home/vol1_7/infinityfree.com/if0_35974593/htdocs/test.json", $jsonString);

// Return response
echo "Success";
?>
