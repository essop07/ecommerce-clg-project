# Ecommerce Website (Cure Pharmacy Internship Report Project)

Reconstructed from the code and screenshots in the submitted internship report
(Microsys Softtech Limited).

## Folder Structure

```
ecommerce/
├── admin/
│   ├── form/
│   │   ├── log-in.php       -> Admin login form
│   │   └── log-in1.php      -> Admin login processor
│   ├── mystore.php          -> Admin dashboard
│   ├── user.php             -> View registered users
│   ├── vieworder.php        -> View all orders
│   └── log-out.php          -> Admin logout
├── product/
│   ├── config.php           -> Database connection (used by all pages)
│   ├── index.php            -> Add product form
│   ├── insert.php           -> Add product handler
│   ├── viewproduct.php      -> List/manage products
│   ├── update.php           -> Edit product
│   ├── delete.php           -> Delete product
│   └── Uploadimage/         -> Uploaded product images
├── user/
│   ├── form/
│   │   ├── login.php / login1.php
│   │   ├── register.php / register1.php
│   │   └── logout.php
│   ├── header.php / footer.php
│   ├── Home.php / Electronics.php / Clothes.php / Footwears.php
│   ├── Insertcart.php       -> Add/update/remove cart items
│   ├── viewcart.php         -> Shopping cart page
│   ├── checkout.php         -> Checkout form
│   ├── process_order.php    -> Saves the order to the database
│   └── thank_you.php        -> Order confirmation page
├── css/
│   └── style.css            -> Custom styling on top of Bootstrap
└── sql/
    └── ecommerce.sql        -> Full database schema + sample data
```

## Setup

1. Copy the `ecommerce` folder into your local server's web root
   (e.g. `htdocs/` for XAMPP, or `www/` for WAMP).
2. Import `sql/ecommerce.sql` into MySQL/phpMyAdmin — this creates the
   `ecommerce` database with all 5 tables (`admin`, `tbluser`, `tblproduct`,
   `oder`, `order_items`) and a default admin login.
3. Default admin credentials: **username:** `admin` **password:** `admin123`
   (change the row in the `admin` table for production use).
4. Update `product/config.php` if your MySQL username/password differ from
   the defaults (`root` / empty password).
5. Visit `user/Home.php` for the storefront, or `admin/form/log-in.php` for
   the admin panel.

## Notes

- Passwords are stored in plain text here to match the original report code;
  for real deployments use `password_hash()` / `password_verify()`.
- SQL queries use direct string interpolation as in the original report;
  for production, switch to prepared statements (`mysqli`/PDO) to prevent
  SQL injection.
