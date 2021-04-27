<?php
namespace maglianosimone\usm\model;

use maglianosimone\usm\entity\User as EntityUser;
use \PDO;
use sarassoroberto\usm\entity\User;

class UserModel
{

    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname=corso_formarete;host=localhost', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // TODO: togliere echo
            echo $e->getMessage();
        }
    }

    // CRUD
    public function create(EntityUser $user)
    {

        try {
            $pdostm = $this->conn->prepare('INSERT INTO User (firstName,lastName,email,birthday)
            VALUES (:firstName,:lastName,:email,:birthday);');

            $pdostm->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STR);
            $pdostm->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
            $pdostm->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $pdostm->bindValue(':birthday', $user->getBirthday(), PDO::PARAM_STR);

            $pdostm->execute();
        } catch (\PDOException $e) {
            // TODO: Evitare echo
            echo $e->getMessage();
            
        
        }
    }


    public function read()
    {
    }
    public function update()
    {
    }
    public function delete()
    {

    }
}
