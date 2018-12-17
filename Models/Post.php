<?php
class Post
{
    /**
     * connection
     */
    public $connection;

    /**
     * table
     */
    public $table = 'posts';

    /**
     * attributes
     */
    public $id;
    public $name;
    public $content;
    public $categoryId;
    public $categoryName;
    public $cotent;
    public $author;

    /**
     * constructor
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * create new post
     */
    public function create()
    {

    }

    /**
     * get all posts
     */
    public function all()
    {
        $query = 'SELECT
            p.id,
            p.name,
            p.author,
            p.content,
            p.category_id,
            c.name as category
        FROM ' . $this->table . ' p
        LEFT JOIN categories c ON p.category_id = c.id';
        $result = $this->connection->query($query);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    /**
     * find post by id
     */
    public function find($id)
    {

    }

    /**
     * update post by id
     */
    public function update($id)
    {

    }

    /**
     * delete post
     */
    public function delete($id)
    {

    }
}
