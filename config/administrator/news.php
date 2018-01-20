<?php

return [
    'title' => 'Новости',
    'single' => 'новость',
    'model' => 'App\News',
    'columns' => [
        'id',
        'name' => [
            'title' => 'Название',
        ],
        'short_content' => [
            'title' => 'Короткое описание',
        ],
        'view' => [
            'title' => 'Просмотры',
        ],
        'status' => [
            'title' => 'Отображать',
            'select' => "IF((:table).status, 'Да', 'Нет')",
        ],
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'textarea',
            'title' => 'Название',
            'limit' => 255,
        ],
        'short_content' => [
            'type' => 'textarea',
            'title' => 'Короткое описание',
        ],
        'content' => [
            'type' => 'wysiwyg',
            'title' => 'Полное описание',
        ],
        'image' => [
            'title' => 'Изображение',
            'type' => 'image',
            'location' => public_path() . '/img/news/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2,
            'display_raw_value' => false,
        ],
        'category_news' => [
            'type' => 'relationship',
            'name_field' => 'name',
            'title' => 'Категория',
        ],
        'status' => [
            'type' => 'bool',
            'title' => 'Отображать',
        ],
        'created_at' => [
            'type' => 'datetime',
            'title' => 'Дата создания',
        ],
        'view' => [
            'type' => 'text',
            'title' => 'Просмотры',
        ],
        'title' => [
            'type' => 'textarea',
            'title' => 'Title (SEO)',
            'limit' => 255,
        ],
        'description' => [
            'type' => 'textarea',
            'title' => 'Description (SEO)',
            'limit' => 255,
        ]
    ],

    'filters' => [
        'name' => [
            'title' => 'Название'
        ],
        'category_news' => [
            'type' => 'relationship',
            'name_field' => 'name',
            'title' => 'Категория',
        ],
        'status' => [
            'type' => 'bool',
            'title' => 'Отображать',
        ],
    ],

];