<?php

class Post{
    private $db;
    public function __construct(){
        $this->db =new Database();

    }
    public function getPosts(){
        $this->db->query('select *, 
                                posts.id as postid,
                                users.id as userid,
                      posts.created_at as postcreated,
                      users.creates_at as usercreated
                                 FROM posts
                                 INNER JOIN users
                                 ON posts.user_id = users.id
                                 ORDER BY posts.created_at DESC');

        $result = $this->db->resultSet();
        return $result;
    }

    public function addPost($data){
        $this->db->query("INSERT INTO posts(user_id, tittle, body) VALUES(:user_id,:title,:body)");

// to conect data
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        // to  enshure that Execute stmt in data base file
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function updatePost($data){
        $this->db->query('UPDATE posts SET tittle = :title, body = :body WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    public function getPostById($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        $row= $this->db->single();
        return $row;
    }
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id ');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}
?>
