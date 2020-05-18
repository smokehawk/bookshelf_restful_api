<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UsersRole;

$factory->define(UsersRole::class,function (){
   return [];
});

$factory->state(UsersRole::class, 'admin', function () {
    return [
        'label' => 'Администратор',
        'name' => 'admin',
        'description' => 'Администратор с полными правами'
    ];
});

$factory->state(UsersRole::class, 'moderator', function () {
    return [
        'label' => 'Модератор',
        'name' => 'moderator',
        'description' => 'Наделен правами добавлять, редактировать и удалять контент'
    ];
});
