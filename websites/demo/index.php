<?php

$books = [
        [
            'name' => 'Do Androids Dream of Electric Sheep',
            'author' => 'Phipips K.Dick',
            'releaseYear' => 1968,
            'purchaseURL' => 'http://example.com'
            
        ],
        [
            'name' => 'Hail Mary',
            'author' => 'Andy Weir',
            'releaseYear' => 2021,
            'purchaseURL' => 'http://example.com'
        ],
        [
            'name' => 'The Martian',
            'author' => 'Andy Weir',
            'releaseYear' => 2011,
            'purchaseURL' => 'http://example.com'
        ]
    ];

    $filteredBooks = array_filter($books, function ($book) {
        return $book['author'] === 'Andy Weir';
    });
    
require "index.view.php";