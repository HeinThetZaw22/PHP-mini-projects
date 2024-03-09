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
                    Exchange Calculator

                </a>
            </li>

        </ol>
    </div>
    <hr class=" bg-gray-100 my-5">
    <?php

    $api = file_get_contents("http://forex.cbm.gov.mm/api/latest");
    $obj = json_decode($api);
    // var_dump($obj->rates);
    ?>
    <form action="./process_exchange.php" class=" space-y-5" method="post">
        <div class="grid grid-cols-2 gap-3">
            <div class=" col-span-2">
                <label for="amount" class="block text-sm font-medium mb-2 dark:text-white">Enter your amount</label>
                <input type="number" name="amount" id="amount" class="py-3 px-4 block w-full rounded-lg text-sm disabled:opacity-50  focus:border-blue-600 focus:ring-blue-500  disabled:pointer-events-none ">
            </div>
            <div class=" col-span-1">
                <!-- Select -->
                <div class="relative">
                    <select data-hs-select='{
                    "placeholder": "From Currency",
                    "toggleTag": "<button type=\"button\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
                    }' class="hidden" name="from_currency">
                        <option value="">choose</option>
                        <?php foreach ($obj->rates as $keys => $values) : ?>
                            <option value="<?= $keys ?>-<?= $values ?>"><?= $keys ?></option>
                        <?php endforeach ?>
                    </select>

                    <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 size-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m7 15 5 5 5-5" />
                            <path d="m7 9 5-5 5 5" />
                        </svg>
                    </div>
                </div>
                <!-- End Select -->
            </div>
            <div class=" col-span-1">
                <!-- Select -->
                <div class="relative">
                    <select data-hs-select='{
                    "placeholder": "To Currency",
                    "toggleTag": "<button type=\"button\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
                    }' class="hidden" name="to_currency">
                        <option value="">Choose</option>
                        <?php foreach ($obj->rates as $keys => $values) : ?>
                            <option value="<?= $keys ?>-<?= $values ?>"><?= $keys ?></option>
                        <?php endforeach; ?>
                    </select>

                    <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 size-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m7 15 5 5 5-5" />
                            <path d="m7 9 5-5 5 5" />
                        </svg>
                    </div>
                </div>
                <!-- End Select -->
            </div>

        </div>
        <button type="submit" class="py-3 w-full flex-grow px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Calculate
        </button>
    </form>
</section>
</main>

<script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>