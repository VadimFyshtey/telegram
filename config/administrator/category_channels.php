<?php

return [
    'title' => 'Категории каналов',
    'single' => 'категорию',
    'model' => 'App\Category',
    'columns' => [
        'id',
        'name' => [
            'title' => 'Категория',
        ],
        'description' => [
            'title' => 'Description (SEO)',
        ],
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
            'title' => 'Категория',
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
    ],

];