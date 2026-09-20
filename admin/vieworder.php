<?php
session_start();
if (!$_SESSION["admin"]) {
    header("Location: form/log-in.php");
    exit();
}
include '../product/config.php';
$record = mysqli_query($con, "SELECT * FROM oder ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Orders</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          serif: ['Lora', 'ui-serif', 'serif'],
          sans: ['Inter', 'ui-sans-serif', 'sans-serif']
        }
      }
    }
  }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lora:wght@500;600;700&display=swap" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
</head>
<body class="font-sans bg-stone-50 text-stone-800 antialiased">

<header class="bg-stone-900">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
    <span class="font-serif text-xl font-semibold text-white">MyStore <span class="text-amber-500 font-sans text-xs font-medium align-middle ml-1">ADMIN</span></span>
    <div class="flex items-center gap-5 text-sm text-stone-300">
      <span>Hello, <span class="text-white"><?php echo $_SESSION["admin"]; ?></span></span>
      <a href="mystore.php" class="hover:text-white transition-colors">Dashboard</a>
      <a href="../user/Home.php" class="hover:text-white transition-colors">User-Panel</a>
      <a href="log-out.php" class="hover:text-white transition-colors">Log-Out</a>
    </div>
  </div>
</header>

<main class="max-w-5xl mx-auto px-4 sm:px-6 py-12">
  <h2 class="font-serif text-3xl text-stone-900 text-center mb-8">Orders</h2>

  <div class="bg-white border border-stone-200 rounded-sm overflow-x-auto">
    <table class="w-full text-sm text-center">
      <thead class="bg-stone-900 text-white">
        <tr>
          <th class="py-3 px-3 font-medium">Order ID</th>
          <th class="py-3 px-3 font-medium">Customer Name</th>
          <th class="py-3 px-3 font-medium">Total Amount</th>
          <th class="py-3 px-3 font-medium">Payment Method</th>
          <th class="py-3 px-3 font-medium">Status</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-200">
        <?php while ($row = mysqli_fetch_array($record)): ?>
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3 px-3 text-stone-600"><?php echo $row['id']; ?></td>
          <td class="py-3 px-3 text-stone-900 font-medium"><?php echo $row['customer_name']; ?></td>
          <td class="py-3 px-3 text-stone-600"><?php echo number_format($row['total_amount'], 2); ?></td>
          <td class="py-3 px-3 text-stone-600"><?php echo $row['payment_method']; ?></td>
          <td class="py-3 px-3">
            <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-sm bg-amber-50 text-amber-800 border border-amber-200">
              <?php echo $row['status']; ?>
            </span>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</main>

</body>
</html>
<?php
include '../user/footer.php';
?>