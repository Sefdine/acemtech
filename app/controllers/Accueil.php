<?php
class Accueil extends Controller {

    private $accueilModel;
    private $userModel;

    public function  __construct(){
        $this->accueilModel = $this->model('Accueils');
        
    }
    public function index() {
        $accueilModel = $this->model('Accueils');
       // $this->userModel = $this->model('Utilisateur');
        


       // $user = $userMoedl->getUserById($_SESSION['user_id']);
        $posts = $accueilModel->postsByUsers();

        $data = [
            'current_home' => 'current',
            'posts' => $posts,
            //'user' => $user
        ];

        $this->view('pages/index', $data);
    }

    public function article() {
        $this->view('pages/article');
    }

    public function page($current_page){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            // Total posts in databse
            $nb_posts = (int) $this->accueilModel->nbrOfRows();
            // Post number per page
            $nbr_post_page = 5;
            // Total of pages
            $total_pages = ceil($nb_posts / $nbr_post_page);
            // First page
            $first_page = ($current_page * $nbr_post_page) - $nbr_post_page;
            if($this->accueilModel->pagination($first_page, $nbr_post_page) != false){
                $posts = $this->accueilModel->pagination($first_page, $nbr_post_page);
                $data = [
                    'posts' => $posts,
                    'nb_pages' => $nb_posts,
                    'total_pages' => $total_pages,
                    'current_page' => $current_page
                ];
                $this->view('pages/page', $data);
            } else {
                redirect('pages/accueil');
            }
        } else {
            die('no more posts');
        }

        $this->view('pages/page');
    }


}
