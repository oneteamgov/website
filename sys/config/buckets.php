<?php
    return [
        'images' => [
            'type'      => 'file',
            'web_path'  => '/public/uploads/images',
            'file_path' => $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/images'
        ],
        'brand' => [
            'type'      => 'file',
            'web_path'  => '/public/uploads/brand',
            'file_path' => $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/brand'
        ]
    ];
?>
