<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Utilisateurs extends Controller {
    private $modelUtilisateur;
    private $postModel;

    public function __construct(){
        $this->modelUtilisateur = $this->model('Utilisateur');
        $this->postModel = $this->model('Post');
    }

  // COMMENT AND UNCOMMENT THIS TO ENABE=LE USER SIGN UP
 	
    public function inscription(){
        /*
         * Check submit, check inputs, validate inputs, check errors
         * if everything is clean call model register function
         * if registered print success message
         
		*/
//        Check if submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            Process form
//            Sanitize filter
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//            Init data
            $data = [
                'current_register'  => 'current',
                'firstname'         => trim($_POST['firstname']),
                'lastname'          => trim($_POST['lastname']),
                'email'             => trim($_POST['email']),
                'password'          => trim($_POST['password']),
                'confirm_password'  => trim($_POST['confirm_password']),
                'bio'               => trim($_POST['bio']),
                'firstname_err'     => '',
                'lastname_err'      => '',
                'email_err'         => '',
                'password_err'      => '',
                'confpass_err'      => '',
                'bio_err'           => ''
            ];

//            Validate inputs
            if(empty($data['firstname'])){
                $data['firstname_err'] = 'Nom obligatoire<sup>*</sup>' ;
            }

            if(empty($data['lastname'])){
                $data['lastname_err'] = 'Prénom obligatoire<sup>*</sup>';
            }

            if(empty($data['email'])){
                $data['email_err'] = 'Email obligatoire<sup>*</sup>' ;
            } elseif ($this->modelUtilisateur->findUserByEmail($data['email'])){
                $data['email_err'] = 'Email déjà utilisé! Merci de vous connecter';
                flash('email_err', 'Email déjà utilisé! Connectez-vous!');
                redirect('utilisateurs/connexion');
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Mot de passe obligatoire';
            } elseif(strlen($data['password']) < 7){
                $data['password_err'] = 'Mot de passe doit avoir au moins 7 caractères';
            } elseif(!empty($data['confirm_password']) && $data['password'] != $data['confirm_password']) {
                $data['confpass_err'] = 'Les mots de passe ne correspondent pas';
            } elseif(empty($data['confirm_password'])){
                $data['confpass_err'] = 'Merci de confirmer votre mot de passe';
            }

            if(empty($data['bio'])){
                $data['bio_err'] = 'Intro ou bio obligatoire<sup>*</sup>';
            }

            if(empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confpass_err']) & empty($data['bio_err'])){
//                Validate form
//                Hash password using $pepper
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->modelUtilisateur->inscription($data)){
                    flash('inscription_reussi', 'Vous êtes inscrit. Vous pouvez-vous connectez!');
                    redirect('utilisateurs/connexion');
                } else {
                    die('Une erreur est survenue. Merci de réessayer!');
                }

            } else {
                $this->view('utilisateurs/inscription', $data);
            }
        } else {
            $data = [
                'current_register'  => 'current',
                'firstname'         => '',
                'lastname'          => '',
                'email'             => '',
                'password'          => '',
                'confirm_password'  => '',
                'firstname_err'   => '',
                'lastname_err'      => '',
                'email_err'         => '',
                'password_err'      => '',
                'confpass_err'      => '',
                'bio_err'           => ''
            ];
            $this->view('utilisateurs/inscription', $data);
        }
    }
 


    public function connexion() {
//        Check if post submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            Validate form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//            Initialise data
            $data = [
                'current_login' => 'current',
                'email'         => trim($_POST['email']),
                'password'      => trim($_POST['password']),
                'email_err'     => '',
                'password_err'  => ''
                ];
//            Validate data
            if(empty($data['email'])){
                $data['email_err'] = 'Veuillez entrer votre email';
            }
            if(empty($data['password'])){
                $data['password_err'] = 'Veuillez saisir votre mote de passe';
            }

//            Make sure no errors and user exists
            if(empty($data['email_err']) && empty($data['password_err']) && $this->modelUtilisateur->findUserByEmail($data['email'])){
                $loggedInUser = $this->modelUtilisateur->connexion($data['email'], $data['password']);
                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                    $now = time();
                } else {
                    $data['password_err'] = 'Mot de passe incorrect. Veuillez réessayer';
                    $this->view('utilisateurs/connexion', $data);
                }
            } else {
                $this->view('utilisateurs/connexion', $data);
            }

        } else {
            $data = [
                'current_login' => 'current',
                'email_err'     => '',
                'password_err'  => ''
            ];
            $this->view('utilisateurs/connexion', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id']     = $user->id;
        $_SESSION['user_email']  = $user->email;
        $_SESSION['user_fname']  = $user->firstname;
        $_SESSION['user_lname']  = $user->lastname;
        $_SESSION['user_joined_at']   = $user->created_at;
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
        $_SESSION['user_bio']         = $user->bio;
        redirect('posts/index');
    }

    public function profile($user_id){
        $user = $this->modelUtilisateur->getUserById($user_id);
        $posts = $this->postModel->getPostsByUser($user_id);

        $data = [
            'posts' => $posts,
            'user' => $user
        ];

        $this->view('utilisateurs/info', $data);
    }
    public function supprimerCompte($id) {
        if(isLoggedIn()) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // SANITIZING INPUT
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                /*
                    Getting the value of the profile image to delete
                    VALUE FROM HIDDEN INPUT
                */
                $img_name = trim($_POST['img-name']);
                $filename = SITE_ROOT . DIRECTORY_SEPARATOR . "storage/profiles" . DIRECTORY_SEPARATOR . $img_name;
                if($this->modelUtilisateur->deleteUserById($id)){
                    // Delete the profile image in the server
                    unlink($filename);
                    flash('user_del_success', 'Votre compte a bien été supprimer!');
                    redirect('utilisateurs/inscription');
                    session_destroy();

                }
                else {
                    die('Une erreur est survenue. Merci de ressayer plus tard');
                }
            }
        }
    }

    public function sendMail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fullname' => $_POST['nom_prenom'],
                'email'     => $_POST['email'],
                'subject'   => $_POST['subject'],
                'message'   => $_POST['message']
            ];


            // Instanciating PHPMailer and passing true to enable showing exceptions
            $mail = new PHPMailer(true);

            try {
                
            // SMTP Configuration
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'cpanel.yourhostingprovider.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'email@yourdomaincom';                     //SMTP username
            $mail->Password   = 'yoursmtppassword';                               //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;  
            
            
            // Specifying PHPMailer headers
            $mail->setFrom($data['email'], $data['fullname']);
            $mail->addAddress('email@yourdomaincom');     //Server Mail
           
            // Content
            
            $mail->Subject = $data['subject'];
            $mail->Body = $data['message'];
           
            
            $mail->send();
            flash('mail_sent', 'Nous avons bien reçu votre message. Nous vous contacterons le plus vite possible', 'alert alert-success');
            $this->view('pages/apropos');
            
        } catch (Exception $e) {
            flash('mail_error', 'Un problème est survenue, merci de ressayer plus tard', 'alert alert-danger');
            $this->view('pages/apropos');
        }

        } else {
            redirect('pages/index');
        }
    }

    public function deconnexion(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_fname']);
        unset($_SESSION['user_lname']);
        unset($_SESSION['user_bio']);
        unset($_SESSION['user_joined_at']);
        session_destroy();
        redirect('utilisateurs/connexion');
    }

    // TO DO: delete posts pics if user delete his account without deleting the posts
    /*
     * Use the postModel to get the posts by the given user, implement a for loop to iterate on all
     * possible picture names and delete one by one if it exists
    */
}