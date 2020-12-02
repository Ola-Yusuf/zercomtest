<?php
require_once './config/Db_connect.php';
    class Candidate extends Db_connect{

        // Table
        private $db_table = "candidates";

        // Columns
        public $candidate_id;
        public $candidate_name;
        public $center_id;
        public $category_id;


        // Db connection
        public function __construct(){
          parent::__construct();
          $this->selectDatabase();
        }
        
        // GET Candidate/Student and their Centers
        public function getCandidateAndTheirCenter(){
            $sqlQuery = "SELECT
                        candidate_id, candidate_name, center_name
                        -- ,center_id, category_id
                      FROM
                        ". $this->db_table ."
                    LEFT JOIN centers 
                    ON centers.center_id = candidates.center_id";

            $stmt = $this->conn->prepare($sqlQuery);
            
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 

      // GET Candidate/Student and their Subject
      public function getAllCandidateAndCategory(){
        $sqlQuery = "SELECT
                    candidate_id, candidate_name, center_id, candidates.category_id, category_name
                  FROM
                    ". $this->db_table. " 
                  LEFT JOIN categories 
                  ON categories.category_id = candidates.category_id
                  ";

        $stmt = $this->conn->prepare($sqlQuery);
        
        $stmt->execute();
        
        return $stmt->fetchAll();

    }

    // GET all subject of a candidate base on category
    public function getAllSubjectByCategory($candidate_category_id){
      $sqlQuery = "SELECT *
                FROM subjects
                WHERE category_id = ". $candidate_category_id;

      $stmt = $this->conn->prepare($sqlQuery);
      
      $stmt->execute();
      
      return $stmt->fetchAll();
  }
      
      // GET Candidate/Student offering Science Subjects 
      public function getCandidateOfferingScienceSubject(){
        $sqlQuery = "SELECT
                    candidate_id, candidate_name
                    -- , center_id, category_id
                  FROM
                    ". $this->db_table ."
                LEFT JOIN categories 
                ON categories.category_id = candidates.category_id
                WHERE candidates.category_id = 1";

        $stmt = $this->conn->prepare($sqlQuery);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

      // GET Candidate/Student Offering Commercial subjects
      public function getCandidateOfferingCommercialSubjects(){
        $sqlQuery = "SELECT
                    candidate_id, candidate_name
                    -- , center_id, category_id
                  FROM
                    ". $this->db_table ."
                LEFT JOIN categories 
                ON categories.category_id = candidates.category_id
                WHERE candidates.category_id = 3";

        $stmt = $this->conn->prepare($sqlQuery);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     // GET Candidate/Student Offering Art Subjects
     public function getCandidateOfferingArtSubjects(){
      $sqlQuery = "SELECT
                  candidate_id, candidate_name
                  -- , center_id, category_id
                FROM
                  ". $this->db_table ."
              LEFT JOIN categories 
              ON categories.category_id = candidates.category_id
              WHERE candidates.category_id = 2";

      $stmt = $this->conn->prepare($sqlQuery);
      
      $stmt->execute();
      
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

    }
?>

