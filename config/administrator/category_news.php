<?php

return [
    'title' => 'Категории новостей',
    'single' => 'категорию',
    'model' => 'App\CategoryNews',
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