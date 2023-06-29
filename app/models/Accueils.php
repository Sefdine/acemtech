<?php
class Accueils {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT * FROM posts ORDER BY published_at DESC');
        return $this->db->resultSet();
    }

    public function postsByUsers(){
        $this->db->query("SELECT * 
                               FROM (
                               SELECT p.*, u.id, u.firstname, u.lastname, u.bio, u.created_at, u.picture_name
                               FROM posts p INNER JOIN users u ON p.user_id = u.id) AS uposts ORDER BY published_at DESC");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function nbrOfRows(){
        $this->db->query("SELECT COUNT(*) AS nb_posts FROM posts");
        $this->db->execute();
        return $this->db->fetchColumn();
    }

    public function pagination($first_page, $nb_post_page){
        $this->db->query("SELECT *, ROW_NUMBER() OVER (ORDER BY published_at DESC) AS counter
                               FROM (
                               SELECT p.*, u.id, u.firstname, u.lastname, u.bio, u.created_at, u.picture_name
                               FROM posts p INNER JOIN users u ON p.user_id = u.id) AS uposts LIMIT :first_page,:nb_post_page");
        $this->db->bind(':first_page', $first_page);
        $this->db->bind(':nb_post_page', $nb_post_page);

        if($this->db->execute()) {
            return $this->db->resultSet();
        } else {
            return false;
        }


    }
}
