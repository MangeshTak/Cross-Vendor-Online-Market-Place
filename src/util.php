<?php
/* Created by huyvo 11/26/2017*/

function httpPost($url,$params)
{
    $postData = '';
    //create name value pairs seperated by &
    foreach($params as $k => $v)
    {
        $postData .= $k . '='.$v.'&';
    }
    $postData = rtrim($postData, '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;

}
function curl_login($loginData, $url){
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $loginData,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIESESSION => true,
        CURLOPT_COOKIEJAR => 'cookie.txt'
    ));
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}


function httpFetchPost($url){
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIESESSION => true,
        CURLOPT_COOKIEJAR => 'cookie.txt'
    ));
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}


?>