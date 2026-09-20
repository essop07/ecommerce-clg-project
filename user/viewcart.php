<?php
include 'header.php';
?>
<main class="max-w-5xl mx-auto px-4 sm:px-6 py-10">
  <h1 class="font-serif text-3xl text-stone-900 mb-8 text-center">My Cart</h1>

  <div class="bg-white border border-stone-200 rounded-sm overflow-x-auto">
    <table class="w-full text-sm text-center">
      <thead class="bg-stone-900 text-white">
        <tr>
          <th class="py-3 px-3 font-medium">Serial No.</th>
          <th class="py-3 px-3 font-medium text-left">Product Name</th>
          <th class="py-3 px-3 font-medium">Product Price</th>
          <th class="py-3 px-3 font-medium">Quantity</th>
          <th class="py-3 px-3 font-medium">Total Price</th>
          <th class="py-3 px-3 font-medium">Update</th>
          <th class="py-3 px-3 font-medium">Delete</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-200">
<?php
$total = 0;
$p_total = 0;
$i = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $total += (floatval($value['product_price']) * intval($value['product_quantity']));
        $p_total = (floatval($value['product_price']) * intval($value['product_quantity']));
        $i = $key + 1;
        echo "
        <form action='Insertcart.php' method='POST' class='contents'>
        <tr>
          <td class='py-3 px-3 text-stone-600'>$i</td>
          <td class='py-3 px-3 text-left text-stone-900 font-medium'><input type='hidden' name='Pname' value='$value[product_name]'>$value[product_name]</td>
          <td class='py-3 px-3 text-stone-600'><input type='hidden' name='Pprice' value='$value[product_price]'>$value[product_price]</td>
          <td class='py-3 px-3'><input type='number' name='Pquantity' value='$value[product_quantity]' class='w-20 border border-stone-300 rounded-sm px-2 py-1 text-center focus:outline-none focus:ring-1 focus:ring-stone-900'></td>
          <td class='py-3 px-3 text-stone-900 font-medium'>$p_total</td>
          <td class='py-3 px-3'><input type='hidden' name='item' value='$value[product_name]'><button name='update' class='px-3 py-1.5 text-xs font-medium border border-stone-300 rounded-sm text-stone-700 hover:bg-stone-100 transition-colors'>Update</button></td>
          <td class='py-3 px-3'><button name='remove' class='px-3 py-1.5 text-xs font-medium border border-red-200 rounded-sm text-red-700 hover:bg-red-50 transition-colors'>Delete</button></td>
        </tr>
        </form>
        ";
    }
}
?>
      </tbody>
    </table>
  </div>

  <div class="flex flex-col items-center mt-10">
    <h3 class="text-stone-500 text-sm uppercase tracking-wide mb-2">Total</h3>
    <p class="font-serif text-3xl text-stone-900 mb-6"><?php echo number_format($total, 2); ?></p>
    <form action="checkout.php" method="POST">
      <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
      <button type="submit" class="bg-stone-900 text-white px-8 py-2.5 rounded-sm hover:bg-amber-700 transition-colors">Proceed to Checkout</button>
    </form>
  </div>
</main>
<?php
include '../user/footer.php';
?>