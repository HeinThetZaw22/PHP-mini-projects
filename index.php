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
                    Area Calculator

                </a>
            </li>

        </ol>
    </div>
    <hr class=" bg-gray-100 my-5">
    <form action="./area.php" class=" space-y-5" method="post">
        <div class="group">
            <label for="home_width" class="block text-sm font-medium mb-2 dark:text-white">Width</label>
            <input type="number" name="home_width" id="home_width" class="py-3 px-4 block w-full rounded-lg text-sm disabled:opacity-50  focus:border-blue-600 focus:ring-blue-500  disabled:pointer-events-none ">
        </div>
        <div>
            <label for="home_breadth" class="block text-sm font-medium mb-2 dark:text-white">Breadth</label>
            <input type="number" name="home_breadth" id="home_breadth" class="py-3 px-4 block w-full border-gray-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">
        </div>
        <div class="flex gap-3 items-center justify-center">
            <a type="button" href="recordLists.php" class="py-3 flex-grow px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Your Records
            </a>
            <button type="submit" class="py-3 flex-grow px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Calculate
            </button>
        </div>
    </form>
</section>
</main>

<script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>