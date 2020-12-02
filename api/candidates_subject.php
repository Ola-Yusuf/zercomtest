<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'model/Candidate.php';

    $candidate = new Candidate();
    $candidate->selectDatabase();

    $allCandidate = $candidate->getAllCandidateAndCategory();
    $response = [];

    foreach ($allCandidate as $key => $value) {
        $response[$key]['name'] = $value['candidate_name'];
        $response[$key]['category'] = $value['category_name'];
        $cand_subject = $candidate->getAllSubjectByCategory($value['category_id']);
        foreach ($cand_subject as $keySubj => $valueSubj) {
            $response[$key]['subject'][$keySubj ]['subject_id'] = $valueSubj['subject_id'];
            $response[$key]['subject'][$keySubj ]['category_id'] = $valueSubj['category_id'];
            $response[$key]['subject'][$keySubj ]['subject_name'] = $valueSubj['subject_name'];
        }
    }
    $candidate->closeDbConnection();
    http_response_code(200);
    echo json_encode($response);
?>