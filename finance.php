<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="finance.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#my-form").validate({
          rules: {
            fname: "required",

            user_email: {
              required: true,
              email: true,
            },
            contact: {
              required: true,
              minlength: 10,
              maxlength: 10,
              number: true,
            },
            address: "required",
          },
          messages: {
            fname: "This field is required",

            user_email: {
              email: "Enter a valid email",
              fname: "This field is required",
            },
            contact: {
              fname: "This field is required",
              minlength: "Should be a 10-digit number",
              number: "Should be a 10-digit number",
            },
            address: "This field is required",
          },
        });
      });
    </script>
    <title>Finances</title>
  </head>

  <body>
    <nav>
      <div class="topnav">
        <a class="navbar-brand" href="index.php">
          <img src="logo.svg" alt="Pascal Logo" class="logo_img" "/>
        </a>
        <a href="index.php#products">Products</a>
        <a href="finance.php">Purchase</a>
        <a href="about_us.html">About</a>
        <a href="show_customers.php">Track Order</a>
      </div>
    </nav>

    <p class="center">Purchase your E-Scooter NOW!!!</p>
    <br />
    <br />
    <div class="container-1">
      <div class="cont">
        <form id="my-form" action="process.php" method="post">
          <!-- <h2>Purchase</h2> -->
          <div class="pform">
            <label for="">Full Name</label>
            <input
              type="text"
              id="name"
              name="fname"
              disabled
              
              value= "<?php echo $_SESSION['username']; ?>"
            />
            <label for="">Contact No.</label>
            <input type="tel" id="contact" name="contact" required />
            <label for="">Email</label>
            <input type="email" id="mail" name="user_email" required />
            <label for="">Address</label>
            <input type="text" name="address" required /><br />
          </div>
          <label for="bikes">Choose a Vehicle:</label>
          <select name="bikes" class="bikes" required>
            <option value="Magnus EX">Magnus EX</option>
            <option value="Magnus">Magnus</option>
            <option value="Zeal EX">Zeal EX</option>
            <option value="REO Plus">REO Plus</option>
          </select>
          <br /><br />
          <button type="submit" name="Submit" class="btn">Purchase</button>
        </form>
      </div>
      <img
        class="image"
        src="pics/magnus_ex_header.png"
        alt="A man on a bike"
      />
    </div>

    <div class="container">
      <p class="head">
        Attractive finance schemes that can make you own an E-Scooter, very
        easily.
      </p>
      <h2>Low interest EMI plans</h2>
      <p class="loan">Loan Partners</p>
      <img class="fin-img" src=".\pics\finance_logo_oto.png" alt="" />
      <img class="fin-img" src=".\pics\finance_logo_greaves.png" alt="" />
      <br />
      <br />
      <h2>Get up to 80% Financing</h2>
      <p class="loan">Loan Partners</p>
      <img class="fin-img" src=".\pics\finance_logo_hdfc.png" alt="" />
      <img class="fin-img" src=".\pics\finance_logo_idfc.png" alt="" />
      <br />
      <br />
      <h2>Zero Interest EMI</h2>
      <p class="loan">Loan Partners</p>
      <img class="fin-img" src=".\pics\finance_logo_bajaj_finserv.png" alt="" />
      <img class="fin-img" src=".\pics\finance_logo_mannapuram.png" alt="" />
      <img class="fin-img" src=".\pics\finance_logo_credit_fair.png" alt="" />
      <img class="fin-img" src=".\pics\finance_logo_loantap.png" alt="" />
    </div>
  </body>
</html>
