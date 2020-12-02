<?php 
    class CreateCategoriesTable extends Db_connect {
       
      public function __construct(){
            parent::__construct();
            $this->selectDatabase();
             //create categories table
            $query =  "CREATE TABLE IF NOT EXISTS `categories` (
                              `category_id` int(11) NOT NULL AUTO_INCREMENT,
                              `category_name` varchar(255) NOT NULL,
                              PRIMARY KEY (`category_id`)
                            )ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19";
            $this->conn->exec($query);
            echo "Centers table created successfully<br>";
        }

        public function addTestData(){
          parent::__construct();
          $this->selectDatabase();
            //add data to categories tables
            try {
          $query = "INSERT INTO `categories` (`category_id`, `category_name`) VALUES 
                      (1, 'Science'),
                      (2, 'Art'),
                      (3, 'Commercial')
                      ";
          $this->conn->exec($query);
          echo "Test data added to Subjects table successfully <br>";
        }catch(PDOException $e) {
          echo $query . "<br>" . $e->getMessage();
        }
      }
    }  
?>


