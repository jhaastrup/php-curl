<?php
/**
 * Discription:This file helps you make API calls in php using curl
 *  Author: Adejoke Haastrup
 * Email : jhaastrup21@gmail.com
 * Only edit this file if you know what you are doing.
 */

 class makeApiCall{

    //Use this function to be able to make a post request. 
    /**
     * This function takes 3 parameters
     * url: your api url endpoint 
     * data: body of data you are post should be in JSON format. 
     * api_key: Access token if required for the endpoint you are posting to
     */

     //if your api endpoint do not require this, you can edit this and make it suitable for you.

    public function post_to_api_by_curl($url, $data, $api_key)
    {
        $ch = curl_init($url);
        // Setup request to send json via POST.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:' . $api_key));
        // Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        // Print response.
        return $result;
    } 

    //Use this function to make a get request.
    /**
     * This function takes one parameter 
     * url: the api endpoint you want to get data from.
     */

    public function get_api_response_by_curl($url)
    {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($handle);
        curl_close($handle);
        return $output;
    } 

    
      //use this function to make a get request that requires headers
      /**
       * This function takes two parameters 
       * url: your api url endpoint 
       * request_headers: what ever custom headers you want to set before makin the get request.
       */

    public function get_api_response_with_header($url, $request_headers){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        $season_data = curl_exec($ch);
        if (curl_errno($ch)) {
            print "Error: " . curl_error($ch);
            exit();
        }
        // Show me the result
        curl_close($ch);
        return $season_data;

    }


 }




?>