<?php
class post {
    //db stuff 
    private $conn;
    private $table ='posts';
    // post propretiers
    public $id;
    public $category_id;
    public $title;
    public $body;
    public $author;
    public $create_at;
    //contructor with db connection 
    public function __construct($db){
        $this->conn =$db;

    }
    //getting posts from our database
    public function read() {
        //create query
        $query ='SELECT C.name as category_name,
        p.id,
        p.catigory_id,
        p.title,
        p.body,
        p.author,
        p.created_at  FROM ' .$this->table . ' p 
        LEFT JOIN 
        categories c ON p.category_id =c.id ORDER BY p.created_at DESC';
        //prepare statement
        $stmt =$this->conn->prepare($query);
        //execute query
        $stmt->execute();
        return $stmt;
    }
    public function read_single(){
        $query ='SELECT C.name as category_name,
        p.id,
        p.catigory_id,
        p.title,
        p.body,
        p.author,
        p.created_at  FROM ' .$this->table . ' p 
        LEFT JOIN 
        categories c ON p.category_id =c.id WHERE  p.id =? LIMIT 1';
        //prepare statement
        $stmt =$this->conn->prepare($query);
        //binding param
        $stmt->bindParam(1,$this->id);
        //execute the query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title =$row ['title'];
        $this->body =$row ['body'];
        $this->author =$row ['author'];
        $this->category_name =$row ['category_name'];
    
    
    
    }
        
    }
