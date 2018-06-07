<?php

require_once '../repository/GalerieRepository.php';
require_once '../repository/BilderRepository.php';
require_once '../repository/UserRepository.php';


/**
 * Siehe Dokumentation im DefaultController.
 */
class GalerieController
{

    public function index(){
        $userRepository = new UserRepository();
        $galerieRepository = new GalerieRepository();
        $view = new View('galerie_index');
        $view->title = 'Meine Galerien';
        $view->heading = 'Meine Galerien';
        $view->heading2 ="Galerien";
        if(isset($_SESSION['user_id'])) {
            $sid = $this->noXSS($_SESSION['user_id']);
            $view->user = $userRepository->readById($sid);
            $view->galerien = $galerieRepository->readAllm($sid);
        }
        $view->display();
    }
    public function globalGalerie(){
        $galerieRepository = new GalerieRepository();
        $userRepository = new UserRepository();
        $global = 1;
        $view = new View('globaleGalerien_anzeigen');
        $view->heading = 'Öffentliche Galerien';
        $view->title = 'Öffentliche Galerien';

        $view->galerien = $galerieRepository->readGlobals($global);
        $galerien =  $galerieRepository->readGlobals($global);
        foreach ($galerien as $galerie){
            $view->userinfos =$this->noXSS($userRepository->readById($galerie->u_id));
        }

        $view->display();
    }
    public function globalGalerieUser(){
        $galerieRepository = new GalerieRepository();
        $userRepository = new UserRepository();
        $email = $this->noXSS($_GET['email']);
        $global = 1;
        $view = new View('globaleGalerienUser_anzeigen');
        $view->heading = 'Öffentliche Galerien';
        $view->title = 'Öffentliche Galerien';
        $user = $userRepository->readByMail($email);
        $view->user = $userRepository->readByMail($email);
        $uid = $user->id;
        $view->galerien = $galerieRepository->readGlobalsUser($global,$uid);


        $view->display();
    }

    public function create(){

        $view = new View('galerie_create');
        $view->title = 'Galerie hinzufügen';
        $view->heading = 'Galerie hinzufügen';
        $view->display();
    }
    public function doCreate(){

        if ($_POST['send']) {
            $uid = $this->noXSS($_SESSION['user_id']);
            $galeriename = $this->noXSS($_POST['galeriename']);
            $beschreibung = $this->noXSS($_POST['beschreibung']);

            if(isset($_POST['global'])){
                $global = 1;
            }
            else{
                $global = 0;
            }

            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Schauen ob Datei auch ein BIld ist
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Schauen ob Bild schon existiert
            if (file_exists($target_file)) {
                echo "Bild existiert bereits.";
                $uploadOk = 0;
            }
            // Bildgrösse überprüfen (500KB)
            if ($_FILES["fileToUpload"]["size"] > 1000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // JPG, PNG, JPEG und GIF erlauben
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Falls error -> $uploadOk = 0
            if ($uploadOk == 0) {
                echo "Datei wurde nicht hochgeladen.";
                // Falls alles okay, Bild hochladen
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". $this->noXSS(basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $galerieRepository = new GalerieRepository();
            $galerieRepository->create($this->noXSS($galeriename), $this->noXSS($beschreibung),$this->noXSS($target_file),$this->noXSS($global),$this->noXSS($uid));
            header('Location: /galerie');
        }
    }
    public function update(){
        $galerieRepository = new GalerieRepository();
        $view = new View('galerie_update');
        $view->title = 'Galerie bearbeiten';
        $view->heading = 'Galerie bearbeiten';
        if(isset($_GET['id'])) {
            $g_id = $this->noXSS($_GET['id']);
            $view->g_id = $g_id;
            $view->galerie = $galerieRepository->readById($g_id);
        }
        $view->display();
    }
    public function doUpdate(){
        if ($_POST['send']) {
            $g_id = $this->noXSS($_GET['id']);
            $galeriename = $this->noXSS($_POST['galeriename']);
            $beschreibung = $this->noXSS($_POST['beschreibung']);
            $galerieRepository = new GalerieRepository();
            $galerieRepository->update($g_id, $galeriename, $beschreibung);
        }
    }
    public function delete()
    {

        $galerieRepository = new GalerieRepository();
        $galerieRepository->deleteById($this->noXSS($_GET['id']));

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /galerie');
    }

    private function noXSS($string) {
      return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}
