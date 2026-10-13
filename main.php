<?php
session_start();
$loggedIn = isset($_SESSION["user_id"]);

$regMessages = [
    "invalid_email" => "Please enter a valid email address.",
    "mismatch"      => "The passwords do not match.",
    "short"         => "The password must be at least 6 characters.",
    "exists"        => "This email is already registered.",
    "server"        => "Something went wrong. Please try again.",
];
$regError   = $_GET["reg_error"] ?? null;
$loginError = isset($_GET["login_error"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-games</title>
</head>
<body id="grad1">

<nav id="nav">
    <div class="logo">MiniHub</div>

    <div class="game_btn" id="Color">
        <h2 class="hely">Color</h2>
    </div>
    <div class="game_btn" id="Memory">
        <h2 class="hely">Memory</h2>
    </div>
    <div class="game_btn" id="Reaction">
        <h2 class="hely">Reaction</h2>
    </div>

    <div id="mode_toggle">
        <h2 class="hely">DARK</h2>
    </div>

    <?php if ($loggedIn): ?>
        <div id="login">
            <h2><?= htmlspecialchars($_SESSION["email"]) ?></h2>
        </div>
        <div id="regist">
            <h2 onclick="location.href='logout.php'" style="width:auto;">Logout</h2>
        </div>
    <?php else: ?>
        <div id="login">
            <h2 onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</h2>
        </div>
        <div id="regist">
            <h2 onclick="document.getElementById('id1').style.display='block'" style="width:auto;">Register</h2>
        </div>
    <?php endif; ?>
</nav>

<div class="central_div">
    <h1 id="cim">Válassz egy játékot</h1>
    <div class="game_card" id="game_display">
        <h3>Color Game</h3>
        <p>asd</p>
    </div>
</div>

<?php if (!$loggedIn): ?>

<!-- LOGIN MODAL -->
<div id="id01" class="modal">

  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <?php if ($loginError): ?>
        <p style="color:red">Invalid email or password.</p>
      <?php endif; ?>

      <label for="login-email"><b>Email</b></label>
      <input type="email" id="login-email" placeholder="Enter Email" name="email" required>

      <label for="login-psw"><b>Password</b></label>
      <input type="password" id="login-psw" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<!-- REGISTER MODAL -->
<div id="id1" class="modal1">

    <div class="imgcontainer">
    <span onclick="document.getElementById('id1').style.display='none'" class="close1" title="Close Modal">&times;</span>
    </div>
  <form class="modal-content1 animate" action="register.php" method="post">
    <div class="container1">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <?php if ($regError): ?>
        <p style="color:red"><?= htmlspecialchars($regMessages[$regError] ?? $regMessages["server"]) ?></p>
      <?php endif; ?>

      <label for="reg-email"><b>Email</b></label>
      <input type="email" id="reg-email" placeholder="Enter Email" name="email" required>

      <label for="reg-psw"><b>Password</b></label>
      <input type="password" id="reg-psw" placeholder="Enter Password" name="psw" minlength="6" required>

      <label for="reg-psw-repeat"><b>Repeat Password</b></label>
      <input type="password" id="reg-psw-repeat" placeholder="Repeat Password" name="psw-repeat" required>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &amp; Privacy</a>.</p>

      <div class="clearfix1">
        <button type="button" onclick="document.getElementById('id1').style.display='none'" class="cancelbtn1">Cancel</button>
        <button type="submit" class="signupbtn1">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<?php endif; ?>

<script src="script.js"></script>

<?php if ($loginError): ?>
<script>document.getElementById('id01').style.display = 'block';</script>
<?php elseif ($regError): ?>
<script>document.getElementById('id1').style.display = 'block';</script>
<?php endif; ?>
</body>
</html>