<?php include_once "header.php"; ?>
<body>
  <div class="wall">
    <div class="form signup">
        <header>Bee Talk</header>
        <form action="#" enctype="multipart/form-data" autocomplete="off">
            <div class="error-txt"></div>
            <div class="name-details">
                <div class="field input">
                    <label for="">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" required>
                </div>
                <div class="field input">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="">Choose Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Sign Up">
                </div>
            </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login</a></div>
    </div>
  </div>
    <script src="Javascript\pass-show-hide.js"></script>
    <script src="Javascript\signup.js"></script>
</body>
</html>