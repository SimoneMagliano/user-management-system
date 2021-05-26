<?php
require './__autoload.php';
use maglianosimone\usm\config\local\AppConfig;
use maglianosimone\usm\factory\UserFactory;
use maglianosimone\usm\model\DB;
use maglianosimone\usm\model\UserModel;
use maglianosimone\usm\utils\JSONReader;
$conn = DB::serverConnectionWithoutDatabase();
$dbhobby = AppConfig::DB_NAME;
$sql = "DROP DATABASE if exists $dbhobby;
        CREATE database if not exists $dbhobby; 
        use $dbhobby;
        CREATE TABLE hobby (
            `Calcio` INT(11) NULL DEFAULT NULL,
            `Tennis` INT(11) NULL DEFAULT NULL,
            `Musica` INT(11) NULL DEFAULT NULL,
            `Gaming` INT(11) NULL DEFAULT NULL
        )";
$conn->exec($sql);
$users = JSONReader::openFile(__DIR__.'/__dataset/demo.json');
foreach ($users as $key => $user) {
        $um = new UserModel();
        $um->create(UserFactory::fromArray($user));
}
try {
    $conn->exec($sqlToInsertUserQuery);
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>