<?php
include 'header.php';
require __DIR__ . '/../product/config.php';
?>

<main class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
    <h1 class="font-serif text-3xl text-stone-900 mb-8 text-center">Home</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

<?php

$record = mysqli_query($con, "SELECT * FROM tblproduct");

if (!$record) {
    die("Product query failed: " . mysqli_error($con));
}

while ($row = mysqli_fetch_array($record)) {

    if ($row['Pcategory'] === "Home") {

        echo "
        <form action='Insertcart.php' method='POST'
            class='flex flex-col bg-white border border-stone-200 rounded-sm overflow-hidden hover:shadow-md transition-shadow duration-200'>

            <img
                src='../product/{$row['Pimage']}'
                class='w-full h-56 object-cover'
                alt='{$row['Pname']}'>

            <div class='p-4 flex flex-col flex-1'>

                <h5 class='font-serif text-lg text-stone-900 mb-1'>
                    {$row['Pname']}
                </h5>

                <p class='text-stone-600 font-medium mb-3'>
                    Rs. {$row['Pprice']}
                </p>

                <input type='hidden' name='Pname' value='{$row['Pname']}'>
                <input type='hidden' name='Pprice' value='{$row['Pprice']}'>
                <input type='hidden' name='realquantity' value='{$row['Pquantity']}'>

                <input
                    type='number'
                    name='Pquantity'
                    class='w-full border border-stone-300 rounded-sm px-3 py-2 text-center mb-3 focus:outline-none focus:ring-1 focus:ring-stone-900'
                    min='1'
                    max='20'
                    placeholder='Enter Quantity'
                    required>

                <button
                    type='submit'
                    name='addcart'
                    class='mt-auto w-full bg-stone-900 text-white py-2 rounded-sm hover:bg-amber-700 transition-colors'>
                    Add to Cart
                </button>

            </div>
        </form>
        ";
    }
}

?>

    </div>
</main>

<?php
include 'footer.php';
?>