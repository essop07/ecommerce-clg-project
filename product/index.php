<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
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

<main class="max-w-xl mx-auto px-4 sm:px-6 py-12">
  <div class="bg-white border border-stone-200 rounded-sm p-6 sm:p-8">
    <h2 class="font-serif text-2xl text-stone-900 text-center mb-6">Add Product Details</h2>

    <form action="insert.php" method="POST" enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block text-sm font-medium text-stone-700 mb-1">Product Name</label>
        <input type="text" name="Pname" placeholder="Enter product name"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-stone-700 mb-1">Product Price</label>
        <input type="text" name="Pprice" placeholder="Enter product price"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-stone-700 mb-1">Product Image</label>
        <input type="file" name="Pimage"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 text-sm file:mr-3 file:py-1.5 file:px-3 file:rounded-sm file:border-0 file:bg-stone-900 file:text-white file:text-sm hover:file:bg-amber-700 file:transition-colors">
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-stone-700 mb-1">Select Page Category</label>
        <select name="Pages"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-stone-900">
          <option value="Home">Home</option>
          <option value="Electronics">Electronics</option>
          <option value="Clothes">Clothes</option>
          <option value="Footwears">Footwears</option>
        </select>
      </div>
      <div class="mb-6">
        <label class="block text-sm font-medium text-stone-700 mb-1">Product Quantity</label>
        <input type="number" name="Pquantity" placeholder="Enter product quantity"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
      </div>
      <button type="submit" name="submit"
        class="w-full bg-stone-900 text-white font-medium py-2.5 rounded-sm hover:bg-amber-700 transition-colors">
        Upload
      </button>
    </form>
  </div>
</main>

</body>
</html>
<?php
include '../user/footer.php';
?>