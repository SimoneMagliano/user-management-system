<?php
namespace maglianosimone\usm\factory;

use maglianosimone\usm\entity\User;
use maglianosimone\usm\model\UserModel;

class UserFactory {
    public static function fromArray(array $data):User
    {
        extract($data);
        return new User($firstName,$lastName,$email,$birthday,$password);
    }
}
?>