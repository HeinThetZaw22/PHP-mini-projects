<?php
// echo "<pre>";
// print_r($_POST);

$from_currency_arr = explode("-", $_POST["from_currency"]);
$from_currency_name = $from_currency_arr[0];
// $from_currency_rate = $from_currency_arr[1];
$from_currency_rate = str_replace(',', '', $from_currency_arr[1]);
// var_dump($from_currency_rate);

$to_currency_arr = explode("-", $_POST["to_currency"]);
$to_currency_name = $to_currency_arr[0];
// $to_currency_rate = $to_currency_arr[1];
$to_currency_rate = str_replace(',', '', $to_currency_arr[1]);

// var_dump($to_currency_rate);

$amount = $_POST["amount"];
$mmk = $amount * $from_currency_rate;
$Exchanged_amount = $mmk / $to_currency_rate;
// echo $Exchanged_amount . " $to_currency_name";
?>

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
                <a class="flex items-center font-bold text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="./exchange.php">
                    Exchange Calculator

                </a>
            </li>

        </ol>
    </div>
    <hr class=" bg-gray-100 my-5">
    <p class=" text-center text-2xl">
        <?= round($Exchanged_amount,2)." ". $to_currency_name ?>
    </p>
    <a href="./exchange.php" type="button" class="py-3 mt-3 w-full flex-grow px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Exchange Again
        </a>
</section>
</main>

<script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>