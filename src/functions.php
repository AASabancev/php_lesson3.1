<?php

/**
 * Генерируем массив имен
 * @return array массив пользователей
 */
function generateUsers()
{
    $names = ['Ivan', 'Petr', 'Fedor', 'Grigor', 'Iliya'];
    $users = [];
    for ($i = 1; $i <= 50; $i++) {
        $users[] = [
            'id' => $i,
            'name' => $names[array_rand($names)],
            'age' => rand(18, 45),
        ];
    }
    return $users;
}

/**
 * Сохраняем пользователей $users в файл $filename
 * @param array $users массив пользователей
 * @param string $filename имя или путь к файлу
 */
function usersToFile(array $users, $filename = 'users.json')
{
    file_put_contents($filename, json_encode($users));
}

/**
 * Подгружаем список пользователей из json файла $filename
 * @param string $filename имя или путь к файлу
 * @return mixed
 */
function usersFromFile($filename = 'users.json')
{
    return json_decode(file_get_contents($filename), true);
}

/**
 * Считаем количество имен и возраст по каждому имени в массиве $users
 * @param array $users массив пользователей
 */
function calcEachName(array $users)
{
    if (empty($users)) {
        return;
    }

    $names = array_unique(array_column($users, 'name'));

    foreach ($names as $name) {
        $usersWithName = array_filter($users, function ($user) use ($name) {
            return $user['name'] == $name;
        });
        echo PHP_EOL . "Пользователей с именем '" . $name . "': " . count($usersWithName);
        $ages = array_column($usersWithName, 'age');
        echo ", средний возраст: " . round((array_sum($ages) / count($usersWithName)), 2);
    }
}

/**
 * считаем общую статистику по пользователям $users
 * @param array $users массив пользователей
 */
function calcNames(array $users)
{
    if (empty($users)) {
        return;
    }

    $ages = array_column($users, 'age');
    echo PHP_EOL . "Средний возраст всех: " . round((array_sum($ages) / count($users)), 2);
}
