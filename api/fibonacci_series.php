<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $fbNum = isset($_GET['fbNum']) ? $_GET['fbNum'] : die();

    $firstNum = 0; 
    $secondNum = 1; 
    
    $counter = 0; 
    $response ='';
    while ($counter < $fbNum){ 
            if( $response == ''){
                $response = ' '.$firstNum;
            }else{
                $response = $response.' '.$firstNum;
            } 
            $thirdNum = $secondNum + $firstNum; 
            $firstNum = $secondNum; 
            $secondNum = $thirdNum; 
            $counter = $counter + 1; 
    } 
 
    http_response_code(200);
    echo json_encode($response);
?>