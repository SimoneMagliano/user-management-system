<?php
namespace maglianosimone\usm\model;

use \PDO;
use maglianosimone\usm\config\local\AppConfig;
use maglianosimone\usm\entity\User;
class HobbyModel
{
    private $conn;
    
    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbhobby='.AppConfig::DB_HOBBY.';host='.AppConfig::DB_HOST, AppConfig::DB_USER, AppConfig::DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // CRUD
    public function create(HobbyModel $hobbyModel)
    {
        try {
            $pdostm = $this->conn->prepare('INSERT INTO User (hobby)
            VALUES (:hobby);');

            $pdostm->bindValue(':hobby', $hobbyModel->getNome(), PDO::PARAM_STR);
            
            $pdostm->execute();
        } catch (\PDOException $e) {
           
            throw $e;
        }
    }
}
?>