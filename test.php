<?php
// require the api file
include('api.php');

//make a get request to spotify api to get all arts

//initilaize the api class.
$api_obj = new makeApiCall();

$url = "https://jsonplaceholder.typicode.com/todos/1";
$api_response = $api_obj->get_api_response_by_curl($url);
//vardump the response 
var_dump($api_response);

echo 'helo world';

?>