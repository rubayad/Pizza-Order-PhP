<?php
// To save time we are going to create a hold the database connection
class Database{
    // A private keyword, as the name suggests is the one that can only be accessed from within the class is defined
    private $connection;
    function __construct(){
        $this->connect_db();
    }

    public function connect_db(){
        $this->connection = mysqli_connect('172.31.22.43', 'Rubayad200550045', 'DW3YsyvRqh', 'Rubayad200550045');
        if(mysqli_connect_error()){
            die("Database connection failed" . mysqli_connect_error());
        }
    }

    public function create($pizza, $fname, $lname, $phone, $email){
        $sql = "INSERT INTO pizzas (pizza, fname, lname, phone, email) VALUES ('$pizza', '$fname', '$lname', '$phone', '$email')";
        $res = mysqli_query($this->connection, $sql);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function read($id=null){
        $sql = "SELECT * FROM pizzas";
        if($id){
            $sql .= " WHERE id=$id";
        }
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    /* 
    * This function has two parameters:
    * the $input parameter is an associative array
    * the $fields parameter is an array that specifies a list of fields with rules
    * */
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }


}
$database = new Database();

?>