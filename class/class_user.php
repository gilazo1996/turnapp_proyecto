<?php
class User
{
    //BD DE PRUEBA
    private $dbHost = 'localhost';
    private $dbUsername = 'root';
    private $dbPassword = '';
    private $dbName = 'turn_app_base';
    private $userTbl = 'user';
    
    public function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die('Failed to connect with MySQL: '.$conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }
    
    
    public function checkUser($userData = array())
    {
        if (!empty($userData)) {
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE email = '".$userData['email']."'";
        
            $prevResult = $this->db->query($prevQuery);
            if ($prevResult->num_rows > 0) {
                // Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET username = '".$userData['first_name']."', email = '".$userData['email']."'";
                $update = $this->db->query($query);
            } else {
                // Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET username = '".$userData['first_name']."', email = '".$userData['email']."'";
                $insert = $this->db->query($query);
            }
            // Get the user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }

        
        // Return the user data
        return $userData;
    }
    
}
