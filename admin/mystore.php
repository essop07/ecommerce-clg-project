<?php
session_start();

// Redirect anyone who isn't logged in as admin
if (empty($_SESSION["admin"])) {
    header("Location: form/log-in.php");
    exit();
}

$adminName = htmlspecialchars($_SESSION["admin"], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
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

<header class="bg-stone-900">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
    <span class="font-serif text-xl font-semibold text-white">MyStore <span class="text-amber-500 font-sans text-xs font-medium align-middle ml-1">ADMIN</span></span>
    <div class="flex items-center gap-5 text-sm text-stone-300">
      <span><i class="fa-solid fa-user-tie mr-1.5 text-amber-500"></i>Hello, <span class="text-white"><?= $adminName ?></span></span>
      <a href="../user/Home.php" class="hover:text-white transition-colors">User-Panel</a>
      <a href="log-out.php" class="hover:text-white transition-colors"><i class="fa-solid fa-right-from-bracket mr-1"></i>Log-Out</a>
    </div>
  </div>
</header>

<main class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
  <h2 class="font-serif text-3xl text-stone-900 text-center mb-10">Dashboard</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    <a href="../product/index.php" class="bg-white border border-stone-200 rounded-sm p-6 text-center hover:border-stone-900 hover:shadow-md transition-all">
      <i class="fa-solid fa-plus text-amber-700 text-xl mb-3"></i>
      <p class="font-serif text-lg text-stone-900">Add Product</p>
      <p class="text-sm text-stone-500 mt-1">Create a new product listing</p>
    </a>
    <a href="user.php" class="bg-white border border-stone-200 rounded-sm p-6 text-center hover:border-stone-900 hover:shadow-md transition-all">
      <i class="fa-solid fa-users text-amber-700 text-xl mb-3"></i>
      <p class="font-serif text-lg text-stone-900">Users</p>
      <p class="text-sm text-stone-500 mt-1">View registered customers</p>
    </a>
    <a href="vieworder.php" class="bg-white border border-stone-200 rounded-sm p-6 text-center hover:border-stone-900 hover:shadow-md transition-all">
      <i class="fa-solid fa-receipt text-amber-700 text-xl mb-3"></i>
      <p class="font-serif text-lg text-stone-900">Orders</p>
      <p class="text-sm text-stone-500 mt-1">Review incoming orders</p>
    </a>
    <a href="../product/viewproduct.php" class="bg-white border border-stone-200 rounded-sm p-6 text-center hover:border-stone-900 hover:shadow-md transition-all">
      <i class="fa-solid fa-box text-amber-700 text-xl mb-3"></i>
      <p class="font-serif text-lg text-stone-900">Products</p>
      <p class="text-sm text-stone-500 mt-1">View all products</p>
    </a>
  </div>
</main>

<?php include __DIR__ . '/../user/footer.php'; ?>

</body>
</html>