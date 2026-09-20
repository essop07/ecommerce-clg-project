<?php
include 'header.php';
$con = mysqli_connect("localhost", "root", "", "ecommerce");
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql = "SELECT * FROM oder WHERE id =$order_id";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "Order not found.";
        exit();
    }
} else {
    echo "No order ID provided.";
    exit();
}
?>
<main class="max-w-2xl mx-auto px-4 sm:px-6 py-16">
  <div class="text-center mb-8">
    <div class="w-14 h-14 rounded-full bg-stone-900 text-white flex items-center justify-center mx-auto mb-4">
      <i class="fa-solid fa-check text-xl"></i>
    </div>
    <h2 class="font-serif text-3xl text-stone-900">Thank You for Your Order!</h2>
  </div>

  <div class="bg-white border border-stone-200 rounded-sm p-6 sm:p-8">
    <h5 class="font-serif text-lg text-stone-900 mb-4">Order Details</h5>
    <dl class="space-y-3 text-sm">
      <div class="flex justify-between border-b border-stone-100 pb-2">
        <dt class="text-stone-500">Order ID</dt>
        <dd class="text-stone-900 font-medium"><?php echo $order['id']; ?></dd>
      </div>
      <div class="flex justify-between border-b border-stone-100 pb-2">
        <dt class="text-stone-500">Name</dt>
        <dd class="text-stone-900 font-medium"><?php echo $order['customer_name']; ?></dd>
      </div>
      <div class="flex justify-between border-b border-stone-100 pb-2">
        <dt class="text-stone-500">Email</dt>
        <dd class="text-stone-900 font-medium"><?php echo $order['customer_email']; ?></dd>
      </div>
      <div class="flex justify-between border-b border-stone-100 pb-2">
        <dt class="text-stone-500">Address</dt>
        <dd class="text-stone-900 font-medium text-right"><?php echo $order['customer_address']; ?></dd>
      </div>
      <div class="flex justify-between pt-1">
        <dt class="text-stone-500">Total Amount</dt>
        <dd class="text-stone-900 font-semibold">$<?php echo number_format($order['total_amount'], 2); ?></dd>
      </div>
    </dl>
  </div>

  <div class="text-center mt-8">
    <a href="Home.php" class="inline-block bg-stone-900 text-white px-8 py-2.5 rounded-sm hover:bg-amber-700 transition-colors">Back to Home</a>
  </div>
</main>
<?php
include '../user/footer.php';
?>