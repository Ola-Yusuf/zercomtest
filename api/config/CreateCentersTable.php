<?php 
    class CreateCentersTable extends Db_connect {
       
      public function __construct(){
            parent::__construct();
            $this->selectDatabase();
             //create centers table
            $query =  "CREATE TABLE IF NOT EXISTS `centers` (
                              `center_id` int(11) NOT NULL AUTO_INCREMENT,
                              `center_name` varchar(255) NOT NULL,
                              PRIMARY KEY (`center_id`)
                            )ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19";
            $this->conn->exec($query);
            echo "Centers table created successfully<br>";
        }

        public function addTestData(){
          parent::__construct();
          $this->selectDatabase();
            //add data to centers tables
            try {
          $query = "INSERT INTO `centers` (`center_id`, `center_name`) VALUES 
                      (1, 'Lagos'),
                      (2, 'Osun'),
                      (3, 'Kwara'),
                      (4, 'Ogun')
                      ";
          $this->conn->exec($query);
          echo "Test data added to Subjects table successfully <br>";
        }catch(PDOException $e) {
          echo $query . "<br>" . $e->getMessage();
        }
      }
    }  
?>


