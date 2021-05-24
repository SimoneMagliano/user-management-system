<?php
namespace sarassoroberto\usm\factory;

use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\UserModel;

class UserFactory {
    public static function fromArray(array $data):User
    {
        extract($data);
        return new User($firstName,$lastName,$email,$birthday,$password);
    }
}