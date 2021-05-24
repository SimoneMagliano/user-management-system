<?php

use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\UserModel;
// echo "\n--------------------------------\n";
// print_r(scandir(__DIR__."/../../vendor/testTools"));
require __DIR__."/../../vendor/testTools/testTool.php"; 
require __DIR__."/../../__autoload.php";
// [{"id":1,"firstName":"Adamo","lastName":"ROSSI","email":"adamo.rossi@email.com","birthday":"2002-06-12","password":"Adamo"},

$userModel = new UserModel();

$user = $userModel->findByEmail('adamo.rossi@email.com');
assertEquals(User::class,get_class($user));
assertEquals('ROSSI',$user->getLastName());
assertEquals('Adamo',$user->getFirstName());
assertEquals('adamo.rossi@email.com',$user->getEmail());

$userNessuno = $userModel->findByEmail('ulisse.nessuno@email.com');

assertEquals(null,$userNessuno);
assertEquals(true,is_null($userNessuno),'Utente che non esiste e nullo');


$user = $userModel->autenticate('adamo.rossi@email.com','Adamo');
assertEquals(User::class,get_class($user),"ho trovato un utente");
assertEquals('ROSSI',$user->getLastName());
assertEquals('Adamo',$user->getFirstName());

$userNoPassword = $userModel->autenticate('adamo.rossi@email.com','adamo');
assertEquals(true,is_null($userNoPassword),'Accesso Fallito per password errata');

$userNessuno = $userModel->autenticate('ulisse.nessuno@email.com','Adamo');
assertEquals(true,is_null($userNessuno),'Accesso Fallito per usename/email inesistente');


die();