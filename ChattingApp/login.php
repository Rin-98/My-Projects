<?php include_once "header.php"; ?>
<body>
  <div class="wall">
    <section class="form login">
        <header>Bee Talk</header>
        <form action="#">
            <div class="error-txt"></div>
            <div class="name-details">
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="email" name="email" placeholder="Enter Your Email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Log In">
                </div>
            </div>
        </form>
        <div class="link">Don't have an account? <a href="index.php">Signup</a></div>
    </section>
  </div>
  <script src="Javascript\pass-show-hide.js"></script>
  <script src="Javascript\login.js"></script>
</body>
</html>