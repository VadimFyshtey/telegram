<?php

return [
    'title' => 'Биржа',
    'single' => 'канал',
    'model' => 'App\Trade',
    'columns' => [
        'id',
        'name' => [
            'title' => 'Название',
        ],
        'description' => [
            'title' => 'Описание',
        ],
        'subscribers' => [
            'title' => 'Подписчиков',
        ],
        'url' => [
            'title' => 'Url канала',
        ],
        'status' => [
            'title' => 'Отображать',
            'select' => "IF((:table).status, 'Да', 'Нет')",
        ],
        'top' => [
            'title' => 'Топ',
            'select' => "IF((:table).top, 'Да', 'Нет')",
        ],
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
            'title' => 'Название',
            'limit' => 255,
        ],
        'description' => [
            'type' => 'textarea',
            'title' => 'Описание',
            'limit' => 500, //optional, defaults to no limit
            'height' => 130, //optional, defaults to 100
        ],
        'image' => [
            'title' => 'Изображение',
            'type' => 'image',
            'location' => public_path() . '/img/trade/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'display_raw_value' => false,
            'sizes' => array(
                array(64, 64, 'crop', public_path() . '/img/trade/', 100),
            )
        ],
        'subscribers' => [
            'type' => 'text',
            'title' => 'Подписчиков',
        ],
        'url' => [
            'type' => 'text',
            'title' => 'Url канала',
        ],
        'category' => [
            'type' => 'relationship',
            'name_field' => 'name',
            'title' => 'Категория',
        ],
        'conditions' => [
            'type' => 'text',
            'title' => 'Условия',
        ],
        'contact' => [
            'type' => 'text',
            'title' => 'Контакты',
        ],
        'price' => [
            'type' => 'text',
            'title' => 'Цена',
        ],
        'status' => [
            'type' => 'bool',
            'title' => 'Отображать',
        ],
        'pr' => [
            'type' => 'bool',
            'title' => 'Взаимопиар',
        ],
        'top' => [
            'type' => 'bool',
            'title' => 'Топ',
        ],
        'created_at' => [
            'type' => 'datetime',
            'title' => 'Дата создания',
        ]
    ],

    'filters' => [
        'name' => [
            'title' => 'Название'
        ],
        'url' => [
            'title' => 'Url канала'
        ],
        'category' => [
            'type' => 'relationship',
            'name_field' => 'name',
            'title' => 'Категория',
        ],
        'status' => [
            'type' => 'bool',
            'title' => 'Отображать',
        ],
        'top' => [
            'type' => 'bool',
            'title' => 'Топ',
        ],
    ],

];