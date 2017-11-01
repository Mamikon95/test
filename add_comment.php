<?php

require 'classes/Db.php';

if(!isset($_POST))
{
    exit;
}

//Получаем POST данные
$name = isset($_POST['name']) ? htmlspecialchars(strip_tags($_POST['name'])) :  '';
$email = isset($_POST['email']) ? htmlspecialchars(strip_tags($_POST['email'])) :  '';
$comment = isset($_POST['comment']) ? htmlspecialchars(strip_tags($_POST['comment'])) :  '';

$errors = [];

//Если из значений кто то не валиден то то не продолжаем отрабатывать
if(!$name) {
    $errors['name'] = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = true;
}

if(!$comment) {
    $errors['comment'] = true;
}

//Ошибки если есть возвращаем их в JSON виде
if(count($errors)) {
    echo json_encode([
        'errors' => $errors
    ]);
    exit;
}

//Создаем объект бд
$db = new Db();

//Добавляем новый коммент
$db->insertCommentData($name,$email,$comment);

//Получаем только добавляемый коммент
$comment_o = $db->getLastComment();

//Возаращаем в JSON виде
echo json_encode([
    'errors' => [],
    'comment' => $comment_o
]);
exit;

