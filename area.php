<?php
if (empty($_POST["home_width"]) || empty($_POST["home_breadth"])) {
    // echo "You need to fill both";
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./app.css">
</head>

<body>
    <main class=" max-w-3xl mx-auto p-10">
        <header class="flex gap-5 mb-3 items-center">
            <!-- Navigation Toggle -->
            <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#docs-sidebar" aria-controls="docs-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="flex-shrink-0 size-6" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <?php include("./sidebar.php"); ?>
            <h1 class=" text-2xl font-sans  font-bold">Backend Mini Project</h1>
        </header>
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
                        <a class="flex items-center font-bold text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="index.php">
                            Area Calculator
                        </a>
                        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </li>
                    <li class="inline-flex items-center">
                        <a class="flex items-center font-bold text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                            Result
                        </a>
                    </li>

                </ol>
            </div>
            <hr class=" bg-gray-100 my-5">

            <?php

            $width = $_POST["home_width"];
            $breadth = $_POST["home_breadth"];
            $area = $width * $breadth;

            $fileName = "save.txt";
            if (!file_exists($fileName)) {
                touch($fileName);
            }
            $fileStream = fopen($fileName, "a");
            fwrite($fileStream, "$width * $breadth = $area\n");
            fclose($fileStream);
            // echo $area;
            ?>

            <p class="text-center text-2xl">
                <?= $area ?> sqft
            </p>
           <div class="flex mt-5 gap-3 items-center justify-center">
           <a href="./index.php" type="button" class="py-3 px-4 flex-grow inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Calculate More
            </a>
            <a type="button" href="recordLists.php" class="py-3 flex-grow px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    All Records
                </a>
           </div>
        </section>
    </main>

    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>