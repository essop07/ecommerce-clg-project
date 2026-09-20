<?php
session_start();
include 'config.php';
$record = mysqli_query($con, "SELECT * FROM tblproduct");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Products</title>
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
      <span>Hello, <span class="text-white"><?php echo isset($_SESSION["admin"]) ? $_SESSION["admin"] : ''; ?></span></span>
      <a href="../user/Home.php" class="hover:text-white transition-colors">User-Panel</a>
      <a href="../admin/log-out.php" class="hover:text-white transition-colors">Log-Out</a>
    </div>
  </div>
</header>

<main class="max-w-5xl mx-auto px-4 sm:px-6 py-12">
  <h2 class="font-serif text-3xl text-stone-900 text-center mb-8">View Products</h2>

  <div class="bg-white border border-stone-200 rounded-sm overflow-x-auto">
    <table class="w-full text-sm text-center">
      <thead class="bg-stone-900 text-white">
        <tr>
          <th class="py-3 px-3 font-medium">Id</th>
          <th class="py-3 px-3 font-medium">Name</th>
          <th class="py-3 px-3 font-medium">Price</th>
          <th class="py-3 px-3 font-medium">Image</th>
          <th class="py-3 px-3 font-medium">Category</th>
          <th class="py-3 px-3 font-medium">Quantity</th>
          <th class="py-3 px-3 font-medium">Update</th>
          <th class="py-3 px-3 font-medium">Delete</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-200">
        <?php while ($row = mysqli_fetch_array($record)): ?>
        <tr class="hover:bg-stone-50 transition-colors">
          <td class="py-3 px-3 text-stone-600"><?php echo $row['id']; ?></td>
          <td class="py-3 px-3 text-stone-900 font-medium"><?php echo $row['Pname']; ?></td>
          <td class="py-3 px-3 text-stone-600"><?php echo $row['Pprice']; ?></td>
          <td class="py-3 px-3"><img src="<?php echo $row['Pimage']; ?>" class="w-14 h-14 object-cover rounded-sm mx-auto border border-stone-200"></td>
          <td class="py-3 px-3 text-stone-600"><?php echo $row['Pcategory']; ?></td>
          <td class="py-3 px-3 text-stone-600"><?php echo $row['Pquantity']; ?></td>
          <td class="py-3 px-3">
            <a href="update.php?id=<?php echo $row['id']; ?>"
              class="inline-block px-3 py-1.5 text-xs font-medium border border-stone-300 rounded-sm text-stone-700 hover:bg-stone-100 transition-colors">Update</a>
          </td>
          <td class="py-3 px-3">
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this product?');"
              class="inline-block px-3 py-1.5 text-xs font-medium border border-red-200 rounded-sm text-red-700 hover:bg-red-50 transition-colors">Delete</a>
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