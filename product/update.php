<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $id = intval($_POST['id']);
    $Pname = $_POST['Pname'];
    $Pprice = $_POST['Pprice'];
    $Pcategory = $_POST['Pages'];
    $Pquantity = $_POST['Pquantity'];

    if ($_FILES['Pimage']['name'] != '') {
        $image_loc = $_FILES["Pimage"]["tmp_name"];
        $image_name = $_FILES["Pimage"]["name"];
        $image_des = "Uploadimage/".$image_name;
        move_uploaded_file($image_loc, $image_des);
        mysqli_query($con, "UPDATE tblproduct SET Pname='$Pname', Pprice='$Pprice', Pimage='$image_des', Pcategory='$Pcategory', Pquantity='$Pquantity' WHERE id=$id");
    } else {
        mysqli_query($con, "UPDATE tblproduct SET Pname='$Pname', Pprice='$Pprice', Pcategory='$Pcategory', Pquantity='$Pquantity' WHERE id=$id");
    }
    header("Location: viewproduct.php");
    exit();
}

$id = intval($_GET['id']);
$result = mysqli_query($con, "SELECT * FROM tblproduct WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Product</title>
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
    <h2 class="font-serif text-2xl text-stone-900 text-center mb-6">Update Product Details</h2>

    <form action="update.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div class="mb-4">
        <label class="block text-sm font-medium text-stone-700 mb-1">Product Name</label>
        <input type="text" name="Pname" value="<?php echo $row['Pname']; ?>"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium text-stone-700 mb-1">Product Price</label>
        <input type="text" name="Pprice" value="<?php echo $row['Pprice']; ?>"
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
          <?php foreach (['Home', 'Electronics', 'Clothes', 'Footwears'] as $cat): ?>
          <option value="<?php echo $cat; ?>" <?php if ($row['Pcategory'] == $cat) echo 'selected'; ?>><?php echo $cat; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-6">
        <label class="block text-sm font-medium text-stone-700 mb-1">Product Quantity</label>
        <input type="number" name="Pquantity" value="<?php echo $row['Pquantity']; ?>"
          class="w-full border border-stone-300 rounded-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-stone-900">
      </div>
      <button type="submit" name="submit"
        class="w-full bg-stone-900 text-white font-medium py-2.5 rounded-sm hover:bg-amber-700 transition-colors">
        Update
      </button>
    </form>
  </div>
</main>

</body>
</html>