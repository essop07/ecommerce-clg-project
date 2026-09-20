<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Log-In</title>
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
<link href="../../css/style.css" rel="stylesheet">
</head>
<body class="font-sans bg-stone-100 text-stone-800 antialiased min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-sm">
  <div class="bg-white border border-stone-200 rounded-sm p-8">
    <div class="text-center mb-6">
      <p class="font-serif text-xl font-semibold text-stone-900">MyStore</p>
      <p class="text-sm text-stone-500 mt-1">Admin Log-In</p>
    </div>

    <form action="log-in1.php" method="POST" enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block text-sm font-medium text-stone-700 mb-1">Name</label>
        <input type="text" name="username" placeholder="Enter admin name"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
      </div>
      <div class="mb-6">
        <label class="block text-sm font-medium text-stone-700 mb-1">Password</label>
        <input type="password" name="userpassword" placeholder="Enter admin password"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
      </div>
      <button type="submit" name="submit"
        class="w-full bg-stone-900 text-white font-medium py-2.5 rounded-sm hover:bg-amber-700 transition-colors">
        Log-In
      </button>
    </form>
  </div>
</div>

</body>
</html>