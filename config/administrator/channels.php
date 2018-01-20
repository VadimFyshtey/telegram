<?php

return [
    'title' => 'Каналы',
    'single' => 'канал',
    'model' => 'App\Channel',
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
        'popul' => [
            'title' => 'Популярный',
            'select' => "IF((:table).popul, 'Да', 'Нет')",
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
            'location' => public_path() . '/img/channel/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'display_raw_value' => false,
            'sizes' => array(
                array(64, 64, 'crop', public_path() . '/img/channel/', 100),
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
        'status' => [
            'type' => 'bool',
            'title' => 'Отображать',
        ],
        'popul' => [
            'type' => 'bool',
	        'title' => 'Популярный',
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
        'popul' => [
            'type' => 'bool',
            'title' => 'Популярный',
        ],
    ],

];