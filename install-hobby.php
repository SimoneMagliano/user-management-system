<?php
require './__autoload.php';
use maglianosimone\usm\config\local\AppConfig;
use maglianosimone\usm\entity\User;
use maglianosimone\usm\factory\UserFactory;
use maglianosimone\usm\model\DB;
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\utils\JSONReader;

$conn = DB::serverConnectionWithoutDatabase();
$dbhobby = AppConfig::DB_HOBBY;

$sql = "DROP DATABASE if exists $dbhobby;
        CREATE database if not exists $dbhobby; 
        use $dbhobby;

        CREATE TABLE `hobby` (
            `hobbyId` INT(10) NOT NULL AUTO_INCREMENT,
            `hobby` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`hobbyId`),
           
        )";

$conn->exec($sql);

$users = JSONReader::openFile(__DIR__.'/__dataset/demo.json');
foreach ($users as $key => $user) {
        $um = new UserModel();
        $um->create(UserFactory::fromArray($user));
}


try {
    $conn->exec($sqlToInsertUserQuery);
    //code...
} catch (\Throwable $th) {
    echo $th->getMessage();
}
