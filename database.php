<?php  
 
 class database{

     //properties
     private $host;
     private $dbh;
     private $user;
     private $pass;
     private $db;
    
     function __construct(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'moneyz';

        try{
            
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
        }catch(PDOException $e){
            
            die("Unable to connect: " . $e->getMessage());
        }
    }

    public function insert($sql, $named_placeholder_array){
        

        try{
            
            $this->dbh->beginTransaction();

            $statement = $this->dbh->prepare($sql);
            $statement->execute($named_placeholder_array);

            
            $this->dbh->commit();
        }catch(Exception $e){
            
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function login($uname, $psw){

        $sql = "SELECT id, username, password FROM users WHERE username = :username";

        $stmt = $this->dbh->prepare($sql);

        $stmt->execute([
            'username'=>$uname,
        ]);

        // haal database op uit de database
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($result) && count($result) > 0){
            

            if($uname && password_verify($psw, $result['password'])){
                session_start();

                $_SESSION['ID'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['is_logged_in'] = true;

                $date = date("Y-m-d H:i:s");
                $msg = "User " . $result['username'] . " logged in at $date";
                
                // schrijven van informatie naar een log bestand (user informatie en errors bijhouden)
                error_log($msg, 3, "log_bestand.log");

                header("location: welcome.php");// gaan we later mee verder


            }else{
                echo 'Username and/or password is incorrect. Please fix your input errors and try again';
            }
                
           
        }else{
            // nooit vermelden dat username of wachtwoord incorrect is. als een van de twee klopt, dan hoeft de hacker slechts 1 te raden.
            echo 'Username and/or password is incorrect. Please fix your input errors and try again.';
        }
    }
}    
 
 
 
 
 
 
 
 
 
 
 
 
 ?>