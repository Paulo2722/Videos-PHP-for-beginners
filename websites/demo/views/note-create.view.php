<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-4"><?= $heading ?></h1>

    <form method="POST" action="/index.php/notes/create">
      <textarea
        name="body"
        rows="5"
        class="w-full border rounded p-2"
        placeholder="Write your note here..."></textarea>

      <button
        type="submit"
        class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Save Note
      </button>
    </form>

    <p class="mt-6">
      <a href="/notes" class="text-blue-500 hover:underline">Go back</a>
    </p>
  </div>
</main>

<?php require('partials/footer.php') ?>