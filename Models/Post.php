<?php

class Post
{
    /**
     * table
     */
    public static $table = 'posts';

    /**
     * attributes
     */
    public $id;
    public $name;
    public $categoryId;
    public $categoryName;
    public $content;
    public $author;

    /**
     * constructor
     */
    public function __construct($parsms)
    {
        extract($parsms);
        $this->id = $id;
        $this->name = $name;
        $this->content = $content;
        $this->categoryId = $category_id;
        $this->categoryName = $category_name;
        $this->author = $author;
    }

    /**
     * return collection of object
     */
    private static function collection($params)
    {
        return new Post($params);
    }

    /**
     * create new post
     */
    public static function create($params)
    {
        $database = new Database;
        $connection = $database->connect();
        extract($params);
        $query = 'INSERT INTO ' . Post::$table . '(
                name,
                author,
                content,
                category_id
            )VALUES(
                :name,
                :author,
                :content,
                :category_id
            )';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":author",$author);
        $stmt->bindParam(":content",$content);
        $stmt->bindParam(":category_id",$category_id);
        $result = $stmt->execute();
        if($result){
            return $connection->lastInsertId();
        }else{
            return false;
        }

    }

    /**
     * save post object
     */
    public function save()
    {
        $database = new Database;
        $connection = $database->connect();
        $query = 'INSERT INTO  ' . Post::$table . '(
                name,
                author,
                content,
                category_id
            )VALUES(
                :name,
                :author,
                :content,
                :category_id
            )';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":author",$this->author);
        $stmt->bindParam(":content",$this->content);
        $stmt->bindParam(":category_id",$this->category_id);
        $result = $stmt->execute();
        if($result){
            return $connection->lastInsertId();
        }else{
            return false;
        }
    }

    /**
     * get all posts
     */
    public static function all()
    {
        $database = new Database;
        $connection = $database->connect();
        $query = 'SELECT
            p.id,
            p.name,
            p.author,
            p.content,
            p.category_id,
            c.name as category_name
        FROM ' . Post::$table . ' p
        LEFT JOIN categories c ON p.category_id = c.id';
        $result = $connection->query($query);
        if ($result) {
            $posts = $result->fetchAll(PDO::FETCH_ASSOC);
            $resultObjects = [];
            foreach($posts as $post){
                $resultObjects[] = Post::collection($post);
            }
            return $resultObjects;
        } else {
            return false;
        }
    }

    /**
     * find post by id
     */
    public static function find($id)
    {
        $database = new Database;
        $connection = $database->connect();
        $query = 'SELECT
            p.id,
            p.name,
            p.author,
            p.content,
            p.category_id,
            c.name as category_name
        FROM ' . Post::$table . ' p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE p.id=:id';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $result = $stmt->execute();
        if ($result) {
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            return Post::collection($post);
        } else {
            return false;
        }
    }

    /**
     * update post by id
     */
    public function update($params)
    {
        $database = new Database;
        $connection = $database->connect();
        $query = 'UPDATE ' . Post::$table . ' SET
            name = :name,
            author = :author,
            content = :content,
            category_id = :category_id
        WHERE id = :id';
        $stmt = $connection->prepare($query);
        extract($params);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":category_id", $category_id);
        $stmt->bindParam(":id", $this->id);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete post
     */
    public function delete()
    {
        $database = new Database;
        $connection = $database->connect();
        $query = 'DELETE FROM ' . Post::$table . ' WHERE id = :id';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
