<?php include("./template/header.php") ?>
<section class=" bg-gray-100 p-5 rounded">
    <div class="mb-5">
        <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                    Home
                </a>
                <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </li>
            <li class="inline-flex items-center">
                <a class="flex items-center font-bold text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                    Gallery
                </a>
            </li>

        </ol>
    </div>
    <hr class=" bg-gray-100 my-5">
    <form action="./process_gallery.php" enctype="multipart/form-data" method="post">
        <label for="upload" class="sr-only">Choose file</label>
        <input type="file" name="upload[]" multiple id="upload" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
            file:bg-gray-50 file:border-0
            file:me-4
            file:py-3 file:px-4
            dark:file:bg-gray-700 dark:file:text-gray-400">
        <button type="submit" class="py-3 mt-3 flex-grow px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Upload
        </button>
    </form>
    <hr class=" bg-gray-100 my-5">

<?php
$photos = scandir("photos");
$photos = array_filter(scandir("photos"), fn ($i) => $i != "." && $i != "..");
// print_r($photos);
?>
<div class=" grid grid-cols-2 gap-3">
    <?php foreach ($photos as $photo) : ?>
        <div class=" group relative">
        <img class=" rounded-lg" src="./photos/<?= $photo ?>" alt="">
        <a onclick=" return confirm('Are you sure?')" href="./gallery-photo-delete.php?id=<?= $photo ?>" type="button" class=" absolute top-0 left-0  py-3 px-4 transition-all inline-flex items-center justify-center gap-x-2 text-md font-semibold rounded-lg text-white bg-opacity-50 opacity-0 group-hover:opacity-100 bg-red-500 border border-red-500 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Delete
        </a>
        </div>
    <?php endforeach; ?>
</div>
</section>

</main>

<script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>