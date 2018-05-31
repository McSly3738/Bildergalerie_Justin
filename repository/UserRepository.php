<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($username,  $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);

        $query = "INSERT INTO $this->tableName (username, mail, passwort) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $username,  $email, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
    public function update($uid,$password,$mompassword){
        $query2 = "SELECT * FROM $this->tableName WHERE id = ?";


        $statement = ConnectionHandler::getConnection()->prepare($query2);
        $statement->bind_param('i',$uid);
        $statement->execute();
        $result = $statement->get_result();
        $user = $result->fetch_object();

        if(password_verify($mompassword, $user->passwort)){
            $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);
            $query = "UPDATE $this->tableName SET passwort = ? WHERE id=? ;";
            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('si',$password,$uid);
            $statement->execute();
        }
        else{
            return -1;
        }

    }
    public function login($loginemail,$loginpassword){
        $query = "SELECT * FROM $this->tableName WHERE mail = ?";

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('s',$loginemail);
            $statement->execute();
            $result = $statement->get_result();
            $user = $result->fetch_object();

            // Verify user password and set $_SESSION
        if (password_verify($loginpassword, $user->passwort)){
            //Falls das Passwort mit der Email übereinstimmt schickt es eine positive Zahl zum Controller
            return $user->id;
        } else {
            return -1;
        }
    }
    public function readByMail($email)
    {
        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE mail=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $email);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurückgeben
        return $row;
    }
    public function checkEmail($email){
        $query = "SELECT * FROM $this->tableName WHERE mail = ?";


        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$email);
        $statement->execute();
        $result = $statement->get_result();
        $user = $result->fetch_object();

        if(empty($user)){
            return -1;
        }
        else{
            return 1;
        }
    }
}

