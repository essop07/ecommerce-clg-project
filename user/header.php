<?php
session_start();
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MyStore</title>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
</head>
<body class="font-sans bg-stone-50 text-stone-800 antialiased">

<header class="bg-white border-b border-stone-200 sticky top-0 z-10">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
    <a href="Home.php" class="flex items-center gap-2 font-serif text-xl font-semibold text-stone-900">
      <i class="fa-brands fa-shopify text-amber-700"></i>
      MyStore
    </a>
    <nav class="flex items-center gap-5 text-sm text-stone-600">
      <a href="Home.php" class="hover:text-stone-900 transition-colors">Home</a>
      <a href="viewcart.php" class="hover:text-stone-900 transition-colors">Cart (<?php echo $cart_count; ?>)</a>
      <?php if (isset($_SESSION['user'])): ?>
        <span class="text-stone-400">Hello, <span class="text-stone-700"><?php echo $_SESSION['user']; ?></span></span>
        <a href="../user/form/logout.php" class="hover:text-stone-900 transition-colors">Log-Out</a>
      <?php else: ?>
        <a href="form/login.php" class="hover:text-stone-900 transition-colors">Log-In</a>
      <?php endif; ?>
      <a href="../admin/mystore.php" class="text-stone-400 hover:text-stone-900 transition-colors">Admin</a>
    </nav>
  </div>
  <div class="bg-stone-900">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex justify-center gap-8">
      <a href="Electronics.php" class="text-stone-200 hover:text-white text-sm font-medium py-2.5 border-b-2 border-transparent hover:border-amber-700 transition-colors">Electronics</a>
      <a href="Clothes.php" class="text-stone-200 hover:text-white text-sm font-medium py-2.5 border-b-2 border-transparent hover:border-amber-700 transition-colors">Clothes</a>
      <a href="Footwears.php" class="text-stone-200 hover:text-white text-sm font-medium py-2.5 border-b-2 border-transparent hover:border-amber-700 transition-colors">FootWears</a>
    </div>
  </div>
</header>