<?php
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_amount = $_POST['total_amount'];
}
?>
<main class="max-w-3xl mx-auto px-4 sm:px-6 py-10">
  <h2 class="font-serif text-3xl text-stone-900 mb-8 text-center">Checkout</h2>

  <form action="process_order.php" method="POST" class="bg-white border border-stone-200 rounded-sm p-6 sm:p-8">
    <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">

    <div class="mb-4">
      <label for="name" class="block text-sm font-medium text-stone-700 mb-1">Full Name</label>
      <input type="text" id="name" name="customer_name" required
        class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
    </div>

    <div class="mb-4">
      <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email</label>
      <input type="email" id="email" name="customer_email" required
        class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
    </div>

    <div class="mb-4">
      <label for="address" class="block text-sm font-medium text-stone-700 mb-1">Delivery Address</label>
      <textarea id="address" name="customer_address" rows="3" required
        class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900"></textarea>
    </div>

    <div class="mb-4">
      <label for="phone" class="block text-sm font-medium text-stone-700 mb-1">Phone Number</label>
      <input type="tel" id="phone" name="customer_phone" required
        class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
    </div>

    <div class="mb-6">
      <label for="payment_method" class="block text-sm font-medium text-stone-700 mb-1">Payment Method</label>
      <select id="payment_method" name="payment_method" required
        class="w-full border border-stone-300 rounded-sm px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-stone-900">
        <option value="Cash On Delivery">Cash on Delivery</option>
      </select>
    </div>

    <div class="mb-8">
      <h4 class="font-serif text-lg text-stone-900 mb-3">Order Summary</h4>
      <div class="border border-stone-200 rounded-sm overflow-hidden">
        <table class="w-full text-sm">
          <thead class="bg-stone-50 text-stone-500">
            <tr>
              <th class="text-left font-medium py-2 px-3">Product</th>
              <th class="text-center font-medium py-2 px-3">Quantity</th>
              <th class="text-right font-medium py-2 px-3">Price</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-200">
<?php
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        echo "<tr>
          <td class='py-2 px-3 text-stone-800'>{$item['product_name']}</td>
          <td class='py-2 px-3 text-center text-stone-600'>{$item['product_quantity']}</td>
          <td class='py-2 px-3 text-right text-stone-900'>" . number_format($item['product_price'] * $item['product_quantity'], 2) . "</td>
        </tr>";
    }
}
?>
          </tbody>
          <tfoot class="bg-stone-50">
            <tr>
              <th colspan="2" class="text-left py-2 px-3 text-stone-900">Total</th>
              <th class="text-right py-2 px-3 text-stone-900"><?php echo number_format($total_amount, 2); ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="bg-stone-900 text-white px-10 py-2.5 rounded-sm hover:bg-amber-700 transition-colors">Confirm Order</button>
    </div>
  </form>
</main>
<?php include 'footer.php'; ?>