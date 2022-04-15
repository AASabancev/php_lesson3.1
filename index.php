<?php

require_once 'src/functions.php';
echo "<pre>";

$fileName = 'custom.json';

$users = generateUsers();
usersToFile($users, $fileName);

$usersFromFile = usersFromFile($fileName);
calcEachName($usersFromFile);

calcNames($usersFromFile);

echo "</pre>";

