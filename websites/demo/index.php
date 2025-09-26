<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
            [
                'name' => 'Do Androids Dream of Electric Sheep',
                'author' => 'Phipips K.Dick',
                'releaseYear' => 1968,
                'purchaaseURL' => 'http://example.com'
                
            ],
            [
                'name' => 'Hail Mary',
                'author' => 'Andy Weir',
                'releaseYear' => 2021,
                'purchaaseURL' => 'http://example.com'
            ],
            [
                'name' => 'The Martian',
                'author' => 'Andy Weir',
                'releaseYear' => 2011,
                'purchaaseURL' => 'http://example.com'
            ]
        ];
    ?>

    <ul>
        <?php foreach ($books as $book) : ?>
            <?php if ($book['author'] === 'Andy Weir') : ?>
                <li>
                    <a href="<?= $book['purchaseURL'] ?>">
                        <?= $book['name']; ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>