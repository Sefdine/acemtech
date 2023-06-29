<?php

/**
 * Class Post
 *
 * @package \\${NAMESPACE}
 */
class Post
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPost($data){
        $this->db->query('INSERT INTO posts(post_id, user_id, title, intro, body, category, img_name, desc_img) VALUES(NULL,:user_id, :title, :intro, :body, :category, :img_name, :desc_img)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
      	$this->db->bind(':intro', $data['intro']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':img_name', $data['filename']);
        $this->db->bind(':desc_img', $data['desc-img']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editerPost($data){
        $this->db->query("UPDATE posts SET title = :title, intro = :intro, body = :body, category = :category, img_name = :img_name, desc_img = :desc_img WHERE post_id = :id");

        $this->db->bind(':title', $data['title']);
      	 $this->db->bind(':intro', $data['intro']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':img_name', $data['filename']);
        $this->db->bind(':desc_img', $data['desc_img']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePostNoImage($data){
        $this->db->query("UPDATE posts SET title = :title, intro = :intro, body = :body, category = :category, desc_img = :desc_img WHERE post_id = :id");

        $this->db->bind(':title', $data['title']);
      	$this->db->bind(':intro', $data['intro']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':desc_img', $data['desc_img']);


        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostsByUser($user_id)
    {
        $this->db->query("SELECT p.*, u.id as userID, u.firstname as fname, u.lastname as lname
                               FROM posts p INNER JOIN users u ON 
                               p.user_id = u.id WHERE u.id = :user_id ORDER BY p.published_at DESC");
        $this->db->bind(':user_id', $user_id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getPostById($post_id){
        $this->db->query("SELECT * FROM posts WHERE post_id = :post_id");
        $this->db->bind('post_id', $post_id);

        return $this->db->single();
    }

    public function categorie($category){
        $this->db->query("SELECT * FROM posts WHERE category LIKE CONCAT('%', :category, '%') ");
        $this->db->bind(':category', $category);

        return $this->db->resultSet();
    }

    public function findByKeyword($keyword){
        $keywordBind = NULL;
        // Split the string to search
        $keywords = array_merge(preg_split('/\s+/', $keyword, PREG_SPLIT_NO_EMPTY));
        //print_r($keywords);
        $numKeywords = count($keywords);
        if($numKeywords == 1){
            $keywordBind = $keyword;
        } else {
            for ($i = 0; $i < $numKeywords; $i++) {
                $keywordBind .= "," . $keywords[$i] . " ";
            }
        }
        //echo $keywordBind;

        // IN BOOLEAN MODE when we want
        $this->db->query("select * from posts where match(body) against(:search IN BOOLEAN MODE) UNION
select * from posts where title LIKE CONCAT('%', :search, '%')");

        $this->db->bind(':search', $keywordBind);

        if($this->db->execute()){
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function deletePost($post_id){
        $this->db->query("DELETE FROM posts WHERE post_id = :post_id");
        $this->db->bind(':post_id', $post_id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
