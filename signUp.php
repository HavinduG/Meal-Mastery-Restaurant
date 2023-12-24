<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="loginStyle.css" />
  </head>
  <body>
    <div class="back">
        <a href="index.html">Home</a>
      </div>
    <div class="container">
      <form class="loginForm" action="insertRegister.php" method="POST">
        <h2>Register</h2>
        <label>User Name:</label><br />
        <input
          type="text"
          id="userName"
          name="userName"
          required="required"
        /><br /><br />

        <label>Email:</label><br />
        <input
          type="email"
          id="email"
          name="email"
          required="required"
        /><br /><br />

        <label>Password:</label><br />
        <input
          type="password"
          id="password"
          name="password"
          required="required"
        /><br /><br />

        <button type="submit">Sign Up</button>

        <div class="switch">
          <p>Already have an account?</p>
          <a href="login.php">Login</a>
        </div>
      </form>
    </div>

  
  </body>
</html>
