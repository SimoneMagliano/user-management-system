<?php
require './__autoload.php';
use sarassoroberto\usm\config\local\AppConfig;
use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\factory\UserFactory;
use sarassoroberto\usm\model\DB;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\utils\JSONReader;

$conn = DB::serverConnectionWithoutDatabase();
$dbname = AppConfig::DB_NAME;

$sql = "DROP DATABASE if exists $dbname;
        CREATE database if not exists $dbname; 
        use $dbname;

        CREATE TABLE `user` (
            `userId` INT(10) NOT NULL AUTO_INCREMENT,
            `firstName` VARCHAR(255) NOT NULL,
            `lastName` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `birthday` DATE NULL DEFAULT NULL,
            `password` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`userId`),
            UNIQUE INDEX `email` (`email`)
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
