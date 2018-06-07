$this->$this->noXSS<?php

require_once '../repository/UserRepository.php';
require_once '../repository/GalerieRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{

    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user_index');
        $view->title = 'Alle User';
        $view->heading = 'Alle User';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    //MeinVerein mit den Mannschaften anzeigen


    // Verein update-Anzeige
    public function update(){
        $userRepository = new UserRepository();
        $view = new View('user_update');
        if(isset($_GET['message'])) {
            $fehlermeldung = $this->noXSS($_GET["message"]);
            $view->fehlermeldung = $this->noXSS($fehlermeldung);
        }
        $view->title = 'Passwort bearbeiten';
        $view->heading = 'Passwort bearbeiten';
        if(isset($_SESSION['user_id'])) {
            $uid = $this->noXSS($_SESSION['user_id']);
            $view->user = $userRepository->readById($uid);
        }
        $view->display();
    }

    // User updaten
    public function doUpdate(){
        if ($_POST['send']) {
            $uid = $this->noXSS($_SESSION['user_id']);
            $password = $this->noXSS($_POST['password']);
            $mompassword = $this->noXSS($_POST['mompassword']);
            $passwordcheck = $this->noXSS($_POST['passwordcheck']);
            $userRepository = new UserRepository();
            if($password == $passwordcheck){
                if($userRepository->update($uid,$password,$mompassword) < 0){
                    header('Location: /user/update?message=Das aktuelle Passwort stimmt nicht!');
                }
                else{
                    header('Location: /galerie/index');
                }
            }
            else{
                header('Location: /user/update?message=Die Passwörter stimmen nicht überein!');
            }
        }
    }

    // Login-Seite anzeigen
    public function login()
    {
        $view = new View('user_login');
        if(isset($_GET['message'])) {
            $fehlermeldung = $this->noXSS($_GET["message"]);
            $view->fehlermeldung = $this->noXSS($fehlermeldung);
        }
        $view->title = 'Login';
        $view->heading = 'Einloggen';
        $view->display();
    }

    //Logout anzeigen
    public function logout(){
        $view = new View('user_logout');
        $view->title = 'Logout';
        $view->display();
    }

    //Logout durchführen
    public function doLogout(){
        session_destroy();
        header('Location: ../');
    }

    // Registrieren-Seite anzeigen
    public function create()
    {
        $view = new View('user_create');
        if(isset($_GET['message'])) {
            $fehlermeldung = $this->noXSS($_GET["message"]);
            $view->fehlermeldung = $this->noXSS($fehlermeldung);
        }
        $view->title = 'Registration';
        $view->heading = 'Registrieren';
        $view->display();
    }

    // Erstellen von einem User in DB
    public function doCreate()
    {
        if ($_POST['send']) {
            $username = $this->noXSS($_POST['username']);
            $email = $this->noXSS($_POST['email']);
            $password = $this->noXSS($_POST['password']);
            $passwordcheck = $this->noXSS($_POST['passwordcheck']);
            $userRepository = new UserRepository();
            $user = $userRepository->checkEmail($email);
            if($password != $passwordcheck){
                header('Location: /user/create?message=Die Passwörter stimmen nicht überein!');
            }
            elseif($user > 0){
                header('Location: /user/create?message=Diese Email existiert bereits!');

            }
            else{

                $userRepository->create($username, $email, $password);
                header('Location: /user/login');
            }
        }
    }

    // Einloggen (überprüfung mit datenbank-einträgen)
    public function doLogin()
    {
        if ($_POST['send']) {
            if(isset($_POST['email'])&&isset($_POST['password'])){
            $email = $this->noXSS($_POST['email']);
            $password = $this->noXSS($_POST['password']);

            $userRepository = new UserRepository();
            $userRepository->login($email, $password);
                if($userRepository->login($email, $password) >= 0) {
                    $_SESSION['user_id'] = $userRepository->login($email,$password);
                    header('Location: /galerie/index');
                }
                else {
                    header('Location: /user/login?message=Die Daten stimmen nicht überein!');
                }
            }
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        //header('Location: /user');
    }

    // Delete-Seite anzeigen
    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($this->noXSS($_GET['id']));

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
    private function noXSS($string) {
      return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

}
