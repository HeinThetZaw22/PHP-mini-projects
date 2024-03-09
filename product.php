<?php include("./template/header.php") ?>
<section class=" bg-gray-100 p-5 rounded">
  <div class="">
    <div class="flex justify-end mb-3">
      <a href="./product-create.php" type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        Create Product
      </a>
    </div>
  </div>
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Image</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Price</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Rating</th>
                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
              <?php

              $folder = "products";
              $products = array_filter(scandir($folder), fn ($i) => $i != "." && $i != "..");
              foreach ($products as $product) :
                $data = file_get_contents($folder . "/" . $product);
                $obj = json_decode($data);
              ?>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                    <img class=" w-10 h-10 object-cover rounded " src="<?= $obj->product_photo ?>" alt="">
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"><?= $obj->product_name ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"><?= $obj->product_price ?></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                    <div class="flex gap-1">
                      <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 <?= $i <= $obj->product_rating ? 'fill-yellow-300' : '' ?>">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>

                      <?php endfor; ?>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a onclick="return confirm('Are you sure?')" href="./product-delete.php?file=<?= $product ?>" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</section>
</main>

<script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>