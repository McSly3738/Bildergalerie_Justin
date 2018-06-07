<?php

require_once '../repository/BilderRepository.php';
require_once '../repository/GalerieRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class BilderController
{
    public function anzeigen(){
        $bilderRepository = new BilderRepository();
        $galerieRepository = new GalerieRepository();
        $view = new View('Bilder_anzeigen');
        $view->heading = 'Bilder';
        $view->title = 'Bilder';
        if(isset($_SESSION['user_id'])) {
            if(isset($_GET['id'])) {
                $g_id = $_GET['id'];
                $view->galerie = $galerieRepository->readById($g_id);
                $view->g_id = $g_id;
                $view->bilder = $bilderRepository->readAllb($g_id);
            }
        }
        $view->display();
    }
    public function globaleBilder(){
        $galerieRepository = new GalerieRepository();
        $bilderRepository = new BilderRepository();
        $view = new View('globaleBilder_anzeigen');
        $view->heading = 'Öffentliche Bilder';
        $view->title = 'Öffentliche Bilder';

        if(isset($_GET['id'])) {
            $g_id = $_GET['id'];
            $view->galerie = $galerieRepository->readById($g_id);
            $view->g_id = $g_id;
            $view->bilder = $bilderRepository->readAllb($g_id);
        }

        $view->display();
    }


    // Spieler-Erstellen-Formularfeld anzeigen
    public function add(){
        $view = new View('bilder_hinzufügen');
        if(isset($_GET['id'])) {
            $g_id = $_GET['id'];
            $view->g_id = $g_id;
        }
        $view->title = 'Bilder hinzufügen';
        $view->heading = 'Bilder hinzufügen';
        $view->display();
    }

    // Spieler in DB erstellen + Bild hochladen
    public function doAdd(){

        $g_id = $this->noXSS($_POST['g_id']);
        $beschreibung = $this->noXSS($_POST['beschreibung']);


        // Spielerbild in Ordner /public/images/ hochladen
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = $this->noXSS(strtolower(pathinfo($target_file,PATHINFO_EXTENSION)));

        // Schauen ob Datei auch ein BIld ist
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $this->noXSS($check["mime"]) . ".";
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

        $bilderRepository = new BilderRepository();
        $bilderRepository->create($this->noXSS($beschreibung),$this->noXSS($target_file),$this->noXSS($g_id));

        // Anfrage an die URI /user weiterleiten (HTTP 302)

        header('Location: /bilder/anzeigen?id='.$this->noXSS($g_id));

    }

    // Spieler löschen in DB
    public function delete(){
        $g_id = $this->noXSS($_GET['id']);
        $bilderRepository = new BilderRepository();
        $bilderRepository->deleteById($this->noXSS($_GET['bid']));
        header('Location: /bilder/anzeigen?id='.$this->noXSS($g_id));

    }

    // Spieler Update-Seite (Formularfeld) anzeigen
    public function update(){
        $bilderRepository = new BilderRepository();
        $view = new View('bilder_update');
        $view->title = 'Bild bearbeiten';
        $view->heading = 'Bild bearbeiten';
        if(isset($_GET['bid']) && isset($_GET['id'])) {
            $bid = $this->noXSS($_GET['bid']);
            $g_id = $this->noXSS($_GET['id']);
            $view->bid = $this->noXSS($bid);
            $view->g_id = $this->noXSS($g_id);
            $view->bilder = $bilderRepository->readById($this->noXSS($bid));
        }
        $view->display();
    }

    // Spieler update in DB
    public function doUpdate(){
        if ($_POST['send']) {

            $g_id = $this->noXSS($_GET['id']);
            $bid = $this->noXSS($_GET['bid']);
            $beschreibung = $this->noXSS($_POST['beschreibung']);

            $bilderRepository = new BilderRepository();
            $bildinfo = $bilderRepository->readById($this->noXSS($bid));
            if(isset($_FILES["fileToUpload"])){
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $this->noXSS($check["mime"]) . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if(empty($_FILES["fileToUpload"])){
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                }
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";


                    }
                }
            }




            $bilderRepository->update($this->noXSS($bid),$this->noXSS($beschreibung),$this->noXSS($target_file));
            header('Location: /bilder/anzeigen?id='.$this->noXSS($g_id));
        }
    }
    private function noXSS($string) {
      return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public function index() {
        header('Location: /galerie/index');
    }
}
