<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \Model\UsersModel;

class SecurityController extends Controller
{
	/* SignIn
	 * --
	 */
	public function signin()
	{
		
		/* Define some vars
		 */
		
		if (!isset($_SESSION['flashbag']))
			$_SESSION['flashbag'] = array();
        
        // New security & users objects
        $security = new AuthentificationModel;
        $users = new UsersModel;
		
        
		/* If user already logged in
		 */
        
        if ($this->getUser()) {
            return $this->redirectToRoute('default_home');
        }
		
		
        
		/* Form treatment
		 */
        
        if (isset($_POST['user']))
        {
            $user = $security->isValidLoginInfo($_POST['user']['email'], $_POST['user']['password']);
            
            // check user accout
            if($user) {
                
                // Retrieve user account
                $user = $users->find($user);
                
                // Log the user in
                $security->logUserIn($user);
                
                // redirect user
                return $this->redirectToRoute('article_create');
            }
            
            array_push($_SESSION['flashbag'], array(
                "status" => "danger",
                "message" => "Echec de connexion",
            ));
        }
        
        
		/* Flashbag
         * --
         *  flashbag message and reset flashbag session
		 */
        
		$flashbag = $_SESSION['flashbag'];
		unset($_SESSION['flashbag']);
        
        
		/* Response
		 */
        
		$this->show('security/signin', array(
			"flashbag" => $flashbag
        ));
	}
    
    
	/* SignUp
	 * --
	 */
	public function signup()
	{
		
		/* Define some vars
		 */
		
		if (!isset($_SESSION['flashbag']))
			$_SESSION['flashbag'] = array();
        
        // New security & users objects
        $security = new AuthentificationModel;
        $users = new UsersModel;
        
        // by default, we can create the user profile
        // Switch to false on form error
        $canCreate = true;
		
		
        
		/* Form treatment
		 */
        
        if (isset($_POST['user']))
        {
            /* retrieve & controle $post value
             */
            
            $username = !empty(trim($_POST['user']['username'])) ? $_POST['user']['username'] : null;
            $email = !empty(trim($_POST['user']['email'])) ? $_POST['user']['email'] : null;
            $password = !empty(trim($_POST['user']['password'])) ? $_POST['user']['password'] : null;
            
            // Check Username
            
            if ($username === null) {
                $canCreate = false;
                array_push($_SESSION['flashbag'], array(
                    "status" => "danger",
                    "message" => "Le nom d'utilisateur n'est pas renseigné",
                ));
            }
            
            // Check Email / Login
            
            if ($email === null) {
                $canCreate = false;
                array_push($_SESSION['flashbag'], array(
                    "status" => "danger",
                    "message" => "L'adresse email n'est pas renseigné",
                ));
            }
            
            // Check Password
            
            if ($password === null) {
                $canCreate = false;
                array_push($_SESSION['flashbag'], array(
                    "status" => "danger",
                    "message" => "Le mot de passe n'est pas renseigné",
                ));
            }
            
            // Check if account exist
            if ($canCreate) {
                if ($users->findByEmail($email)) {
                    $canCreate = false;
                    array_push($_SESSION['flashbag'], array(
                        "status" => "danger",
                        "message" => "L'adresse email est déjà utilisée",
                    ));
                    
                }
            }
            
            if ($canCreate) {
                // Prepare array user for insert
                $user = array(
                    "username" => $username,
                    "email" => $email,
                    "password" => $security->hashPassword($password),
                    "role" => "admin",
                );
                
                // Save user in database
                $users->insert($user);
                
                // Connect user
                $security->logUserIn($user);
                
                // redirect user
                return $this->redirectToRoute('article_create');
            }
            
        }
        
        
		/* Flashbag
         * --
         *  flashbag message and reset flashbag session
		 */
        
		$flashbag = $_SESSION['flashbag'];
		unset($_SESSION['flashbag']);
        
        
		/* Response
		 */
        
		$this->show('security/signup', array(
			"flashbag" => $flashbag
        ));
	}
    
    
	/* ResetPwd
	 * --
	 * 
	 */
	public function resetPwd()
	{
		$this->show('security/reset');
	}
    
    
	/* Logout
	 * --
	 */
	public function logout()
	{
        $security = new AuthentificationModel;
        $security->logUserOut();
		return $this->redirectToRoute('default_home');
	}

}