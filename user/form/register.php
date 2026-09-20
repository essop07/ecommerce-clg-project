<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
<div class="row">
<div class="col-md-6 shadow bg-white p-3 m-auto border border-info mt-5">
<form action="register1.php" method="POST">
<p class="text-center fw-bold fs-3 text-warning">User Registration Form</p>
<div class="mb-3">
<label class="form-label">Username :</label>
<input type="text" class="form-control" name="username" placeholder="Enter User Name" required>
</div>
<div class="mb-3">
<label class="form-label">UserEmail :</label>
<input type="email" class="form-control" name="useremail" placeholder="Enter User Email" required>
</div>
<div class="mb-3">
<label class="form-label">UserNumber :</label>
<input type="text" class="form-control" name="usernumber" placeholder="Enter User Number" required>
</div>
<div class="mb-3">
<label class="form-label">UserPassword :</label>
<input type="password" class="form-control" name="userpassword" placeholder="Enter User Password" required>
</div>
<button class="bg-warning fs-4 fw-bold my-2 form-control text-white" name="submit">Register</button>
<a href="login.php" class="btn btn-danger fs-4 fw-bold form-control text-white">Already Account</a>
</form>
</div>
</div>
</div>
</body>
</html>
<?php
include '../footer.php';
?>
