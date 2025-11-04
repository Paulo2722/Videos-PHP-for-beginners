<?php require('views/partials/head.php')?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <ul>
        <?php foreach ($notes as $note) : ?>
        <li>
          <a href="/index.php/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">  
            <?= htmlspecialchars($note['body']) ?>
          </a>  
        </li>
      <?php endforeach; ?>
      </ul>

      <p class="mt-6">
        <a href="/index.php/notes/create" class="text-blue-500 hover:underline">Crear nota</a>
        </p>
  </div>
  </main>

<?php require('views/partials/footer.php')?>