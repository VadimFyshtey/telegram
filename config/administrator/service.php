<?php

return [
    'title' => 'Услуги',
    'single' => 'услугу',
    'model' => 'App\Service',
    'columns' => [
       'id',
        'content' => [
            'title' => 'Контент страницы',
        ],
        'title' => [
            'title' => 'Title (SEO)',

        ],
        'description' => [
            'title' => 'Description (SEO)',
        ],
    ],
    'edit_fields' => [
        'content' => [
            'type' => 'wysiwyg',
            'title' => 'Контент страницы',
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
];