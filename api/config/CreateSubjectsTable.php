<?php 
    class CreateSubjectsTable extends Db_connect {
       
      public function __construct(){
            parent::__construct();
            $this->selectDatabase();
             //create subjects table
            $query =  "CREATE TABLE IF NOT EXISTS `subjects` (
                              `subject_id` int(11) NOT NULL AUTO_INCREMENT,
                              `subject_name` varchar(255) NOT NULL,
                              `category_id` int(11) NOT NULL,
                              PRIMARY KEY (`subject_id`),
                              FOREIGN KEY (`category_id`) REFERENCES categories(`category_id`)
                            )ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19";
            $this->conn->exec($query);
            echo "Subjects table created successfully<br>";
        }

        public function addTestData(){
          parent::__construct();
          $this->selectDatabase();
            //add data to subjects tables
            try {
          $query = "INSERT INTO `subjects` (`subject_id`, `subject_name`, `category_id`) VALUES 
                      (1, 'Mathematics', 1),
                      (2, 'English', 2),
                      (3, 'CRK', 1),
                      (4, 'IRK', 2),
                      (5, 'Civic Education', 1),
                      (6, 'Economics', 3),
                      (7, 'French', 3),
                      (8, 'General Paper', 1),
                      (9, 'Yoruba', 2),
                      (10, 'Igbo ', 2),
                      (11, 'Hausa', 1),
                      (12, 'Chemistry', 2),
                      (13, 'Physics', 2),
                      (14, 'Biology', 1),
                      (15, 'Geography', 3),
                      (16, 'Agric Science', 3),
                      (17, 'Book keeping', 3),
                      (18, 'Computer', 3),
                      (19, 'Home Economics', 1),
                      (20, 'Business Study', 2)
                      ";
          $this->conn->exec($query);
          echo "Test data added to Subjects table successfully <br>";
        }catch(PDOException $e) {
          echo $query . "<br>" . $e->getMessage();
        }
      }
    }  
?>


