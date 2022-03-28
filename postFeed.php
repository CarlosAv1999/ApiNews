<?php
include_once 'alloycors.php';
$feeds = $_GET['feeds'];
//$url = $_GET['url'];
//$name = $_GET['name'];

$urlf = json_decode($feeds);

for($i = 0; $i<count($urlf); $i++){
    $obj =  $urlf[$i];
    $url = $obj->url;
    $name = $obj->category;


/*
echo "-------------------------------------------------------------------------------";
echo "<br>";
print_r($urlf);
echo "<br>";
echo "-------------------------------------------------------------------------------";
*/

//echo "<br>";
//echo "----------------------------------------------------------------------------------------------------";
//echo "categoria: " .$name;

//The url you wish to send the POST request to
$urla = "http://localhost:5000/ApiNews/addFeed.php";

//The data you want to send via POST
$fields = [
    'url'       => $url,
    'name'      => $name,
    'btnSubmit' => 'Submit'
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $urla);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
echo $result;
}
?>