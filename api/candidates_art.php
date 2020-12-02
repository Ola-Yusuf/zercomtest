<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'model/Candidate.php';

    $candidate = new Candidate();
    $candidate->selectDatabase();

    $response = $candidate->getCandidateOfferingArtSubjects();
    $candidate->closeDbConnection();

    // if($candidate->name != null){
        // // create array
        // $emp_arr = array(
        //     "id" =>  $candidate->id,
        //     "name" => $candidate->name,
        // );
      
        http_response_code(200);
        // $success['mentee'] = $emp_arr;
        echo json_encode($response);
    // }
      
    // else{
    //     http_response_code(404);
    //     $error['error'] = "Candidate not found.";
    //     echo json_encode($error);
    // }
?>