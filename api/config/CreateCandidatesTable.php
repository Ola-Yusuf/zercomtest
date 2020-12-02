<?php 
    class CreateCandidatesTable extends Db_connect {
       
      public function __construct(){
            parent::__construct();
            $this->selectDatabase();
             //create candidates table
            $query =  "CREATE TABLE IF NOT EXISTS `candidates` (
                              `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
                              `candidate_name` varchar(255) NOT NULL,
                              `center_id` int(11) NOT NULL,
                              `category_id` int(11) NOT NULL,
                              PRIMARY KEY (`candidate_id`),
                              FOREIGN KEY (center_id) REFERENCES centers(center_id),
                              FOREIGN KEY (category_id) REFERENCES categories(category_id)
                            )ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19";
            $this->conn->exec($query);
            echo "Candidates table created successfully<br>";
        }

        public function addTestData(){
          parent::__construct();
          $this->selectDatabase();
            //add data to candidates tables
            try {
          $query = "INSERT INTO `candidates` (`candidate_id`, `candidate_name`, `center_id`, `category_id`) VALUES 
                      (1, 'John Smith', 1,1),
                      (2, 'Cook Stone', 3,2),
                      (3, 'Faith Water', 2,3),
                      (4, 'Luke Ben', 2,1),
                      (5, 'Henry Fat', 4,2),
                      (6, 'Third Seat', 3,3),
                      (7, 'Adam Stev', 4,1),
                      (8, 'Path Norway', 3,2),
                      (9, 'Eden Vert', 2,3),
                      (10, 'Petunia Kate ', 1,3)
                      ";
          $this->conn->exec($query);
          echo "Test data added to Candidates table successfully <br>";
        }catch(PDOException $e) {
          echo $query . "<br>" . $e->getMessage();
        }
      }
    }  
?>


