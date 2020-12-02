<?php

// Include action.php file
require_once 'Db_connect.php';
require_once 'CreateDatabase.php';
require_once 'CreateCentersTable.php';
require_once 'CreateCategoriesTable.php';
require_once 'CreateCandidatesTable.php';
require_once 'CreateSubjectsTable.php';


// Create object of Users class
$database = new CreateDatabase();

//centers
$CenterTable = new CreateCentersTable();
$CenterTable->addTestData();
$CenterTable->closeDbConnection();

//category
$CategoryTable = new CreateCategoriesTable();
$CategoryTable->addTestData();
$CategoryTable->closeDbConnection();

//subject
$SubjectTable = new CreateSubjectsTable();
$SubjectTable->addTestData();
$SubjectTable->closeDbConnection();

//candidate
$CandidateTable = new CreateCandidatesTable();
$CandidateTable->addTestData();
$CandidateTable->closeDbConnection();
